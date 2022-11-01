<?php

namespace App\Helper;

class Util
{
    public static function rupiah($angka)
    {
           return 'Rp '. number_format($angka,'0',',' , '.');
    }

    public static function getStatus($status)
    {
        $result = '<span class="badge badge-danger">Draft</span>';
        if ($status == 'finished') {
            $result = '<span class="badge badge-success">Finished</span>';
        }
        return $result;
    }
}
