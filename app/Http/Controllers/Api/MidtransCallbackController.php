<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Midtrans\Config;
use Midtrans\Notification;

class MidtransCallbackController extends Controller
{
    public function handleNotification(Request $request)
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');

        try {
            // Menggunakan objek Notification bawaan Midtrans untuk membaca inputan data JSON otomatis
            $notif = new Notification();

            $transactionStatus = $notif->transaction_status;
            $invoiceNumber = $notif->order_id;
            $paymentType = $notif->payment_type;

            // Cek apakah invoice terdaftar di database lokal
            $transaction = DB::table('transactions')->where('invoice_number', $invoiceNumber)->first();

            if (!$transaction) {
                return response()->json(['message' => 'Invoice tidak ditemukan di database kami'], 404);
            }

            // Tentukan status berdasarkan standarisasi kode Midtrans
            $newStatus = 'pending';
            if ($transactionStatus == 'settlement' || $transactionStatus == 'capture') {
                $newStatus = 'completed';
            } elseif ($transactionStatus == 'cancel' || $transactionStatus == 'deny' || $transactionStatus == 'expire') {
                $newStatus = 'cancelled';
            }

            // Update status tabel-tabel terkait secara aman menggunakan DB::transaction
            DB::transaction(function () use ($invoiceNumber, $newStatus, $paymentType, $transaction) {
                // 1. Update tabel transactions
                DB::table('transactions')
                    ->where('invoice_number', $invoiceNumber)
                    ->update([
                        'status' => $newStatus,
                        'payment_method' => $paymentType,
                        'updated_at' => now()
                    ]);

                // 2. Hubungkan ke tabel orders menggunakan relasi user_id (atau skema relasi yang kamu inginkan)
                // Di sini kita update orders berdasarkan user_id yang statusnya masih pending saat dicocokkan
                DB::table('orders')
                    ->where('user_id', $transaction->user_id)
                    ->where('status', 'pending')
                    ->update([
                        'status' => $newStatus == 'completed' ? 'success' : ($newStatus == 'cancelled' ? 'failed' : 'pending'),
                        'updated_at' => now()
                    ]);
            });

            return response()->json(['message' => 'Database lokal berhasil diperbarui otomatis!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memproses callback: ' . $e->getMessage()], 500);
        }
    }
}
