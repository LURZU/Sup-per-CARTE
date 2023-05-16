<div class="container">
    @if (auth()->user())
    <div class="row">
        @foreach ($list_card_all as $list_card)
        <div class="col-md-4">
            <div class="card mb-4 shadow">
                <div class="card-body">
                    <h5 class="card-title">Créée par {{ $list_card->created_by }}</h5>
                    <p class="card-text">Chapitre {{ $list_card->chapitre }}</p>
                    <p class="card-text">Niveau: {{ $list_card->level }}</p>
                    <p class="card-text">Matière: {{ $list_card->matiere }}</p>
                    <p class="card-text">Créée le: {{ $list_card->created_at }}</p>
                    <p class="card-text">Question: {{ $list_card->question }}</p>
                    <p class="card-text">Réponse: {{ $list_card->response }}</p>
                    <a href="{{ route('card.edit', ['card' => $list_card]) }}" class="btn btn-primary">Modifier</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>