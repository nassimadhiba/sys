@extends('layouts.dashboard.dashlayout')

@section('content')

        <div class="card">
            <div class="card-header text-white bg-primary">
             <strong class="text-white fs-5">   Montant du don</strong>
            </div>
            <div class="card-body">
                <p><strong>Nom et Prénom:</strong> {{ $donation->nom_prenom }}</p>
                <p><strong>Email:</strong> {{ $donation->email }}</p>
                <p><strong>Adresse:</strong> {{ $donation->adresse }}</p>
                <p><strong>Téléphone:</strong> {{ $donation->tel }}</p>
                <p><strong>Ville:</strong> {{ $donation->ville }}</p>
                <p><strong>État:</strong> {{ $donation->etat }}</p>
                <p><strong>Code Postal:</strong> {{ $donation->code_postal }}</p>
                <p><strong>Pays:</strong> {{ $donation->pays }}</p>
                <p><strong>Montant du Don:</strong> {{ $donation->montant_don }}</p>
            </div>
            <div class="card-footer">
                <form action="{{ route('donations.destroy', $donation->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this donation?')">Delete</button>
                </form>
            </div>
    
</div>
@endsection
