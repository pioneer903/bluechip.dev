@extends('layouts.master')

@section('nav')
  
@endsection

@section('content')

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
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <section class="tile transparent">
                  <!-- tile header -->
                  <div class="tile-header transparent">
                    <h1>Create new season </h1>
                  </div>
                  <!-- /tile header -->

                  <!-- tile body -->
                  <div class="tile-body color transparent-black rounded-corners">
                    {{ Form::open(array('url' => 'seasons', 'method' => 'POST', 'class' => 'form-horizontal ',  'role' => 'form', 'parsley-validate')) }}
                      <div class="form-group">
                        <label for="grad_year" class="col-sm-4 control-label">Graduation Year *</label>
                        <div class="col-sm-8">
                          {{ Form::text('grad_year', '', array( 'class' => 'form-control', 
                            'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '4', 'parsley-validation-minlength' => '1')) }}
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="season" class="col-sm-4 control-label">Season *</label>
                        <div class="col-sm-8" id="season_select">

                            {{ Form::select('season', array(
                            ''       => 'Please Select', 
                            'summer' => 'Summer',
                            'fall'   => 'Fall'), 'select', 
                            array('id' => 'season', 'class' => 'chosen-select chosen-transparent form-control', 'parsley-trigger' => 'change', 'parsley-required' =>'true', 'parsley-error-container' =>'#season_select'))}}

                        </div>
                      </div>

                     
                      <div class="form-group form-footer">
                        <div class="col-sm-offset-4 col-sm-8">
                          {{ Form::submit('Add season', array('class' => 'btn btn-primary'))}}

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
              </div>
            </div>



            <!-- row -->
            <div class="row">

              
              <!-- col 8 -->
              <div class="col-md-8 col-md-offset-2">
                
                
                <!-- tile -->
                <section class="tile transparent">


                  <!-- tile header -->
                  <div class="tile-header transparent">
                    <h1>All seasons </h1>
                    
                  </div>
                  <!-- /tile header -->

                  <!-- tile body -->
                  <div class="tile-body color transparent-black rounded-corners">
                    
                    <div class="table-responsive">
                      <table  class="table table-datatable table-custom zebra" id="inlineEditDataTable">
                        <thead>
                          <tr>
                            <th class="sort-numeric" width="50%">Graduation Year</th>
                            <th class="sort-alpha">Season</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($seasons as $season)
                          <tr>
                            <td>{{ $season->grad_year}} </td>
                            <td>{{ $season->season}} </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
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

