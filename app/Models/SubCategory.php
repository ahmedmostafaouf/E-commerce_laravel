<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class SubCategory extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $fillable = [
        'name',
        'photo',
        'description',
        'category_id'
    ];
    public function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function products(){
        return $this->hasMany('App\Models\Products','subCategory_id');
    }
    public function getPhotoAttribute($q){
        return ($q!==null)?asset('images/sub-category/'.$q):"";
    }
}
