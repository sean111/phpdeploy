<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnvironmentHistory extends Model
{
    protected $table = 'environment_history';
    protected $fillable = [ 'environment_id', 'status', 'history' ];

    public function environment() {
        return $this->belongsTo( 'App\Environment' );
    }
}
