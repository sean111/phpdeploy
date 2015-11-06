<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    public function environments() {
        return $this->hasMany( 'Enviroment' );
    }
}
