<?php

namespace App\Http\Controllers\Card;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\StudentCardFav;
use App\Models\Card;
use App\Models\CardLevel;
use App\Http\Requests\CardRequest;
use App\Models\Matiere;
use App\Models\Chapitre;
use App\Models\CardSemestre; 
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;



class CardListController extends Controller
{
    
    public function showMyCard(): View {
        $user = User::find(auth()->id());
        if (auth()->user()) {
            // Display all users
            $users = User::where('id', auth()->id())->get();
        }
        $list_card_all = Card::where('created_by', $user->name)->get();
        $level = new CardLevel();
        $matiere = new Matiere();
        $chapitre = new Chapitre();
        $list_card_all = $level->getLevel($list_card_all);
        $list_card_all =  $matiere->getMatiere($list_card_all);
        $list_card_all = $chapitre->getChapitre($list_card_all);

        return view('student.card.mycard', compact('users', 'list_card_all'));
    }

     //function to show all card
     public function showAll(): View {
        $user = User::find(auth()->id());
        if (auth()->user()) {
            // Display all users
            $users = User::where('id', auth()->id())->get();
        }
        $list_card_all = Card::all();
        $level = new CardLevel();
        $matiere = new Matiere();
        $chapitre = new Chapitre();
        $list_card_all = $chapitre->getChapitre($list_card_all);
        $list_card_all = $level->getLevel($list_card_all);
        $list_card_all =  $matiere->getMatiere($list_card_all);
        return view('student.card.index', compact('users', 'list_card_all'));
    }

    public function showFavCard() {
        $user = User::find(auth()->id());
        $favorites = $user->favorites;
        if (auth()->user()) {
            // Display all users
            $users = User::where('id', auth()->id())->get();
        }
        $list_card_all = $favorites;
        $level = new CardLevel();
        $matiere = new Matiere();
        $chapitre = new Chapitre();
        $list_card_all = $chapitre->getChapitre($list_card_all);
        $list_card_all = $level->getLevel($list_card_all);
        $list_card_all =  $matiere->getMatiere($list_card_all);
        
        return view('student.card.favcard', compact('list_card_all', 'users'));
    }

}
