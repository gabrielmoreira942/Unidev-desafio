<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\DispMail;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{

    public function mail()
    {
 
    $mailUser = User::find(1);

    Mail::to($mailUser)->send(new DispMail($mailUser));
        if($mailUser){
                echo 'Email enviado';
        }else echo 'Email nao enviado';

    }

}
