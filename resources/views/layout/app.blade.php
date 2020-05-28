<html>
    <head>
        <title>Elegance</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('site/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('site/style.css') }}">
    </head>
    <body>

        <div id="header" class="l-header">
            <div class="wrap">
                <header class="logo">
                    <h1 class="logo__title">
                        <a href="{{ route('home') }}" class="logo__link fonte-site">
                            <img class="logo-image" src="images/logo_elegance_branco2.png">
                        </a>
                    </h1>
                </header>
                 
                <button class="menu-btn button-menu"></button>
                <nav class="menu">
                    <ul class="menu__list">
                        <li class="menu__item">
                            <a href="{{ route('sobre') }}" class="menu__link fonte-site">Sobre</a>
                        </li>
                        <li class="menu__item">
                            <a href="{{ route('vitrine') }}" class="menu__link fonte-site">Vitrine</a>
                        </li>
                        <li class="menu__item">
                            <a href="{{ route('local') }}" class="menu__link fonte-site">Visite-nos</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        @hasSection('body')
            @yield('body')
        @endif


        <!-- Footer -->
        <footer class="page-footer font-small indigo" style="background-color:#212121">
            <div class="container text-center text-md-left">
                <div class="row">
                    
                    <div class="col-md-3 mx-auto">  
                        <h5 class="font-weight-bold text-uppercase mt-3 mb-4 font-footer fonte-site">Redes Sociais</h5>
                        <ul class="list-unstyled font-footer fonte-site">
                            <li class="cat-footer">
                                <img class="icons-footer" src="images/icons/facebook.png">Facebook
                            </li>
                            <li class="cat-footer">
                                <img class="icons-footer" src="images/icons/instagram.png">Instagram
                            </li>
                            <li class="cat-footer"> 
                                <img class="icons-footer" src="images/icons/twitter.png">Twitter
                            </li>
                        </ul>
                    </div>
            
                    <hr class="clearfix w-100 d-md-none">

                    <div class="col-md-3 mx-auto">
                        <h5 class="font-weight-bold text-uppercase mt-3 mb-4 font-footer fonte-site">Onde Estamos</h5>
                        <ul class="list-unstyled font-footer fonte-site">
                            <li>
                                <img class="icons-footer" src="images/icons/local.png">Pç. Primo Torquato 
                            </li>
                            <li>
                                Nossa Senhora Aparecida/SE
                            </li>
                        </ul>
                    </div>
            
                    <hr class="clearfix w-100 d-md-none">

                    <div class="mx-auto">
                        <h5 class="font-weight-bold text-uppercase mt-3 mb-4 font-footer fonte-site">Contato</h5>
                        <ul class="list-unstyled font-footer fonte-site">
                            <li class="cat-footer">
                                <img class="icons-footer" src="images/icons/telefone.png">(13) 3464-4212
                            </li>
                            <li class="cat-footer">
                                <img class="icons-footer" src="images/icons/whats.png">(13) 98168-0439
                            </li>
                            <li class="cat-footer">
                                <img class="icons-footer" src="images/icons/email.png">lucasdida@hotmail.com
                            </li>
                        </ul>
                    </div>
            
                    <hr class="clearfix w-100 d-md-none">

                </div>
            </div>
        
            <!-- Copyright -->
            <div class="footer-copyright text-center py-2 font-footer fonte-site" style="background-color:gray">
                © 2020 Copyright: Lucas Dida - lucasdida@hotmail.com
            </div>
       
        </footer>
        

        <script src="{{asset ('site/jquery.js') }}"></script>
        <script src="{{asset ('site/bootstrap.js') }}"></script>
        <script src="{{asset ('site/top_menu/top.js') }}"></script>
        <script src="{{asset ('site/carrossel/carrossel.js') }}"></script>
        <script src="{{asset ('site/site.js') }}"></script>

    </body>
</html>