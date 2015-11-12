<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hash;
use Carbon\Carbon;

class Environment extends Model
{
    protected $table = 'environments';
    protected $fillable = [ 'name', 'path', 'project_id', 'server_id', 'branch', 'repo' ];

    public function project() {
        return $this->belongsTo( 'App\Project' );
    }

    public function server() {
        return $this->hasOne( 'App\Server', 'id', 'server_id' );
    }

    public function createToken() {
        return $this->attributes['token'] = md5( Carbon::now()->toDateTimeString() );
    }

    public function history() {
        return $this->hasMany( 'App\EnvironmentHistory' );
    }
}
