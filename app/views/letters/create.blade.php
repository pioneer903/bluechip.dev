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
                    <h1>Create letter</h1>
                    
                  </div>
                  <!-- /tile header -->

                  <!-- tile body -->
                  <div class="tile-body color transparent-black rounded-corners">
                    
                    {{ Form::open(array('url' => 'letters', 'method' => 'POST', 'class' => 'form-horizontal',  'role' => 'form', 'parsley-validate')) }}
                      <legend>Create letter</legend>

                      <div class="form-group">
                        <label for="letter_title" class="col-sm-4 control-label">Letter Title</label>
                        <div class="col-sm-8">
                          {{ Form::text('letter_title','', array('class' => 'form-control em_content')) }}
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="letter_text" class="col-sm-4 control-label">letter</label>
                        <div class="col-sm-8">
                          {{ Form::textarea('letter_text','', array('class' => 'form-control em_content')) }}
                        </div>
                      </div>
                     
                      <div class="form-group form-footer">
                        <div class="col-sm-offset-4  col-sm-3">
                          {{ Form::submit('Add Letter Template', array('class' => 'btn btn-primary'))}}
                        </div>
                        <div class="col-sm-2">
                          {{ Form::reset('Reset', array('class' => 'btn btn-danger'))}}
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
