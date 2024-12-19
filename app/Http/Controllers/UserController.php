<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use function Laravel\Prompts\error;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    public function create(Request $request)
    {

        $validation = $request->validate([
            'email' => 'required|unique:users|max:255|email|ends_with:@john.petra.ac.id,@admin',
            'password' => 'required|max:255',
            'namaLengkap' => 'required|max:255|string',
            'tanggalLahir' => 'required|date',
            'profilePicture' => 'file|mimes:jpg,jpeg,png|max:2048'
        ], [
            'email.unique' => 'Email Sudah Terdaftarkan',
            'email.max' => 'Email Terlalu Panjang',
            'password.max' => 'Password Terlalu Panjang',
            'email.ends_with' => 'Mohon Untuk Menggunakan Email Petra',
            'email.email' => 'Email Tidak Valid',
            'profilePicture.mimes' => 'Tipe Foto Harus Berupa JPG/PNG/JPEG',
            'profilePicture.max' => 'Ukuran Foto Terlalu Besar'
        ]);
        $email = $request->email;



        $password = $request->password;

        $hashedPassword = Hash::make($password);

        $user = new User();

        if ($request->hasFile('profilePicture')) {

            $profilePictureExtension = $request->file('profilePicture')->getClientOriginalExtension();

            $profilePictureNewName = Str::random(20) . '.' . $profilePictureExtension;

            $request->file('profilePicture')->move(public_path('profilePictures'), $profilePictureNewName);

            $validatedData['profilePicture'] = $profilePictureNewName;
        }

        $user->name = $request->namaLengkap;
        $user->email = $email;
        $user->email_verified_at = now();
        $user->password = $hashedPassword;
        $user->profile_picture = $validatedData['profilePicture'];
        $user->birth_date = $request->tanggalLahir;
        $user->role = 0; //User
        if (str_ends_with($request->email, '@admin')) {
            $user->role = 1; //Admin
        }

        $user->created_at = now();
        $user->updated_at = now();

        $user->save();

        if (Str::endsWith($request['email'], '@admin')) {
            Session::put('admin', $email);
            return redirect()->route('manage_events');
        }

        Session::put('email', $email);

        return redirect()->route('register_to_event')->with('success', 'Sign Up Berhasil !');
    }
    public function login(Request $request)
    {
        if (Str::endsWith($request->email, '@admin')) {
            $checkIsAdmin = User::where('email', $request->email)->where('role', 1)->first();

            if ($checkIsAdmin) {
                Session::put('admin', $request->email);
                return redirect()->route('manage_events')->with('success', 'Welcome Admin');
            }
        }
        if (Str::endsWith($request->email, '@john.petra.ac.id')) {

            $email = $request->email;
            $password = $request->password;
            $user = new User();

            if (User::authUsers($email, $password)) {
                Session::put('email', $request->email);
                return redirect()->route('register_to_event')->with('success', 'Login Berhasil !');
            }
        }

        return redirect()->route('login')->withErrors(['errors' => 'Email/Password Tidak Valid']);
    }
    public function showCreatePage()
    {
        return view('interviewer/add_event');
    }
}
