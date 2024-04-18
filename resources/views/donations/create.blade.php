<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>{{ config('app.name') }}</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="background-color: #eee">
    <nav class="navbar navbar-light bg-white py-3">
        <div class="container">
            <a href="/" class="navbar-brand">{{ config('app.name') }}</a>
        </div>
    </nav>
  <div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-4">
                <strong>En effectuant un don en lien</strong>
            </div>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form method="POST" action="{{ route('donations.store') }}">
                @csrf
                <div class="row">
                    <input type="hidden" name="post_id" value="{{ $postId }}" />
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nom_prenom" class="form-label">Nom et Prénom</label>
                            <input type="text" class="form-control @error('nom_prenom') is-invalid @enderror" id="nom_prenom" name="nom_prenom" value="{{ old('nom_prenom') }}">
                            @error('nom_prenom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="adresse" class="form-label">Adresse</label>
                            <input type="text" class="form-control @error('adresse') is-invalid @enderror" id="adresse" name="adresse" value="{{ old('adresse') }}">
                            @error('adresse')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tel" class="form-label">Téléphone</label>
                            <input type="tel" class="form-control @error('tel') is-invalid @enderror" id="tel" name="tel" value="{{ old('tel') }}">
                            @error('tel')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pays" class="form-label">Pays</label>
                            <select class="form-select @error('pays') is-invalid @enderror" id="pays" name="pays">
                                <option value="" selected disabled>Choisir le pays</option>
                                <option value="france" {{ old('pays') == 'france' ? 'selected' : '' }}>France</option>
                                <option value="morocco" {{ old('pays') == 'morocco' ? 'selected' : '' }}>Maroc</option>
                                <option value="tunisia" {{ old('pays') == 'tunisia' ? 'selected' : '' }}>Tunisie</option>
                                <option value="algeria" {{ old('pays') == 'algeria' ? 'selected' : '' }}>Algérie</option>
                                <option value="egypt" {{ old('pays') == 'egypt' ? 'selected' : '' }}>Egypte</option>
                                <option value="spain" {{ old('pays') == 'spain' ? 'selected' : '' }}>Espagne</option>
                                <option value="italy" {{ old('pays') == 'italy' ? 'selected' : '' }}>Italie</option>
                                <option value="germany" {{ old('pays') == 'germany' ? 'selected' : '' }}>Allemagne</option>
                                <!-- Add more options as needed -->
                            </select>
                            @error('pays')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="ville" class="form-label">Ville</label>
                            <input type="text" class="form-control @error('ville') is-invalid @enderror" id="ville" name="ville" value="{{ old('ville') }}">
                            @error('ville')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="etat" class="form-label">État</label>
                            <input type="text" class="form-control @error('etat') is-invalid @enderror" id="etat" name="etat" value="{{ old('etat') }}">
                            @error('etat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="code_postal" class="form-label">Code Postal</label>
                            <input type="text" class="form-control @error('code_postal') is-invalid @enderror" id="code_postal" name="code_postal" value="{{ old('code_postal') }}">
                            @error('code_postal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="montant_don" class="form-label">Montant du Don</label>
                            <select class="form-select @error('montant_don') is-invalid @enderror" id="montant_don" name="montant_don">
                                <option value="" selected disabled>Choisir le montant du don</option>
                                <option value="10" {{ old('montant_don') == '10' ? 'selected' : '' }}>10 MAD</option>
                                <option value="20" {{ old('montant_don') == '20' ? 'selected' : '' }}>20 MAD</option>
                                <option value="50" {{ old('montant_don') == '50' ? 'selected' : '' }}>50 MAD</option>
                                <option value="100" {{ old('montant_don') == '100' ? 'selected' : '' }}>100 MAD</option>
                                <option value="200" {{ old('montant_don') == '200' ? 'selected' : '' }}>200 MAD</option>
                                <!-- Add other options as needed -->
                            </select>
                            @error('montant_don')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                    </div>
                </div>
                <div class="text-center py-5">
                    <button type="submit" class="btn btn-success btn-lg">Valider</button>
                </div>
            </form>
        </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
