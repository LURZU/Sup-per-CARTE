<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapitre extends Model
{
    use HasFactory;
    protected $table = 'chapitre';

    public function chapitre_matiere()
    {
        return $this->belongsToMany(Matiere::class, 'formation_matiere', 'matiere_id', 'chapitre_id');
    }

    public function getChapitre($list_card_all) {
            foreach ($list_card_all as $card) {
                $card->chapitre = $this->where('id', $card->card_chapitre_id)->first()->label;
            }

            return $list_card_all;
        } 
}
