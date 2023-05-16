<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;
    protected $table = 'formation';

    public function formation_matiere()
    {
        return $this->belongsToMany(Matiere::class, 'formation_matiere', 'matiere_id', 'formation_id');
    }
}
