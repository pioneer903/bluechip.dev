@extends('layouts.master')

@section('title')
@parent
:: Login
@stop


{{-- Content --}}
@section('content')

 <!-- Wrap all page content here -->
    <div id="wrap">
      <!-- Make page fluid -->
      <div class="row">
        <!-- Page content -->
        <div id="content" class="col-md-12 full-page login">


          <div class="inside-block">
            <img src="images/bluechip_logo.png" alt class="logo" style="width:100%;">
            <div class="inner">
              <h1><strong>Welcome</strong> Guest</h1>
              <h5>Please identify yourself</h5>
              {{ Form::open(array('url' => 'login', 'class' => 'form-signin', 'id' => 'form-signin')) }}
              
                <section>
                  <div class="input-group">
                    {{ Form::text('username', Input::old('username'), array('class'=>'form-control', 'placeholder'=>'Username')) }}<br>
                    <div class="input-group-addon "><i class="fa fa-user"></i></div>
                  </div>
                  <p> {{ $errors->first('username') }}</p>
                  <div class="input-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <div class="input-group-addon"><i class="fa fa-key"></i></div>
                  </div>
                  <p>{{ $errors->first('password') }}</p>
                </section>
                <section class="log-in">
                  <button class="btn btn-primary">Log In</button>
                 
                </section>
              {{ Form::close() }}
            </div>
          </div>


        </div>
        <!-- /Page content -->  
      </div>
    </div>
    <!-- Wrap all page content end -->

{{ Form::close() }}
@stop