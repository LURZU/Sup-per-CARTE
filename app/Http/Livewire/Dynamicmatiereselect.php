<?php 
// app/Http/Livewire/DynamicMatiereSelect.php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CardLevel;
use App\Models\Matiere;
use App\Models\Formation;


class DynamicMatiereSelect extends Component
{
    public $formation;
    public $selectedMatiere;
    public $matiere_id;
    public $chapitre_id;
    public $chapitres = 0;
    public $matieres;


    public function updateChapitres()
    {   
        $matiere = Matiere::find($this->selectedMatiere);
        if ($matiere) {
            foreach($matiere as $mat) {
                $this->chapitres = $mat->number_chapitre;
            }
        } else {
            $this->chapitres = null;
        }
    }


    public function render()
    {
        $user = auth()->user();
        $formation = Formation::find($user->formation_id);
        //Contain all of "matiere" for the formation_id
        $this->matieres = $formation->formation_matiere()->wherePivot('formation_id', $user->formation_id)->get();
        $cardLevels =  CardLevel::all(); 
        return view('livewire.dynamic-matiere-select');
    }

 
}
