@extends('layouts.master')

@section('nav')
  
@endsection

@section('content')
  
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
                    <h1>Email players</h1>
                  </div>
                  <!-- /tile header -->

                  <!-- tile body -->
            <div class="tile-body color transparent-black rounded-corners">
              
              {{ Form::open(array('url' => 'sendemail', 'method' => 'POST', 'class' => 'form-horizontal',  'role' => 'form', 'parsley-validate')) }}
                
                <div class="form-group">
                  <label for="from" class="col-sm-4 control-label">from</label>
                  <div class="col-sm-8">
                    {{ Form::text('from', 'yuriy@moscreative.com', array( 'class' => 'form-control', 
                      'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '2', 'parsley-validation-minlength' => '1')) }}
                  </div>

                </div><div class="form-group">
                  <label for="recepients" class="col-sm-4 control-label">recepients</label>
                  <div class="col-sm-8">
                    {{ Form::text('recepients', $emails, array( 'class' => 'form-control', 
                      'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '2', 'parsley-validation-minlength' => '1')) }}
                  </div>
                </div>

                 <div class="form-group">
                  <label for="subject" class="col-sm-4 control-label">Subject</label>
                  <div class="col-sm-8">
                    {{ Form::text('subject', '', array( 'class' => 'form-control', 
                      'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '2', 'parsley-validation-minlength' => '1')) }}
                  </div>
                </div>

                <div class="form-group">
                  <label for="message" class="col-sm-4 control-label">Email body  </label>
                  <div class="col-sm-8">
                    {{ Form::textarea('message', 
                    '',
                     array('class' => 'form-control')) }}
                  </div>
                </div>


                

               
                <div class="form-group form-footer">
                  <div class="col-sm-offset-4 col-sm-8">
                    {{ Form::submit('Send email', array('class' => 'btn btn-primary'))}}

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
