<?php

namespace App\Vehicles;
use App\Image;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image_url', 'slug',' brand_id','visit'
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


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function veicle_sub_models(){
        return $this->hasMany(VehicleSubModel::class);
    }


    public function products()
    {
        return $this->hasMany(Product::class);
    }



    

}
