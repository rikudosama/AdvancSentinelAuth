<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="sentinel authentication">
    <meta name="author" content="lengam bonaventure alias lerikudosama">

    <title>Advanced authentication system</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/css/beauty.css">
    <!--jumbottron core css -->
    <link rel="stylesheet" href="/css/jumbotron-narrow.css">
    <!--font-awesome core js-->
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      @include('layouts._top-menu')

      @yield('content')
    </div> <!-- /container -->



  </body>
</html>
