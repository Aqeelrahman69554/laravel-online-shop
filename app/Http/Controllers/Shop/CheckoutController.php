<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Midtrans\Config;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        $userId = Auth::id();

        // 1. Ambil data keranjang milik user beserta relasi bukunya
        $carts = Cart::where('user_id', $userId)->with('book')->get();

        if ($carts->isEmpty()) {
            return redirect()->back()->with('error', 'Keranjang belanja Anda kosong.');
        }

        // 2. Set Konfigurasi Midtrans
        // KODE YANG BENAR (Langsung menembak ke file .env kamu)
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = filter_var(env('MIDTRANS_IS_PRODUCTION', false), FILTER_VALIDATE_BOOLEAN);
        Config::$isSanitized = filter_var(env('MIDTRANS_IS_SANITIZED', true), FILTER_VALIDATE_BOOLEAN);
        Config::$is3ds = filter_var(env('MIDTRANS_IS_3DS', true), FILTER_VALIDATE_BOOLEAN);

        DB::beginTransaction();
        try {
            $subtotal = 0;
            $itemDetails = [];

            // 3. Looping item dari database ke format item_details Midtrans
            foreach ($carts as $item) {
                if ($item->book) {
                    $itemPrice = (int) $item->book->price;
                    $itemQty = (int) $item->quantity;
                    $itemTotal = $itemPrice * $itemQty;
                    $subtotal += $itemTotal;

                    $itemDetails[] = [
                        'id'       => 'BOOK-' . $item->book->id,
                        'price'    => $itemPrice,
                        'quantity' => $itemQty,
                        'name'     => substr($item->book->books_name, 0, 50), // Memastikan nama ada dan tidak terlalu panjang (max 50 karakter Midtrans)
                    ];
                }
            }

            // 4. Tambahkan Biaya Layanan ke dalam item_details agar kalkulasinya balance
            $biayaLayanan = 2000;
            $itemDetails[] = [
                'id'       => 'FEE-SERVICE',
                'price'    => $biayaLayanan,
                'quantity' => 1,
                'name'     => 'Biaya Layanan',
            ];

            // 5. Hitung Gross Amount Akhir (Harus MATEMATIS SAMA dengan total item_details)
            $grossAmount = $subtotal + $biayaLayanan;

            // 6. Buat Invoice ID Unik
            $orderCode = 'INV-' . time() . '-' . $userId;

            // 7. Simpan data ke tabel orders terlebih dahulu
            $orderId = DB::table('orders')->insertGetId([
                'user_id' => $userId,
                'order_date' => now(),
                'total_price' => $grossAmount,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // 8. Susun parameter lengkap untuk dikirim ke Midtrans
            $params = [
                'transaction_details' => [
                    'order_id'     => $orderCode,
                    'gross_amount' => $grossAmount, // Total nominal wajib sama dengan jumlah itemDetails
                ],
                'item_details' => $itemDetails,
                'customer_details' => [
                    'first_name' => Auth::user()->name,
                    'email'      => Auth::user()->email,
                ]
            ];

            // 9. Minta Token Snap dari Midtrans
            $snapToken = Snap::getSnapToken($params);

            // 10. Hapus Keranjang setelah token sukses didapatkan (Opsional, tergantung alur web kamu)
            // Cart::where('user_id', $userId)->delete();

            DB::commit();

            // 11. Arahkan ke halaman pembayaran dengan membawa token snap
            // Gantilah 'shop.pages.payment' sesuai nama view halaman bayar/snap kamu!
            return view('shop.pages.payment', [
                'snapToken'     => $snapToken,
                'invoiceNumber' => $orderCode,    // 'orderCode' dipetakan ke '$invoiceNumber' di View
                'totalPrice'    => $grossAmount,   // 'grossAmount' dipetakan ke '$totalPrice' di View
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal memproses pembayaran: ' . $e->getMessage());
        }
    }
    public function clearCartAfterPayment()
    {
        $userId = auth()->id();

        if (!$userId) {
            return redirect()->route('login');
        }

        DB::beginTransaction();
        try {
            // 1. Ubah draf pesanan terakhir milik user ini dari status 'pending' menjadi 'paid'
            DB::table('orders')
                ->where('user_id', $userId)
                ->where('status', 'pending')
                ->update([
                    'status' => 'paid',
                    'updated_at' => now()
                ]);

            // 2. Kosongkan seluruh item buku di keranjang belanja milik user ini
            DB::table('cart')->where('user_id', $userId)->delete();

            DB::commit();

            // Kembalikan user ke halaman depan dengan pesan sukses lunas
            return redirect()->route('home')->with('success', 'Pembayaran sukses! Keranjang Anda telah diproses.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('home')->with('error', 'Gagal menyinkronkan keranjang: ' . $e->getMessage());
        }
    }
}
