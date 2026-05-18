<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('admin.auth.login'); // Pastikan kamu punya file ini
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                if (Auth::user()->admin_status !== 'approved') {
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();

                    return back()->withErrors([
                        'email' => 'Akun admin kamu masih menunggu approval admin utama.',
                    ])->onlyInput('email');
                }

                return redirect()->intended('admin/dashboard');
            }
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }


    public function showRegister()
    {
        return view('auth.register');
    }

    public function registerStore(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pengunjung', // Set default sebagai pengunjung
        ]);

        Auth::login($user);

        return redirect('/')->with('success', 'Pendaftaran berhasil!');
    }

    public function showAdminRegister()
    {
        return view('auth.admin-register');
    }

    public function adminRegisterStore(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'max:30'],
            'address' => ['required', 'string', 'max:1000'],
            'birth_date' => ['required', 'date'],
            'gender' => ['required', 'string', 'max:30'],
            'profile_photo' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $validated['profile_photo'] = $request->file('profile_photo')->store('admin-profiles', 'public');
        $validated['password'] = Hash::make($validated['password']);
        $validated['role'] = 'admin';
        $validated['admin_status'] = 'pending';

        User::create($validated);

        return redirect()->route('login')->with('success', 'Pendaftaran admin berhasil dikirim. Tunggu approval dari admin utama.');
    }
}
