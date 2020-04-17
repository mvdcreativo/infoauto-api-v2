<?php

namespace App\Vehicles;
use App\Image;
use App\Product;


use Illuminate\Database\Eloquent\Model;

class VehicleCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image_url', 'slug'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];

    public function brands(){
        return $this->belongsToMany(Brand::class);
    }


    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
