<?php 
// app/Http/Livewire/DynamicMatiereSelect.php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CardLevel;
use App\Models\Matiere;
use App\Models\Formation;


class DynamicMatiereSelectUnique extends Component
{
    public $formation;
    public $selectedMatiere;
    public $matiere_id;
    public $chapitre_id;
    public $chapitres = [];
    public $matieres;
    public $selectedChapitre;


    public function updateChapitres()
    {   
        $matiere = Matiere::with('chapitres')->find($this->selectedMatiere);
        
        if ($matiere) {
            $this->chapitres = $matiere->chapitres->pluck('label', 'id')->toArray();
        } else {
            $this->chapitres = [];
        }
    }

    public function submitForm()
    {
        $this->redirect(route('card.edit', ['card' => $this->card, 'matiereId' => $this->selectedMatiere, 'chapitreId' => $this->selectedChapitre]));
    }


    public function render()
    {
        $user = auth()->user();
        $formation = Formation::find($user->formation_id);
        //Contain all of "matiere" for the formation_id
        $this->matieres = $formation->formation_matiere()->wherePivot('formation_id', $user->formation_id)->get();
        $cardLevels =  CardLevel::all(); 
       
        // Récupérer les chapitres pour chaque matière
        $this->matieres->each(function ($matiere) {
            $matiere->chapitres = $matiere->chapitres()->pluck('label', 'id');
        });
        return view('livewire.dynamic-matiere-select-unique');
    }

 
}
