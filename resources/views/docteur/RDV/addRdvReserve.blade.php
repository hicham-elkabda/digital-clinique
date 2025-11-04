@extends('docteur.partial.app')
@section('title', 'Dashboard')
@section('content')
<div class="container mt-4">
    <h2>Réserver un Rendez-vous</h2>
    <form id="rdvForm" action="{{ route('rdvReserver.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>

        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required>
        </div>

        <div class="mb-3">
            <label for="cin" class="form-label">CIN</label>
            <input type="text" class="form-control" id="cin" name="cin" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>

        <div class="mb-3">
            <label for="heure_reservation" class="form-label">Heure</label>
            <select class="form-select" id="heure_reservation" name="heure_reservation" required>
                <option value="" disabled selected>Choisir une heure</option>
                @foreach($times as $time)
                    <option value="{{ $time->heure }}">{{ \Carbon\Carbon::parse($time->heure)->format('H:i') }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_acte" class="form-label">Acte</label>
            <select class="form-select" id="id_acte" name="id_acte" required>
                <option value="" disabled selected>Choisir un acte</option>
                @foreach($actes as $acte)
                    <option value="{{ $acte->id }}">{{ $acte->nom }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Réserver</button>
    </form>
</div>

<script>
    document.getElementById('rdvForm').addEventListener('submit', function (e) {
        e.preventDefault();

        let date = document.getElementById('date').value;
        let heure = document.getElementById('heure_reservation').value;

        if (!date || !heure) {
            alert("Veuillez choisir une date et une heure.");
            return;
        }

        // Vérification AJAX côté serveur
        fetch("{{ route('rdv.checkAvailability') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ date: date, heure_reservation: heure })
        })
        .then(response => response.json())
        .then(data => {
            if (data.available) {
                this.submit(); // pas de conflit → on envoie le formulaire
            } else {
                alert("Un rendez-vous existe déjà dans les 45 minutes autour de cette heure !");
            }
        })
        .catch(error => {
            console.error("Erreur:", error);
            alert("Erreur lors de la vérification. Veuillez réessayer.");
        });
    });
</script>
@endsection
