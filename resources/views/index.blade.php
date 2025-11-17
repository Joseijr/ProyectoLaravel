<!-- 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Plantas</title>
    <style>
       body {
         background: #d7d7d7;
         font-family: Arial, sans-serif;
         margin: 30px;
       }

       h1 {
           text-align: center;
           margin-bottom: 25px;
           color: #333;
       }

       h3 {
           color: #2a7a2a;
           margin-bottom: 10px;
       }

       .plant-card {
           background: #f5f5f5;
           padding: 15px;
           border-radius: 8px;
           margin-bottom: 20px;
       }
    </style>
</head>
<body>

    <h1>Lista de Plantas</h1>

@if(auth()->check())
    <p>Bienvenido, {{ auth()->user()->name }}</p>
    <a href="{{ route('logout') }}" class="extra-color underline link cursor">
        Cerrar sesión
    </a>
@else
    <a href="{{ route('login.form') }}" class="yellow-color underline link cursor">
        Inicia sesión
    </a>
    <br>
    <a href="{{ route('user.create') }}" class="extra-color underline link cursor">
        Regístrate
    </a>
@endif



    @foreach ($plants as $plant)
        <div class="plant-card">
            <h3>{{ $plant->name }}</h3>
            <p><strong>Horas de crecimiento:</strong> {{ $plant->growth_hours }}</p>
            <p><strong>Agua necesaria por día:</strong> {{ $plant->water_need_per_day }}</p>
            <p><strong>Efecto del fertilizante:</strong> {{ $plant->fertilizer_effect }}</p>
            <p><strong>Precio:</strong> ${{ $plant->price }}</p>
            <p><strong>Descripción:</strong> {{ $plant->description }}</p>
        </div>
    @endforeach

</body>
</html> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://unpkg.com/vue@3.4.21/dist/vue.global.js"></script>
    <title>Mushroom's Garden</title>

</head>

<body>
    <div id="app">
        <!-- Header Component (Vue) -->
        <app-header :t="t" 
        :lang="lang" 
        :ancho="ancho" 
        :menu="menu" 
        :is-logged-in="{{ auth()->check() ? 'true' : 'false' }}"
        user-name="{{ auth()->check() ? auth()->user()->name : '' }}"
        home-url="{{ route('index.form') }}"
        game-url="{{ route('game.form') }}"
        login-url="{{ route('login.form') }}"
        register-url="{{ route('user.create') }}"
        logout-url="{{ route('logout') }}"
        @change-language="changeLanguage"
        @toggle-menu="showHam">
        </app-header>

        <!-- componente del banner -->
        <app-banner :t="t"></app-banner>

        <!-- componente de la primera seccion de texto -->
        <section-one :t="t"></section-one>

        <!-- segunda sección -->
        <section-two :t="t"></section-two>

        <!-- carrousel -->
        <carousel-section :i="i" 
        :show="show" 
        :ancho="ancho" 
        @prev-image="prevImage"
        @next-image="nextImage" @show-image="showImage" @hide-image="hideImage">
            
    </carousel-section>
    </div>



    <!-- Main app -->
    <script src="{{asset('js/main.js')}}"></script>
    <!-- Components -->
    <script src="{{asset('js/components/AppHeader.js')}}"></script>
    <script src="{{asset('js/components/AppBanner.js')}}"></script>
    <script src="{{asset('js/components/SectionOne.js')}}"></script>
    <script src="{{asset('js/components/SectionTwo.js')}}"></script>
    <script src="{{asset('js/components/CarouselSection.js')}}"></script>

    <script>app.mount("#app");</script>

    <footer class="primary-bg">
        <p class="white-color mt-m">Mushroom's Garden - All rights reserved</p>
    </footer>
</body>

</html>