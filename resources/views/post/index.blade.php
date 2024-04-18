
@extends("layouts.dashboard.dashlayout")

@section("content")

<p class="bold-text">Voici une liste de toutes les annonces</p>

<div class="text-end mb-3">
    <a href="{{ route('post.create') }}" class="btn btn-success" >
        Ajouter une annonce
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-striped table-hover">

                <thead>
                    <tr>
                        <th>image</th>
                        <th>titre</th>
                        <th>email</th>
                        <th>localisation</th>
                        <th>Actions</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($post as $post)

                    <tr>

                        <td><img style="object-fit: cover" src="{{Storage::url($post->image) }}" width="100" /></td>
                        <td>{{ $post->titre }}</td>
                        <td>{{ $post->email}}</td>
                        <td>{{ $post->localisation }}</td>
                        <td>

                            <div class="d-flex align-items-center">

                                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-success me-2">
                                    modifier
                                </a>

                                <a class="btn btn-danger" href="{{ route('post.destroy', $post->id) }}" onclick="event.preventDefault(); if (confirm('Etes-vous sûr de vouloir supprimer cette annonce ?')) {document.getElementById('delete-form-{{ $post->id }}').submit();}" class="mr-2">
                                    supprimer
                                </a>

                                <form id="delete-form-{{ $post->id }}" action="{{ route('post.destroy', $post->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                @if ($role == 'admin')
                                @if ($post->statut)
                                    <a href="{{ route('post.accepter', $post->id) }}" class="btn btn-warning me-2">
                                        Refuser
                                    </a>
                                @else
                                    <a href="{{ route('post.accepter', $post->id) }}" class="btn btn-info  me-2">
                                        Accepter
                                    </a>
                                @endif
                            @endif
                            </div>

                        </td>

                    </tr>

                @endforeach

            </table>

        </div>
    </div>
</div>

@endsection
