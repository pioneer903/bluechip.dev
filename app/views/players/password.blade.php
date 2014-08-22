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
</style>
<script type="text/javascript">
  $(document).ready(function() {

    var release_text = $('#release_text').html();
    $('#release_text_form').val(release_text);

    var release_text_minor = $('#release_text_minor').html();
    $('#release_text_minor_form').val(release_text_minor);

    var street = $('[name="street"]').val();
    var city = $('[name="city"]').val();
    var state = $('[name="state"]').val();
    var email = $('[name="email"]').val();
    var phone = $('[name="phone"]').val();
    var birth_date = $('[name="birth_date"]').val();
    var emergency_phone1 = $('[name="emergency_phone1"]').val();

    $('[name="release_address"]').val(street + ', ' + city + ', ' + state);
    $('[name="release_email"]').val(email);
    $('[name="release_phone"]').val(phone);
    $('[name="release_birth_date"]').val(birth_date);
    $('[name="release_emergency_contact"]').val(emergency_phone1);

    console.log(emergency_phone1);
    // release_text_minor_text

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
                    {{ Form::text('username', null, array('class' => 'form-control', 
                        'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '2', 'parsley-validation-minlength' => '1','required', 'placeholder'=>'Pick your username')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="password" class="col-sm-4 control-label">Password *</label>
                  <div class="col-sm-4">
                    {{ Form::password('password', null, array( 'class' => 'form-control', 'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '2', 'parsley-validation-minlength' => '1')) }}
                  </div>
                </div>


                <div class="form-group form-footer">
                  <div class="col-sm-offset-4 col-sm-8">
                    {{ Form::submit('Update password', array('class' => 'btn btn-primary'))}}
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





