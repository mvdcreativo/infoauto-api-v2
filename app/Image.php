<?php

namespace App;
use  App\Vehicles\Brand;
use  App\Vehicles\VehicleCategory;
use  App\Vehicles\VehicleSubModel;
use  App\Vehicles\VehicleModel;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url', 'position'
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


    public function vehicle_sub_models()
    {
        return $this->hasMany(VehicleSubModel::class);
    }


    public function products()
    {
        return $this->belongsToMany(Product::class)->with('images');
    }
}
