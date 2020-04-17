<?php

namespace App\Vehicles;
use App\Image;
use App\Product;
use App\Vehicles\VehicleModel;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
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

    public function vehicle_categories()
    {
        return $this->belongsToMany(VehicleCategory::class);
    }

    public function vehicle_models()
    {
        return $this->hasMany(VehicleModel::class)->orderBy('visit', 'DESC');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
