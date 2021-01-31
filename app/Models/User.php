<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'password_confirmation',
    ];
    public function filterAllUser($request)
    {
        $users = User::where('name', 'like', '%'. $request->get('keyword').'%');

        if(!empty($request->get('email'))){

            $users = $users->where('email', 'like', '%'. $request->get('email') . '%');
        }


        switch($request->get('order_by')){

            case 'newest':
                $users =   $users->OrderBy('created_at', 'desc');
                break;
            case 'older':
                $users =  $users->OrderBy('created_at', 'asc');

                break;

            case 'ID_asc':
                $users = $users->OrderBy('id', 'asc');
                break;

             case 'ID_desc':
                    $users = $users->OrderBy('id', 'desc');
                 break;

        }

              $users = $users->paginate(10);


        return $users;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
