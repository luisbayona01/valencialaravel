<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <link rel="shortcut icon" href="{{ asset('img/icono-negro.png') }}" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Etra Valencia</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
    <link href="{{  asset('css/bootstrap.min.css')  }}"  rel="stylesheet" crossorigin="anonymous">
   <link href="{{asset('css/toastr.min.css')}}"  rel="stylesheet" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha256-e7gv1iSRu9qTxaTsz4mi8JQudArI1FpK8/ghBsgaP7I=" crossorigin="anonymous" />
      <script src="{{asset('js/jquery-3.7.1.min.js')}}"crossorigin="anonymous"></script>
       <script src="{{asset('js/bootstrap.min.js')}}"crossorigin="anonymous"></script>
   <script src="{{asset('js/toastr.min.js')}}"crossorigin="anonymous"></script>


</head>
<body>


    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
