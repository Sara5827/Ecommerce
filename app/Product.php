<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;


class Product extends Model
{
    use Commentable;
    protected $fillable = ['stock'];

    public function getPrice()
    {
        $price = $this->price / 100;

        return number_format($price, 2, ',', ' ') . ' €';
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
}
