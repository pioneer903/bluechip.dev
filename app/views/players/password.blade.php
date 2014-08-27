@extends('layouts.master')

@section('nav')

@endsection

@section('content')

<style type="text/css">
  body #content .tile-body.transparent-black .form-control[readonly]{
    background-color: rgba(0, 0, 0, 0.3);
    color: rgba(255, 255, 255, 0.8);

  }
  .bg-dark{background-color: rgba(0, 0, 0, 0.3); border-radius:4px; padding:15px; margin-bottom: 15px}
  input[type="password"]{width:100%;}
  .duplicate-error{background-color: rgba(255, 74, 67, 0.2) !important;
      border: 1px solid rgba(255, 74, 67, 0.5) !important; }
</style>
<script type="text/javascript">
  $(document).ready(function() {
    $('#username').blur(function(){
      var username =  $(this).val();
      //use ajax to run the check  
      $.post("{{URL::to('ajaxCheckUsername')}}", { username: username },  
          function(result){  
              //if the result is 1  
              if(result == 1){  
                  //show that the username is available  
                  $('#create_usename').prop('disabled', false);  
                  $('#username').removeClass('duplicate-error');

              }else{  
                  //show that the username is NOT available  
                  $('#create_usename').prop('disabled', true);  
                  $('#username').addClass('duplicate-error') ;
                  $('#parsley-4299956636969').append('<li class="required" style="display: list-item;">'+username + ' is not Available'+'</li>');
              }  
      });  

    });
      
  });
</script>
<!-- Preloader -->
<div class="mask"><div id="loader"></div></div>
<!--/Preloader -->

<!-- Wrap all page content here -->
<div id="wrap">
  <!-- Make page fluid -->
  <div class="row">

    <!-- Page content -->
    <div id="content" >

      <!-- content main container -->
      <div class="main">
        <!-- row -->
        <div class="row">

          <!-- col 8 -->
          <div class="col-md-8 col-md-offset-2">
            <!-- tile -->
            <section class="tile color transparent">

              <!-- tile header -->
              <div class="tile-header transparent">
                <h1>Create a password</h1>
              </div>
              <!-- /tile header -->

              <!-- tile body -->
              <div class="tile-body color transparent-black rounded-corners">

                {{ Form::model($player, array('role' => 'form', 'method' => 'post' , 'class' => 'form-horizontal form1',  'parsley-validate', 'route' => array('players.password'))) }}
                {{Form::hidden('player_id', $player->id)}}
                {{Form::hidden('token', $token)}}
                <legend>Personal Information</legend>
                <div class="form-group">
                  <label for="username" class="col-sm-4 control-label">Username *</label>
                  <div class="col-sm-4">
                    {{ Form::text('username', null, array('class' => 'form-control', 'id' =>'username',
                        'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '2', 'parsley-validation-minlength' => '1','required', 'placeholder'=>'Pick your username')) }}
                        <ul id="parsley-4299956636969" class="parsley-error-list"></ul>
                  </div>
                </div>
                <div class="form-group">
                  <label for="password" class="col-sm-4 control-label">Password *</label>
                  <div class="col-sm-4">
                    <input type="password" class="form-control" id="password" name="password" parsley-trigger="change" parsley-required="true" parsley-minlength="6" parsley-type="alphanum" parsley-validation-minlength="1">
                  </div>
                </div>

                <div class="form-group">
                  <label for="passwordconfirm" class="col-sm-4 control-label">Password Confirm *</label>
                  <div class="col-sm-4">
                    <input type="password" class="form-control" id="passwordconfirm" parsley-trigger="change" parsley-required="true" parsley-minlength="6" parsley-type="alphanum" parsley-validation-minlength="1" parsley-equalto="#password">
                  </div>
                </div>


                <div class="form-group form-footer">
                  <div class="col-sm-offset-4 col-sm-8">
                    {{ Form::submit('Create Username', array('class' => 'btn btn-primary', 'id' =>'create_usename'))}}
                  </div>
                </div>
                {{ Form::close() }}
                <div class="span4" style="padding:30px;">
                  @if($errors->any())
                  <ul>
                    {{ implode('', $errors->all('<li class="has-error">:message</li>')) }}
                  </ul>
                  @endif
                </div>
              </div>
              <!-- /tile body -->




            </section>
            <!-- /tile -->




          </div>
          <!-- /col 8 -->




        </div>
        <!-- /row -->



      </div>
      <!-- /content container -->






    </div>
    <!-- Page content end -->






  </div>
  <!-- Make page fluid-->




</div>
<!-- Wrap all page content end -->




@stop

@section('footerScripts')

@endsection





