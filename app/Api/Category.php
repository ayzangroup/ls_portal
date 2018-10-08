<?php

namespace App\Api;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Category extends Authenticatable
{
    use Notifiable;
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
    
    
    protected $table = 'category_master';
    protected $primaryKey = 'categoryId';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'categoryName', 'categorySlug', 'parentCategoryId', 'categoryPriority'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function getAllServices()
    {
    
        return $this->all();
    }
}
