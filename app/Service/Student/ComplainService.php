<?php
namespace App\Service\Student;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class ComplainService {
    public function assignRef()
    {
        $alpha = 'abcdefghijklmopqrstuvwsyz';
        $alpha = substr(str_shuffle($alpha . Str::upper($alpha)), 0, 7);
        $publicId = str_shuffle($alpha . rand(100000, 999999));
        return $publicId;
    }
}

