<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table ='projects';
    protected $fillable =['client_id','name','description','state','startDate'];

  //relacion para cliente
    public function client ()
    {
        return $this->belongsTo()('App\Client');
    }
}
