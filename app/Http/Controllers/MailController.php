<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Register;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public static function sendRegisteraEmail($email, $first_name, $last_name, $verification_code)
    {
        $data = [
            'name' => "$first_name $last_name",
            'verification_code' => $verification_code
        ];
        Mail::to($email)->send(new Register($data));
    }
}
