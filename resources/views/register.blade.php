<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">
    <title>Crear Cuenta</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://unpkg.com/vue@3.4.21/dist/vue.global.js"></script>
</head>
<body class="signin-back">
      <div id="app">
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
        contact-url="{{ route('contact.form') }}"
        @change-language="changeLanguage"
        @toggle-menu="showHam">
        </app-header>

         <form action="{{ route('user.store') }}" method="POST">
        @csrf

        <section class="input-display">
            <h1 class="white-color text-king my-xs">Crear Cuenta</h1>
            
            <input class="m-xxl text-xl yellow-border white-color user-icon" 
                   type="text" 
                   name="name" 
                   placeholder="Nombre">
            
            <input class="m-xxl text-xl yellow-border white-color email-icon" 
                   type="email" 
                   name="email" 
                   placeholder="Email">
            
            <input class="m-xxl text-xl yellow-border white-color password-icon" 
                   type="password" 
                   name="password" 
                   placeholder="Contraseña">

            <p class="white-color text-xl">
                ¿Ya tienes cuenta? 
                <a href="{{ route('login.form') }}" class="yellow-color underline link cursor">
                    Inicia sesión
                </a>
            </p>

            <button type="submit" class="btn-account text-xl yellow-bg white-color my-xxl">
                Registrarse
            </button>
        </section>
    </form>
      </div>

   <footer class="primary-bg">
        <p class="white-color mt-m">Mushroom's Garden - All rights reserved</p>
    </footer>
</body>

 <!-- Main app -->
    <script src="{{asset('js/main.js')}}"></script>
    <!-- Components -->
    <script src="{{asset('js/components/AppHeader.js')}}"></script>
  

        <script>app.mount("#app");</script>
</html>
