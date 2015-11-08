<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $table = 'servers';
    protected $fillable = [ 'name', 'host', 'username', 'ssh_key' ];
    public function environments() {
        return $this->belongsToMany( 'Environment' );
    }
}
