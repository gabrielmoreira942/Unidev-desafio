<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Mail\DispMail;
use Illuminate\Http\Request;

class UserController extends Controller
{



    public function index()
    {
        return view('users.index');
    }

    
    public function user()
    {


            //find cria se vc usar save() e delete() apaga obviamente, adicionei softdeletes em User model, e dps: php artisan make:migration add_deleted_at_in_users_table

            // $user = new User();

            // $user->name= "Gabriel";
            // $user->email = "Gab@gmail.com";
            // $user->password = "123456";
            // $user->save();
             $users = User::all();

         return view('users.user', compact('users'));
    }

}
