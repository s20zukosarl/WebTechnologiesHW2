<!doctype html>
<html lang="lv">
 <head>
 <meta charset="utf-8">
 <title>PD 2 - {{ $title }}</title>
 <meta name="description" content="">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-
beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-
eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="/js/main.js"></script>
 </head>
 <body>
 <div class="bg-light mb-4 py-4">
 <div class="container">
 <div class="row">
 <div class="col-md-12">
 <nav class="navbar navbar-light navbar-expand-md">
 <header class="navbar navbar-light">
 <span class="navbar-brand mb-0 h1">sarlote.zukovska</span>

 <button class="navbar-toggler" type="button" data-bstoggle="collapse" data-bs-target="#navbarNav">
 <span class="navbar-toggler-icon"></span>
 </button>
  
 <div class="collapse navbar-collapse" id="navbarNav">
 <ul class="navbar-nav">
 <li class="nav-item">
 <a class="nav-link" href="/">Sākumlapa</a>
 </li>
 @if(Auth::check())
 <li class="nav-item">
 <a class="nav-link" href="/artists">Mākslinieki</a>
 </li>
 <li class="nav-item">
 <a class="nav-link" href="/paintings">Gleznas</a>
 </li>
 <li class="nav-item">
 <a class="nav-link" href="/styles">Stili</a>
</li>
 <li class="nav-item">
 <a class="nav-link" href="/logout">Beigt darbu</a>
 </li>
@else
 <li class="nav-item">
 <a class="nav-link" href="/login">Pieslēgties</a>
 </li>
@endif
</ul>
 </div>
 
 </nav>
 </header>
 </div>
 </div>
 </div>
 </div>
 <div class="container mb-4">
 <div class="row">
 <main class="col-md-12">
 @yield('content')
 </main>
 </div>
 </div>
 <div class="bg-dark text-white py-4 mt-4 text-center">
 <div class="container">
 <div class="row">
 
 <footer class="col-md-12">
 Ventspils Augstskola, 2023
 </footer>
 </div>
 </div>
 </div>
 

 </body>
</html>
