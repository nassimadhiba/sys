@extends('layouts.dashboard.dashlayout')


@section('content')
    <h1 class="mb-5">Ajouter un Nouveau annonce</h1>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('post.store') }}" method="POST" class="mt-3 mx-auto" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="form-label" for="image">Image de Profile</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @error('image')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label" for="titre">Titre</label>
                    <input type="text" class="form-control" id="titre" name="titre" required>
                    @error('titre')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label" for="description">Description</label>
                    <textarea type="text" rows="5"  class="form-control" id="description" name="description"></textarea>
                    @error('description')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label" for="email">Email Adresse</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    @error('email')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>



                <div class="mb-4">
                    <label class="form-label" for="localisation">Adresse</label>
                    <input type="text" class="form-control" id="localisation" name="localisation">
                    @error('localisation')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Ajouter un post</button>
            </form>

        </div>
    </div>

@endsection

