<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Card;
use App\Models\User;

class StudentCardFav extends Model
{
    use HasFactory;
    protected $table = 'student_card_fav';

    public function card() 
    {
        return $this->belongsTo(Card::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
