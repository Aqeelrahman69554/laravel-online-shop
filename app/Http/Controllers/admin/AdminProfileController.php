<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminProfileController extends Controller
{
    public function index()
    {
        return view('admin.pages.admin-profile', [
            'admin' => Auth::user(),
            'admins' => User::where('role', 'admin')->latest()->get(),
            'pendingAdmins' => User::where('role', 'admin')->where('admin_status', 'pending')->latest()->get(),
            'isPrimaryAdmin' => $this->isPrimaryAdmin(),
        ]);
    }

    public function update(Request $request)
    {
        $admin = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($admin->id)],
            'phone' => ['nullable', 'string', 'max:30'],
            'address' => ['nullable', 'string', 'max:1000'],
            'birth_date' => ['nullable', 'date'],
            'gender' => ['nullable', 'string', 'max:30'],
            'profile_photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('profile_photo')) {
            if ($admin->profile_photo) {
                Storage::disk('public')->delete($admin->profile_photo);
            }

            $validated['profile_photo'] = $request->file('profile_photo')->store('admin-profiles', 'public');
        }

        $admin->update($validated);

        return back()->with('success', 'Profil admin berhasil diperbarui.');
    }

    public function store(Request $request)
    {
        abort_unless($this->isPrimaryAdmin(), 403);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
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
        $validated['admin_status'] = 'approved';
        $validated['approved_by'] = Auth::id();
        $validated['approved_at'] = now();

        User::create($validated);

        return back()->with('success', 'Admin baru berhasil ditambahkan.');
    }

    public function approve(User $user)
    {
        abort_unless($this->isPrimaryAdmin(), 403);
        abort_unless($user->role === 'admin' && $user->admin_status === 'pending', 404);

        $user->update([
            'admin_status' => 'approved',
            'approved_by' => Auth::id(),
            'approved_at' => now(),
        ]);

        return back()->with('success', 'Pendaftaran admin berhasil di-approve.');
    }

    public function reject(User $user)
    {
        abort_unless($this->isPrimaryAdmin(), 403);
        abort_unless($user->role === 'admin' && $user->admin_status === 'pending', 404);

        $user->update([
            'admin_status' => 'rejected',
            'approved_by' => Auth::id(),
            'approved_at' => null,
        ]);

        return back()->with('success', 'Pendaftaran admin ditolak.');
    }

    private function isPrimaryAdmin(): bool
    {
        $firstAdminId = User::where('role', 'admin')
            ->where('admin_status', 'approved')
            ->orderBy('id')
            ->value('id');

        return Auth::id() === $firstAdminId;
    }
}
