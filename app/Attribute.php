<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image_id','slug', 'multi_option'
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
        return $this->belongsToMany(Product::class);
    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }
}
