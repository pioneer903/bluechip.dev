<!doctype html>
<html lang="en">
  <head>
    @include('layouts.meta')

    <link rel="icon" type="image/ico" href="http://l4.dev/assets/images/favicon.ico" />
    <!-- JQuery library. Need for confirmation to delete user, checkbox for paid in full, and other -->
    <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script> 
    <!-- Bootstrap -->
    {{ HTML::style('assets/css/vendor/bootstrap/bootstrap.min.css')}}
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    {{ HTML::style('assets/css/vendor/animate/animate.css') }}
    {{ HTML::style('assets/js/vendor/mmenu/css/jquery.mmenu.all.css') }}
    {{ HTML::style('assets/js/vendor/videobackground/css/jquery.videobackground.css') }}
    {{ HTML::style('assets/css/vendor/bootstrap-checkbox.css') }}

    {{ HTML::style('assets/js/vendor/chosen/css/chosen.min.css') }}
    {{ HTML::style('assets/js/vendor/chosen/css/chosen-bootstrap.css') }}
    {{ HTML::style('assets/js/vendor/datatables/css/dataTables.bootstrap.css') }}
    {{ HTML::style('assets/js/vendor/datatables/css/ColVis.css') }}
    {{ HTML::style('assets/js/vendor/datatables/css/TableTools.css') }}
    {{ HTML::style('assets/js/vendor/tabdrop/css/tabdrop.css') }}
    {{ HTML::style('assets/css/minimal.css') }}
    {{ HTML::style('css/style.css') }}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- Place inside the <head> of your HTML -->
    {{HTML::script('js/tinymce/tinymce.min.js') }}
    {{HTML::script('js/tinymce/custom.js') }}

  </head>
  <body class="bg-3">
    @include('layouts.nav')
    <!-- Success-Messages -->
    
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block non-printable">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <h4>Success</h4>
      {{{ $message }}}
    </div>
    @endif
    @yield('content')
    @include('layouts.footerScripts')

  </body>
</html>
