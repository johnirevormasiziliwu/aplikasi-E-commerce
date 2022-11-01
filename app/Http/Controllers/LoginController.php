<?php
namespace App\Http\Controllers;
use App\Mail\RegisterConfirmMail;
use App\Model\Auth;
use App\Model\User;
use Illuminate\Support\Facades\Mail;
class LoginController extends Controller{
    public function Verifikasiuser(){
        $username = request('username');
        $password = request('password');
        $user = Auth::verifyuser($username, $password);
        if ($user == null) {
            return redirect(route('login.index'))->withErrors(["Username dan Password Anda Salah"]);
        }

        $token = Auth::createToken($user->id);
        session(
            [
                'token' => $token,
                'nama' => $user->nama
            ]
        );
        return redirect(route('home'));
    }
    public function logout(){
        session()->forget('token');
        session()->forget('nama');
        return redirect(route('login.index'));
    }
    public function register(){
        return view('layout.register');
    }
    public function createRegister(){
        $emailConfirmToken = md5(date('Y-m-d- H:i:s') . '' . request('username'));
        $userCreate = [
            'nama' => request('nama'),
            'username' => request('username'),
            'password' => password_hash(request('password'), PASSWORD_DEFAULT),
            'role' => 'admin',
            'email_confirm_token' => ($emailConfirmToken),
            'active' => 'N'
        ];
        User::createNew($userCreate);
        Mail::to(request('username'))->send(new RegisterConfirmMail($userCreate));
        return redirect(route('login.index'));
    }


    public function confirmEmail($emailConfirmToke)
    {
        $user = User::getByEmailConfirmToken($emailConfirmToke);
        dd($user);
    }




}
