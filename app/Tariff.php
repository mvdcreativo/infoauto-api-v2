<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
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

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
