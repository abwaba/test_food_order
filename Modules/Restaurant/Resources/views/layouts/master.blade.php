<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Restaurant</title>

       {{-- Laravel Mix - CSS File --}}
       <link rel="stylesheet" href="{{ mix('css/restaurant.css') }}">

    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
  <a class="navbar-brand" href="#">Restaurant</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('restaurant/orders') }}">Pesanan <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('restaurant/foods') }}">Food</a>
      </li>
    </ul>
  </div>
</nav>
    <div class="container" id="app">
    @yield('content')
    </div>

        {{-- Laravel Mix - JS File --}}
        <script src="{{ mix('js/restaurant.js') }}"></script>
    </body>
</html>
