<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusCard extends Model
{
    use HasFactory;
    protected $table = 'status_card';

    public function cardLevel()
    {
        return $this->belongsTo('user_status_card');
    }

}
