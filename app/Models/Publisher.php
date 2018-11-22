<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    
    
    protected $fillable = [
    
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
    
    ];
    
    
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/publishers/'.$this->getKey());
    }
    public function books()
    {
        return $this->hasMany('App\Models\Book');
    }
}
