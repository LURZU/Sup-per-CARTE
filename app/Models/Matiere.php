<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;
    protected $table = 'matiere';

    protected $fillable = [

        'label',
        'number_chapitre',
    ];

    public function chapitres()
    {
        return $this->belongsToMany(Chapitre::class, 'chapitre_matiere');
    }

    public function getMatiere($list_card_all) {
        foreach ($list_card_all as $card) {
            $card->matiere = $this->where('id', $card->matiere_id)->first()->label;
        }
        return $list_card_all;
    }

    public function getOneMatiere($card) {
        $card->matiere = $this->where('id', $card->matiere_id)->first()->label;
        return $card;
    }

  


}
