<!doctype html>
 <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">
 
     <title>{{ config('app.name', 'Todo List') }}</title>
 
     <!-- Styles -->
     <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700%7CMaterial+Icons" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">
 </head>
 <body>
 <div id="app">
    <header-component></header-component>
            <router-view></router-view>    
 </div>
 <!-- Scripts -->
 <script src="{{ mix('/js/app.js') }}" defer></script>
 </body>
 </html>