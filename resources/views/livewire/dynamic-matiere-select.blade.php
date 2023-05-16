<div>
    <div class="form-group row">
        <label for="matiere_id" class="col-md-4 col-form-label text-md-right">{{ __('Matiere') }}</label>
        <div class="col-md-6">
            <select wire:model="selectedMatiere" wire:change="updateChapitres" id="matiere_id" class="form-control @error('matiere_id') is-invalid @enderror" name="matiere_id[]" multiple>
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
        <label for="card_chapitre" class="col-md-4 col-form-label text-md-right">{{ __('Chapitre') }}</label>
        <div class="col-md-6">
            <select id="card_chapitre" class="form-control @error('card_chapitre') is-invalid @enderror" name="card_chapitre[]" multiple wire:key="chapitres">
                @if ($chapitres)
                    @for ($i = 1; $i <= $chapitres; $i++)
                        <option value="{{$i}}" {{ in_array($i, (array)old('card_chapitre')) ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                @endif
            </select>
        
            @error('card_chapitre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

