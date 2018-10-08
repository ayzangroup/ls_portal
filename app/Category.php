<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class Category extends Authenticatable
{
    use Notifiable;

    // protected $table = 'panel_user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'category_master';
    protected $primaryKey = 'categoryId';
    
    public $timestamps = false;
    protected $fillable = [
        'serviceId', 'categoryName', 'categorySlug','parentCategoryId','categoryPriority'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function countServices()
    {
        return $this->getCategories()->count();
    }
    public function getCategories()
    {
    
        return $this->all();
    }
    public function getCategoriesById($id)
    {
        return $this->where("categoryId",'=',$id);
    }
    public function categoryItems() {
        return $this->belongsTo('App\Items','categoryId');
    }
    
}
