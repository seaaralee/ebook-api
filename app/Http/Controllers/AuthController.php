<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function me(){
        return
        [
            'nis' => 3103120153,
            'name' => 'Mutia Rani Zahra Meilani',
            'phone' => '081328142144',
            'class' => 'XII RPL 5'
        ];
    }
}
