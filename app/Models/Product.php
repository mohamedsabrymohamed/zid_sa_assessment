<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Translatable;

    public $translatedAttributes = ['name', 'description'];
    protected $fillable = ['price','quantity','vat_included','store_id'];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
