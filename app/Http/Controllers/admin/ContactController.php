<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        // Menampilkan pesan terbaru di urutan paling atas
        $contacts = Contact::orderBy('created_at', 'desc')->get();
        return view('admin.pages.contact', compact('contacts'));
    }

    public function reply(Request $request, $id)
    {
        $request->validate([
            'reply_message' => 'required|string',
        ]);

        $contact = Contact::findOrFail($id);

        // Simulasi pengiriman balasan (Dalam tahap lanjut, kamu bisa menggunakan Mail::to($contact->email)->send(...))
        // Untuk sekarang, kita hanya memberikan feedback sukses

        return redirect()->back()->with('success', 'Balasan untuk ' . $contact->name . ' telah dikirim ke ' . $contact->email);
    }

    public function markAsRead($id)
    {
        $contact = Contact::findOrFail($id);

        if (!$contact->read_at) {
            $contact->update([
                'read_at' => now(),
            ]);
        }

        return redirect()->route('admin.contact');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->back()->with('success', 'Pesan berhasil dihapus!');
    }
}
