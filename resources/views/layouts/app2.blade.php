<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Time Waste ') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="{{asset('bootstrap-4.0.0-dist/css/bootstrap.min.css')}}" type="text/css">

    </head>
   <body>
   <main>
       <div class="container-xl">
       <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
               <a class="navbar-brand" href="#">Stock Manager</a>
               <ul class="navbar-nav ml-auto mt-2 mt-lg-0 ">
                   <li class="nav-item {{ \Request::path()== 'home' ? 'active' : ' ' }}" >

                       <a class="nav-link" href="{{route('sm.home.index')}}">Items</a>
                   </li>
                   <li class="nav-item  {{ \Request::path()=='brands' ?'active':'' }}">
                       <a class="nav-link" href="{{route('sm.brands.index')}}">Brands</a>
                   </li>
                   <li class="nav-item {{\Request::path()=='modals'? 'active':'' }}">
                       <a class="nav-link " href="{{route('sm.modals.index')}}">Modals</a>
                   </li>

                   <li class="nav-item ">
                       <form method="POST" action="{{ route('logout') }}">
                           @csrf
                           <a class="nav-link text-dark " href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                               {{ __('Logout') }}
                           </a>

                       </form>
                   </li>
               </ul>

           </div>
       </nav>
       </div>
       @yield("content")

   </main>



   <script src="{{asset('bootstrap-4.0.0-dist/Jquery-3.4.1.min.js')}}"></script>
   <script src="{{asset('bootstrap-4.0.0-dist/js/bootstrap.min.js')}}"></script>
   @yield('scripts')
   </body>
    </html>
