<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //tem como fazer como getPriceFormatedAtrribute, e la na view mudar pra price_formated MAS VOU DEIXAR ASSIM MSM
    public function getPriceAttribute()
    {
        return 'R$ ' .number_format($this->attributes['price'],2,',','.');
    }
    protected $casts = [
        'expiration_date' => 'datetime',
        'manufacturing_date' => 'datetime'
    ];

}
