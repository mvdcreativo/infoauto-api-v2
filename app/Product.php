<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description','name_concat', 'price', 'state', 'km', 'year', 'visit', 'url'
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


    ////RELACIONES
    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }

    public function brand()
    {
        return $this->belongsTo(Vehicles\Brand::class);
    }

    public function vehicle_category()
    {
        return $this->belongsTo(Vehicles\VehicleCategory::class);
    }

    public function vehicle_model()
    {
        return $this->belongsTo(Vehicles\VehicleModel::class);
    }

    public function vehicle_sub_model()
    {
        return $this->belongsTo(Vehicles\VehicleSubModel::class);
    }

    public function city()
    {
        return $this->belongsTo(Ubications\City::class)->with('state');
    }
    public function neighborhood()
    {
        return $this->belongsTo(Ubications\Neighborhood::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function price_condition()
    {
        return $this->belongsTo(PriceCondition::class);
    }

    public function tariff()
    {
        return $this->belongsTo(Tariff::class)->with('currency');
    }
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function extras()
    {
        return $this->belongsToMany(Extra::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class)->with('attributes', 'attribute');
    }

    public function images()
    {
        return $this->belongsToMany(Image::class)->orderBy('position', 'ASC');
    }

    public function status()
    {
        return $this->belongsTo('App\Status');
    }


    ////////////////////////////


//SEARCHER
    public function scopeCategory($query, $category){
        if($category)
            return $query->where('vehicle_category_id', $category);
    }

    public function scopeBrand($query, $brand){
        if($brand)
            return $query->where('brand_id', $brand);
    }

    public function scopeModel($query, $model){
        if($model)
            return $query->where('vehicle_model_id', $model);
    }

    public function scopeSubModel($query, $sub_model){
        if($sub_model)
            return $query->where('vehicle_sub_model_id', $sub_model);
    }

    public function scopeCilindrada($query, $cilindrada){
        if($cilindrada)
            return $query->orWhere('cilindrada', $cilindrada);
    }



    public function scopePrice_min($query, $price_min){
        if($price_min){


                return $query->where('price', '>=' ,$price_min);

        }
            //
    }

    public function scopePrice_max($query, $price_max){
        if($price_max)
            return $query->where('price', '<=', $price_max);
    }

    public function scopeYear_min($query, $year_min){
        if($year_min)
            return $query->where('year' ,'>=', $year_min);
    }

    public function scopeYear_max($query, $year_max){
        if($year_max)
            return $query->where('year','<=', $year_max);
    }

    public function scopeUser_id($query, $user_id){
        if($user_id)
            return $query->where('user_id', $user_id);
    }
    public function scopeTariff_id($query, $tariff_id){
        if($tariff_id)
            return $query->where('tariff_id', $tariff_id);
    }
    public function scopeUser($query, $user){
        if($user){
            $usuario = User::where('slug',$user)->get();
            $iduser = $usuario[0]->id;
            return $query->where('user_id', $iduser);
        }
    }
    public function scopeCategoria($query, $cateoria){
        if($cateoria){
            $category = Vehicles\VehicleCategory::where('slug',$cateoria)->get();
            $idcateoria = $category[0]->id;
            return $query->where('vehicle_category_id', $idcateoria);
        }
    }

    public function scopeMarca($query, $marca){
        if($marca){
            $brand = Vehicles\Brand::where('slug',$marca)->get();
            $idmarca = $brand[0]->id;
            return $query->where('brand_id', $idmarca);
        }
    }
    public function scopeModelo($query, $modelo){
        if($modelo){
            $model = Vehicles\VehicleModel::where('slug',$modelo)->get();
            $idmodelo = $model[0]->id;
            return $query->where('vehicle_model_id', $idmodelo);
        }
    }
    public function scopeCondition($query, $condition){
        if($condition){
            $condition = Condition::where('slug',$condition)->get();
            $idcondition = $condition[0]->id;
            return $query->where('condition_id', $idcondition);
        }
    }
    public function scopeAttribute($query, $attribute){
        if($attribute){
            if(is_array($attribute)){
                foreach ($attribute as $attr) {
                    $attr = Attribute::where('slug',$attr)->get();
                    $idattribute = $attr[0]->id;

                    $queryAtt = $query->whereHas('attributes', function($q) use ($idattribute){
                        $q->where('attribute_id',$idattribute);
                    });
                }
                return $queryAtt;
            }else{
                $attr = Attribute::where('slug',$attribute)->get();
                $idattribute = $attr[0]->id;

                $queryAtt = $query->whereHas('attributes', function($q) use ($idattribute){
                    $q->where('attribute_id',$idattribute);
                });
                return $queryAtt;

            }

        }
    }
    public function scopeSearcher($query, $searcher){
        if($searcher)
            return $query->where('name_concat', 'LIKE', "%$searcher%")
                ->orWhere('description', 'LIKE', "%$searcher%");

    }



    public function scopeYear($query, $year){
        if($year){
            return $query->where('year' , $year);

        }
    }

    public function scopeKms($query, $kms){
        if($kms){

            $kms_max = $kms * 1.05;
            $kms_min = $kms / 1.05;

            return $query->where('km' ,"<" , $kms_max)
                            ->where('km', ">", $kms_min);

        }
    }


}
