<?php

namespace App\Model;

use Illuminate\Support\Facades\DB;

class Auth
{
    public static function verifyuser($username, $password)
    {
        $query = "select * from users where username = ?";
        $user = collect(DB::select($query, [$username]))->first();
        if ($user != NULL) {
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }
        return NULL;
    }
    public static function createToken($IdUser)
    {
        $token = md5(date('Y-m-d H:i:s') . $IdUser);
        DB::table('users')
            ->where('id' , '=' ,$IdUser)
            ->update(['token' => $token]);
        return $token;
    }
}
