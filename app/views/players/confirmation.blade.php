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
</style>

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

              <!-- col 6 -->
              <div class="col-md-6 col-md-offset-3">



                <!-- tile -->
                <section class="tile color transparent">
                
                <!-- tile header -->
                  <div class="tile-header transparent">
                    <h1>Confirmation letter</h1>
                  </div>
                  <!-- /tile header -->

                  <!-- tile body -->
                  <div class="tile-body color transparent-black rounded-corners"  style="padding:40px;">
                    <div class="">
                      <h2>{{$player->first_name}} {{$player->last_name}} </h2>
                      <?php $season = Season::where('id','=', $player->season_id)->first(); ?>
                      <h3 class="capitalize">{{$season->grad_year}} {{$season->season}} Camp, {{$player->graduation_year}}, Check #{{$player->check_number}} </h3>
                      <p>Thank you for updating your profile.</p>
                      <p>To complete the registration process, </p>
                      <ol>
                        <li>Print this confirmation letter</li>
                        <li>Attach the check #{{$player->check_number}} </li>
                        <li>Mail both to the following address:</li>
                      </ol>
                      <p style="padding-left:40px;"> <br>
                            Nike Blue Chip Lacrosse Camp <br>
                            3302 Foster Ave. <br>
                            Baltimore MD 21224 
                      </p>
                      <br><br>
                      <p>@if($player->comments) Comments: {{$player->comments}} @endif </p>
                    </div>

                    <div class="row non-printable"  style="padding:40px;">
                      <div class="col-md-2"><div class="btn btn-info"  onclick="window.print()">Print </div></div>
                      <!-- <div class="col-md-2"><div>{{ link_to_route('save_pdf', 'Save as PDF', array($player->id), array('class' => 'btn btn-info')) }}</div></div> -->
                      <div class="col-md-2">{{ link_to_route('players.edit', 'Edit', array($player->id), array('class' => 'btn btn-info ')) }}</div>
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





