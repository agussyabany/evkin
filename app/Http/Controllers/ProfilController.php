<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfilController extends Controller
{
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => [
                'required',
                'confirmed',
                Password::min(8),
                'different:current_password',
            ],
        ], [
            'current_password.current_password' =>
                'Password lama tidak sesuai.',
            'password.confirmed' =>
                'Konfirmasi password baru tidak cocok.',
            'password.different' =>
                'Password baru harus berbeda dari password lama.',
        ]);

        $user = $request->user();

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()
            ->with('success', 'Password berhasil diperbarui.');
    }
}
