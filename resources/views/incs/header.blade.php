<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    @auth
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false" style="color:white;" v-pre>
            {{ Auth::user()->email }} <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                           document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    @endauth
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="/">Home <span class="sr-only">(current)</span></a>
            @if(Auth::check())           
                @if(Auth::User()->is_student)
                    <a class="nav-item nav-link" href="/programme">Programme</a>
                    <a class="nav-item nav-link" href="/pae">PAE</a>
                    <a class="nav-item nav-link" href="/cavp">Introduire une demande à la CAVP</a>
                    <a class="nav-item nav-link" href="/cavp/mydemandes">Mes demandes à la CAVP</a>
                @endif
                @if(Auth::User()->demande_inscription && !Auth::User()->is_secretary)
                    <a class="nav-item nav-link" href="/avancementdossier">Suivre l'avancement de mon dossier</a>
                @endif
                @if(!Auth::User()->demande_inscription && !Auth::User()->is_secretary)
                    <a class="nav-item nav-link" href="/studentregister">S'inscrire à l'ESI</a>
                @endif
                @if(Auth::User()->reinscription && !Auth::User()->is_secretary)
                    <a class="nav-item nav-link" href="/studentregister">S'inscrire à l'ESI</a> 
                @endif
                @if(Auth::User()->is_secretary)
                    <a class="nav-item nav-link" href="/studentlist">Liste des inscriptions</a>
                    <a class="nav-item nav-link" href="/cavp/alldemandes">Liste des demandes pour la CAVP</a>
                @endif
            @else
                <a class="nav-item nav-link" href="/login">Login</a>
                <a class="nav-item nav-link" href="/register">Register</a>
            @endif
        </div>
    </div>

</nav>
