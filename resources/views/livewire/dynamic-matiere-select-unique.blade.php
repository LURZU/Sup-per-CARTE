<div>
    <div class="form-group row">
        <label for="matiere_id" class="col-md-4 col-form-label text-md-right">{{ __('Matiere') }}</label>
        <div class="col-md-6">
            <select wire:model="selectedMatiere" wire:change="updateChapitres" id="matiere_id" class="form-control @error('matiere_id') is-invalid @enderror" name="matiere_id">
                <option value="" selected>Matiere</option>
                @foreach ($matieres as $matiere)
                    <option value="{{$matiere->id}}" {{ in_array($matiere->id, old('matiere_id', [])) ? 'selected' : '' }}>{{ $matiere->label }}</option>
                @endforeach
            </select>

            @error('matiere_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


    <div class="form-group row">
        <label for="card_chapitre_id" class="col-md-4 col-form-label text-md-right">{{ __('Chapitre') }}</label>
        <div class="col-md-6">
            <select wire:model="selectedChapitre" id="card_chapitre_id" class="form-control @error('card_chapitre_id') is-invalid @enderror" name="card_chapitre_id" wire:key="chapitres">
                <option value="" selected>Chapitre</option>
                @foreach ($chapitres as $id => $label)
                    <option value="{{ $id }}" {{ in_array($id, (array)old('card_chapitre_id')) ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
    
            @error('card_chapitre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    
</div>

