<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table ='clients';
    protected $fillable =['name','cuit','state','id','created_at','updated_at'];
    public $timestamps=false;

    public function projects ()
    {
        return $this->hasMany('App\Project');
    }
}
