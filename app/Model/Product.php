<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    public static function getByPrimary($id)
    {
        return DB::table('products')
            ->where('id', '=', $id)
            ->first();
    }
    public static function getBycode($code)
    {
        return DB::table('products')
            ->where('code', '=', $code)
            ->first();
    }
}
