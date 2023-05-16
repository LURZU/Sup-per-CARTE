<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardLevel extends Model
{
    use HasFactory;
    protected $table = 'card_level';

    public function getLevel($list_card_all) {
        foreach ($list_card_all as $card) {
            $card->level = $this->where('id', $card->card_level_id)->first()->label;
        }
        return $list_card_all;
    }
}
