<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Environment extends Model
{
    protected $table = 'environments';
    protected $fillable = [ 'name', 'path', 'project_id', 'server_id' ];

    public function project() {
        return $this->belongsTo( 'App\Project' );
    }

    public function server() {
        return $this->hasOne( 'App\Server', 'id', 'server_id' );
    }
}
