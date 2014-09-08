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
                    <h1>Edit letter</h1>
                  </div>
                  <!-- /tile header -->

                  <!-- tile body -->
                  <div class="tile-body color transparent-black rounded-corners">
                    
                    {{ Form::model($letter, array('role' => 'form', 'method' => 'put' , 'class' => 'form-horizontal form1',  'parsley-validate', 'route' => array('letters.update', $letter->id))) }}
                      <legend>Letter Content</legend>

                      <div class="form-group">
                        <label for="letter_title" class="col-sm-1 control-label">Title</label>
                        <div class="col-sm-11">
                          {{ Form::text('letter_title', $letter->letter_title, array('class' => 'form-control em_content')) }}
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="letter_text" class="col-sm-1 control-label">text</label>
                        <div class="col-sm-11">
                          {{ Form::textarea('letter_text', $letter->letter_text, array('class' => 'form-control em_content', 'rows'=>40)) }}
                        </div>
                      </div>


                      <div class="form-group form-footer">
                        <div class="col-sm-offset-2  col-sm-3">
                          {{ Form::submit('Update Letter', array('class' => 'btn btn-primary'))}}
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
