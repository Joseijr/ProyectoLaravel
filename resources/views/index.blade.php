

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
        contact-url="{{ route('contact.form') }}"
        logout-url="{{ route('logout') }}"
        @change-language="changeLanguage"
        @toggle-menu="showHam">
        </app-header>

        <!-- componente del banner -->
        <app-banner :t="t"></app-banner>

        <!-- componente de la primera seccion de texto -->
        <section-one :t="t"></section-one>

        <!-- segunda sección -->
        <section-two :t="t"
         login-url="{{ route('login.form') }}"
         ></section-two>

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