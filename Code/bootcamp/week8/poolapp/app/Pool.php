<?php namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Pool extends Model {
 
    public function poolOptions()
    {
        return $this->hasMany('App\PoolOptions');
    }
    
}
