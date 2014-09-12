@extends('layouts.master')

@section('nav')
  
@endsection

@section('content')

    

     <script type="text/javascript">
        // $(document).ready(function() {
        //     /* Initialize the Data Table */
        //     dTable = $('#dataTables_players').dataTable();
       
      
        // } );
        
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
 

    <!-- Preloader -->
    <div class="mask"><div id="loader"></div></div>
    <!--/Preloader -->

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
              <div class="col-md-10 col-md-offset-1">
                
                
                <!-- tile -->
                <section class="tile transparent">


                  <!-- tile header -->
                  <div class="tile-header transparent">
                    <h1>All Players </h1>
                    <button id='email' class="btn btn-primary disabled" style="margin-left: 20px;">Email Selected</button>
                    <button id='print' class="btn btn-primary disabled" style="margin-left: 20px;">Print Selected</button>
                    <button id='select_button' class="btn btn-primary"  style="margin-left: 20px;">Select All</button>
                    {{Form::open(array('url' => 'players/print', 'method' => 'POST','class'=>'print_all_players_form', 'target'=>"_blank"))}}
                    {{Form::close()}}
                  </div>
                  <!-- /tile header -->

                  <!-- tile body -->
                  <div class="tile-body color transparent-black rounded-corners">
                    
                    <div class="table-responsive">
                      <table  class="table table-datatable table-custom " id="inlineEditDataTable">

                        <thead>
                          <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Grad Year</th>
                            <th>Season</th>
                            <th>Position</th>
                            <th>Paid in Full</th>
                            <th>View</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th class="hidden" ></th>
                          </tr>
                        </thead>
<!--                        <tbody>
                          @foreach($seasons as $season)
                          <?php  $player = $season->players()->get();
                              $grad_year= $season->grad_year;
                              $season_name = $season->season;
                          ?>
                                  @foreach($player as $u)
                                  <tr data-player="{{$u->id}}">
                                      <td class="first_name capitalize">{{ $u->first_name }} </td>
                                      <td class="last_name capitalize">{{ $u->last_name }} </td>
                                      <td>{{ $u->phone }} </td>
                                      <td class="email">{{ $u->email }}</td>
                                      <td class="capitalize">{{ $u->graduation_year }} </td>
                                      <td class="capitalize">{{ $grad_year.' '.$season_name }} </td>
                                      <td>{{ $u->position }}</td>
                                      <td>{{ Form::checkbox('paid', null, $u->paid, array('class'=>'paid','data-id'=>$u->id))}} </td>
                                      <td>{{ link_to_route('players.show', 'View', array($u->id), array('class' => 'btn btn-info'))}} </td>
                                      <td>{{ link_to_route('players.edit', 'Edit', array($u->id), array('class' => 'btn btn-info ')) }}</td>
                                      <td>{{Form::delete('players/'. $u->id, 'Delete', array('class' => 'btn-delete delete-form'))}}</td> 
                                      <td class="player_id hidden">{{ $u->id}} </td>
                                  </tr>
                                  @endforeach
                          @endforeach
                        </tbody>-->
                      </table>
                    </div>
                    
                  </div>
                  <!-- /tile body -->
                


                </section>
                <!-- /tile -->
                {{Form::open(array('class'=>'email_form','url'=>'email','method'=>'POST'))}}
                {{Form::close()}}



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


