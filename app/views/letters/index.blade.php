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
            return confirm('Are you sure you want to delete this template?');
            
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
                    <h1>All Letters </h1>
                    <div style="float:right">{{ HTML::link('letters/create', 'Add New Template', array('class' => 'btn btn-primary'))}} </div>
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
                            <th>Letter id</th>
                            <th>Letter title</th>
                          	<th>View</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th class="hidden" ></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($letters as $letter)
                            <tr data-player="{{$letter->id}}">
                                <td>{{ $letter->id }} </td>
                                <td>{{ $letter->letter_title }} </td>
                                <td>{{ link_to_route('letters.show', 'View', array($letter->id), array('class' => 'btn btn-info'))}} </td>
                                <td>{{ link_to_route('letters.edit', 'Edit', array($letter->id), array('class' => 'btn btn-info ')) }}</td>
                             	<td>{{Form::delete('players/'. $letter->id, 'Delete', array('class' => 'btn-delete delete-form'))}}</td> 
                                <td class="player_id hidden">{{ $letter->id}} </td>
                            </tr>
                            @endforeach
                  
                </tbody>
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


