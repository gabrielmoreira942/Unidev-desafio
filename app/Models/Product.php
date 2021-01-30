<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'provider', 'price', 'manufacturing_date', 'expiration_date'];

    //tem como fazer como getPriceFormatedAtrribute, e la na view mudar pra price_formated MAS VOU DEIXAR ASSIM MSM
    public function getPriceAttribute()
    {
        return 'R$ ' .number_format($this->attributes['price'],2,',','.');
    }
    protected $casts = [
        'expiration_date' => 'datetime',
        'manufacturing_date' => 'datetime'
    ];


    public function filterAll($request)
    {
        $products = Product::where('name', 'like', '%'. $request->get('keyword').'%');


        if(!empty($request->get('price_from'))){

            $products = $products->where('price', '>=', $request->get('price_from')?? 0);
        }
        if(!empty($request->get('price_to'))){

            $products = $products->where('price', '<=', $request->get('price_to')?? 0);
        }


        switch($request->get('order_by')){

            case 'newest':
                $products =   $products->OrderBy('created_at', 'desc');
                break;
            case 'older':
                $products =  $products->OrderBy('created_at', 'asc');

                break;
            case 'price_desc':
                $products =  $products->OrderBy('price', 'desc');

            case 'price_asc':
                $products = $products->OrderBy('price', 'asc');
                break;

            case 'ID_asc':
                $products = $products->OrderBy('id', 'asc');
                break;

             case 'ID_desc':
                    $products = $products->OrderBy('id', 'desc');
                 break;

        }

              $products = $products->paginate(10);


        return $products;
    }
}
