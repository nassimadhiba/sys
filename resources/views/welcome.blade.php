<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Title</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-Uv9jxBenhLL1+qzfUyxk5wrP+L5qvhwLTP60qjzTpL8=" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">




    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- jquery implementation -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Fa fa-icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">



  <!-- Main Stylesheet File -->

  <link rel="stylesheet" href="{{ asset('css/acc.css') }}">
  <script src="{{ asset('js/acc.js') }}"></script>

</head>

<body id="page-top">

    <!--/ Nav Star /-->
    <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
        <div class="container">

            <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link js-scroll active" href="#Accueil">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll" href="#À propos">À propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll" href="#annonce">annonce</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll" href="#Contact">Contact</a>
                    </li>
                    <li>
                        @if (Route::has('login'))
                        <div class="nav-item">
                            @auth
                            <li>  <a href="{{ url('/home') }}" class="nav-link js-scroll">Home</a></li>
                            @else
                              <li>  <a href="{{ route('login') }}" class="nav-link js-scroll">Log in</a></li>

                                @if (Route::has('register'))
                                  <li>  <a href="{{ route('register') }}" class="nav-link js-scroll">Register</a></li>
                                @endif
                            @endauth
                        </div>
                    @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--/ Nav End /-->
    <!--/ Intro Skew Star /-->
    <div id="Accueil" class="intro route bg-image" style="background-image: url('{{ asset('img/don.jpeg') }}')">
        <div class="overlay-itro"></div>
        <div class="intro-content display-table">
            <div class="table-cell">

            </div>
        </div>
    </div>

    <!--/ Intro Skew End /-->

    <section class="banner">
        <section id="À propos"  >

            <div class="col-sm-12">
                <div class="box-shadow-full">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-sm-6 col-md-5">
                                    <div class="about-img">
                                        <img src="{{ asset('img/logo.jpeg') }}"  width="350px" height="500px">

                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="about-info">
                                        <h5 class="title-left" style="left: 100px ; top: -40px;;"> À propos :</h5>
                                        <p> <span class="title-s">Name: </span> <span>Competition des associations</span></p>
                                        <p> <span class="title-s">Email: </span> <span>compitission@associations.com</span></p>
                                        <p> <span class="title-s">Phone: </span> <span>+215 602011687</span></p>
                                        <p>Dans cette plateforme vise à mettre en œuvre une solution pour faciliter la procédure de donation. Cette application fournit une plateforme conviviale et sécurisée pour les donateurs et les organisations caritatives, ce qui peut aider à augmenter la collecte fonds et à renforcer la confiance des donateurs dans les organismes de bienfaisance.
                                        </p>

                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
                </div>


</section>
<!--/ Section Services Star /-->

<section>
    <div id="annonce" class="box-shadow-full "   >
        <div class="row">
            <h5 class="title-left">
                Annonces :
            </h5>

              <div id="myCarousel" class="carousel slide">
            <button id="prev" class="carousel-control-prev" type="button" data-bs-target="#myCarousel"
                data-bs-slide="prev">
                <span class="fa fa-angle-left" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button id="next" class="carousel-control-next" type="button" data-bs-target="#myCarousel"
                data-bs-slide="next">
                <span class="fa fa-angle-right" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="card-deck">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
                            @foreach($post as $post)
                                <div class="col mb-4">
                                    <div class="card">
                                        <div class="img-wrapper">
                                            <img src="{{ asset($post->image) }}" class="card-img-top" >

                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $post->titre }}</h5>

                                        </div>
                                        <div class="card-body">

                                            <a  href="{{ route('post.show',$post->id) }}" class="btn btn-secondary">VOIR PLUS</a>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>



<!--/ Section Services Star /-->

       <div id="Contact" class="box-shadow-full">
           <div class="row">

               <h5 class="title-left">
                   Contact:
               </h5>
           </div>
           <div class="more-info">
               <p class="lead" style="font-size: 30px; font-family: Arial, Helvetica, sans-serif;color: red; top: -12px;" >
                   Pour toute demande de renseignements, n’hésitez pas à me contacter !
               </p>
               <ul class="list-ifa  ">
                   <i class="fa fa-phone-square" aria-hidden="true"> phone : +215 702011687</i><br/>
                   <i class="fa-solid fa-envelope ">  email : competition@associations.com</i>
               </ul>
           </div>
       </div>

<br/><br/><br/><br/>

       <footer>
   <p>&copy; 2024. Tous droits réservés.</p>
</footer>



<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>



</body>
</html>

