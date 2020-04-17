<?php

namespace App\Vehicles;
use App\Image;
use App\Product;
use App\Vehicles\VehicleModel;
use Illuminate\Database\Eloquent\Model;

class VehicleSubModel extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug',
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

    public function vehicle_model(){
        return $this->belongsTo(VehicleModel::class)->with('brand');
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
