<?php

namespace App\Ubications;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Neighborhood extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'city_id', 'code'
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

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function Users()
    {
        return $this->hasMany(User::class);
    }
}
