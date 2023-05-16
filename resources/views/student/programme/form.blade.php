<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New Card') }}</div>

                <div class="card-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        @csrf
                       
                        @livewire('dynamic-matiere-select')
                              
                        <div class="form-group row">
                            <label for="card_level_id" class="col-md-4 col-form-label text-md-right">{{ __('Level') }}</label>
                            <div class="col-md-6">
                                <select id="card_level_id" class="form-control @error('card_level_id') is-invalid @enderror" name="card_level_id[]" multiple>
                                    @foreach ($cardLevels as $level)
                                        <option value="{{ $level->id }}" {{ in_array($level->id, old('card_level_id', [])) ? 'selected' : '' }}>{{ $level->label }}</option>
                                    @endforeach
                                </select>

                                @error('level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                  
                        
                        <div class="form-group row">
                            <label for="number_card" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de carte') }}</label>
                            <div class="col-md-6">
                                <select id="number_card" class="form-control @error('number_card') is-invalid @enderror" name="number_card" >
                                    <option value="" disabled selected>Select a number of card</option>
                                    @for ($i = 5; $i <= 30; $i+=5)
                                        <option value="{{$i}}" {{ old($i) == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                                @error('semestre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                                
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Selectionner') }}
                                </button>
                            </div>
                        </div>
                    </form>

   
                </div>
            </div>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
