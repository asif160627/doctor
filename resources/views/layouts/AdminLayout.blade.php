<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">



</head>
<body>

<div id="app">
 <app></app>
</div>


<script src="{{asset('js/app.js')}}"></script>
<script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>

</body>
</html>
