<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>{{ config('app.name') }}</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Fa fa-icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


  <!-- Main Stylesheet File -->

  <link rel="stylesheet" href="{{ asset('css/acc.css') }}">

</head>

<body id="page-top">

    <!--/ Nav Star /-->
    <nav class="navbar navbar-b navbar-reduce navbar-expand-md fixed-top" id="mainNav">
        <div class="container">

            <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('')}}/#accueil">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('')}}/#a-propos">À propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('')}}/#annonce">annonce</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('')}}/#contact">Contact</a>
                    </li>
                    <li>
                        @if (Route::has('login'))
                            @auth
                            <li class="nav-item">  <a href="{{ url('/home') }}" class="nav-link">Home</a></li>
                            @else
                              <li class="nav-item">  <a href="{{ route('login') }}" class="nav-link">Log in</a></li>

                                @if (Route::has('register'))
                                  <li class="nav-item">  <a href="{{ route('register') }}" class="nav-link">Register</a></li>
                                @endif
                            @endauth
                    @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--/ Nav End /-->
   <div class="container py-5" style="margin-block: 80px">
        <div class="card">
            <img src="{{ Storage::url($post->image) }}" style="max-height: 300px;object-fit: cover" class="card-img-top">
            <div class="card-body px-4">
                <h3 class="mb-3">{{ $post->titre }}</h3>
                <label style="color: black">Description :</label>
                <p class="mb-3">  {{ $post->description }}</p>
                <label style="color: black">Email address :</label>
                <p class="mb-3"> {{ $post->email }}</p>
                <label style="color: black">Localisation :</label>
                <p class="mb-3"> {{ $post->localisation }}</p>
                <div class="d-flex">
                    <a href="{{ route('donations.create',$post->id) }}" class="btn btn-primary">Montant du don</a>
                </div>
            </div>
        </div>

   </div>


       <footer>
   <p>&copy; 2024. Tous droits réservés.</p>
</footer>



<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
crossorigin="anonymous"></script>


<script>
    $('.nav-link').click(function(){
        $('.nav-link').removeClass('active');
        $(this).addClass('active');
    })
</script>
</body>
</html>

