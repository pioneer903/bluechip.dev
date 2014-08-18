@extends('layouts.master')

@section('nav')
  
@endsection

@section('content')
<script type="text/javascript">
        $(document).ready(function() {
            /* Initialize the Data Table */
            dTable = $('#dataTables_players').dataTable();
        } );
        
        $(document).ready(function(){
          $('.paid').click(function(){
            var checked=0;
            if($(this).is(':checked')){
              checked=1;
            }
            var data={ 
              id: $(this).attr('data-id'),
              checked: checked
            }
            $.ajax({
              
              type: "POST",
              data: data,
              url: "{{URL::to('ajax')}}",
              success:function(data){
                
              }
            })
          })
        })
        
        $(document).on('submit', '.delete-form', function(){
            return confirm('Are you sure you want to delete this player?');
            
        });
    </script>
    <style type="text/css">
    	.table td:first-child{width:30%;}
    </style>
    
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
                <section id="" class="tabbable transparent tile">



                  <!-- tile header -->
                  <div class="tile-header transparent non-printable">
                    <div style=' margin-left:-15px; ' onclick="window.print()">{{ link_to_route('players.edit', 'Print letter', array($player->id), array('class' => 'btn btn-info')) }}</div>

                  </div>
                  <!-- /tile header -->

                  

                  <!-- tile body -->
                  <div class="tile-body">
                    

                    @if(isset($player))
                    	<b>Dear {{ $player->first_name }}&nbsp;{{ $player->last_name }},</b>
                    	<p></p>
                    	<p>You are invited to the Nike Blue Chip Lacrosse camp for the <span class="capitalize bold">{{$season->season}} </span> season. </p>
                    	<p>Please follow the unique link <b>{{ URL::to('link/'.$token)}}</b> to complete your registration</p>
                    	<p></p>
                    	<p></p>
	                    <p>{{ $player->first_name }} &nbsp; {{ $player->last_name }} <br/> 
	                    {{ $player->street}} <br/> 
	                    {{ $player->city}} ,	{{ $player->state}} {{ $player->zip}} </p>





                    @else
						The Player is not selected
					@endif	
                    

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

