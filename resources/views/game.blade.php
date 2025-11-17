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
    <div class="page-wrapper">
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

      <game-main
        :t="t"
      :market-items="[ 
  @foreach($plants as $p)
    {
      id: {{ $p->id }},
      name: '{{ $p->name }}',
      image: '{{ asset('images/plants/'.$p->id.'.png') }}',
      price: {{ $p->price }},
      quantity: 0,
      image_url_full: '{{ asset($p->image_url) }}'
    }@if(!$loop->last),@endif
  @endforeach
]"

        :inventory-open="inventoryOpen"
        :seeds="seedsInventory"
        :fertilizer="fertilizer"
        :coins="coins"
        :selected-seed="selectedSeed"
        :show-book="showBook"
        :plots-left="plotsLeft"
        :plots-right="plotsRight"
        :denied-left="deniedLeft"
        :denied-right="deniedRight"
        :crops-left="cropsLeft"
        :crops-right="cropsRight"
        @plant-action="plantAction"
        @water-action="waterAction"
        @fertilize-action="fertilizeAction"
        @inventory-action="inventoryAction"
        @buy-fertilizer="buyFertilizer"
        @select-seed="cursorSelected"  
        @toggle-book="toggleBook"
        @plot-click="handlePlotClick"
      />
    </div>
  </div>

   <!-- Main app -->
    <script src="{{asset('js/main.js')}}"></script>
    <!-- Components -->
    <script src="{{asset('js/components/AppHeader.js')}}"></script>
    <script src="{{asset('js/components/GameMain.js')}}"></script>

   

    <script>app.mount("#app");</script>

    <footer class="primary-bg">
        <p class="white-color mt-m">Mushroom's Garden - All rights reserved</p>
    </footer>
</body>
</html>