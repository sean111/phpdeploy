<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Environment extends Model
{
    protected $table = 'environments';

    public function projects() {
        return $this->belongsToMany( 'Project' );
    }

    public function serve() {
        return $this->hasOne( 'Server' );
    }
}
