<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="locale" content="{{ LaravelLocalization::setLocale() }}">

  <title>{{ config('app.name', 'Shuledas') }}</title>


  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">

  <!-- Styles -->
  <link href="{{ asset('css/app.css?v=122321') }}" rel="stylesheet">
  <link href="{{ asset('css/lrm-core.css') }}" rel="stylesheet">
  <link href="{{ asset('css/bootstrap.min.css?v=1') }}" rel="stylesheet">
  <link href="{{ asset('css/flashimage.css?v=95') }}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet">
  <link href="{{ asset('css/select2-flat-theme.css') }}" rel="stylesheet">
</head>
