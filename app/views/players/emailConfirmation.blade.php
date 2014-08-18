@extends('layouts.master')

@section('nav')
  
@endsection

@section('content')

    <!-- Wrap all page content here -->
    <div id="wrap">

      


      <!-- Make page fluid -->
      <div class="row">
        
        <!-- Page content -->
        <div id="content" class="" style="">
          
          <!-- content main container -->
          <div class="main">



            <!-- row -->
            <div class="row">

              
              <!-- col 12 -->
              <div class="col-md-8 col-md-offset-2">
                
                
                <!-- tile -->
                <section class="tile transparent">


                  <!-- tile header -->
                  <div class="tile-header transparent">
                    <h1>Email sent</h1>
                   
                  </div>
                  <!-- /tile header -->

                  <!-- tile body -->
                  <div class="tile-body color transparent-black rounded-corners">
                    <div class="row">
	                    <div class="col-md-3">Email is sent to the following receipients: </div>
	                    <div class="col-md-9">
	                    	@foreach($emails as $email)
	                    		<b>{{$email}}, </b>
	                    	@endforeach
	                    </div>
					</div>
					<br/>
					<div class="row">
	                    <div class="col-md-3">Subject: </div>
	                    <div class="col-md-9"> <b>{{$subject}} </b> </div>
                    </div>
                    <br>
					<div class="row">
	                    <div class="col-md-3">Email body: </div>
	                    <div class="col-md-9"> <b>{{$body}} </b> </div>
                    </div>
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


@stop

@section('footerScripts')
@endsection


