@extends('layouts.master')

@section('nav')
	
@endsection

@section('content')
	<!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Make page fluid -->
      <div class="row">
        
        <!-- Page content -->
        <div id="content" class="col-md-10" >
          
          <!-- content main container -->
          <div class="main">



            <!-- row -->
            <div class="row">

              
              <!-- col 12 -->
              <div class="col-md-10  col-md-offset-1">
                
                
                <!-- tile -->
                <section class="tile transparent">


                  <!-- tile header -->
                  <div class="tile-header transparent">
					<h1>Welcome to Nike Blue Chip Lacrosse</h1>
                    
                  </div>
                  <!-- /tile header -->

                  <!-- tile body -->
                  <div class="tile-body color transparent-black rounded-corners">
                    <p style="text-align: center">
						<img src="images/bluechip_logo.png" alt="logo" class="logo"/>
					</p>
					
					
					@if ( Auth::guest() )
						<h2> Please {{ HTML::link('login', 'Log in') }}</h2> 
				    @else
				        <h2>Please select the actions above</h2>
				        
				    @endif
				
                  </div>
                  <!-- /tile body -->
                


                </section>
                <!-- /tile -->





              </div>
              <!-- /col 12 -->


              
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



@endsection
