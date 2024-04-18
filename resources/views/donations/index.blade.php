@extends('layouts.dashboard.dashlayout')

@section('content')


        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card">

            <div class="card-header text-white bg-primary">
                <strong style="font-size: 22px">Montant du don</strong>

            </div>
            <div class="table-responsive">

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <!-- You can add a column for selection here if needed -->
                            <th>Nom et Prénom</th>
                            <th>Email</th>
                            <th>Montant du Don</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($donations as $donation)

                        <tr>


                            <td>{{ $donation->nom_prenom }}</td>
                            <td>{{ $donation->email}}</td>
                            <td>{{ $donation->montant_don }}</td>
                            <td>

                                <div class="d-flex align-items-center">
                                    <a href="{{ route('donations.show', $donation->id) }}" class="btn btn-info text-white btn-sm me-2">
                                        View details
                                    </a>
                                   
                                    <a href="{{ route('donations.destroy', $donation->id) }}" class="btn btn-danger btn-sm" onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this donation?')) {document.getElementById('delete-form-{{ $donation->id }}').submit();}" class="mr-2">
                                        Delete
                                    </a>

                                    <form id="delete-form-{{ $donation->id }}" action="{{ route('donations.destroy', $donation->id) }}" method="donation" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>



                            </td>

                        </tr>

                        @endforeach

                </table>
                <div class="card-body">
                    {{ $donations->links() }}


                </div>
            </div>
</div>
@endsection
