<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrivateMessage extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
