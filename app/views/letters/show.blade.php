@extends('layouts.master')

@section('nav')
  
@endsection
<!-- <div class="alert alert-success alert-block hidden non-printable">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <h4>Success</h4>
      <p>The new player added successfully</p>
      
    </div> -->
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
            });
          });

          // Save the letter to database using AJAX

            var letter_text = $('#letter_text').html();
            var letterForm = $('#letterForm');
            letterForm.submit(function(ev){
              var data = {
                id: $(this).attr('data-id'),
                letter: letter_text
              }
              $.ajax({
                type: "POST",
                url:"{{URL::to('ajaxLetter')}}",
                data: data,
                success: function(data){
                  $('.alert').removeClass('hidden');
                }
              });
               ev.preventDefault();
            });
            $('#letterForm').submit();

        });//end document.ready
        
        $(document).on('submit', '.delete-form', function(){
            return confirm('Are you sure you want to delete this player?');
            
        });
    </script>
    <style type="text/css">
      p{text-indent: 30px; }
      .center{text-align: center; margin:auto;}
      .small_logo img{width:40%;}
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

						<div class="row">
						  <!-- <div class="col-md-2"><div class="btn btn-info"  onclick="window.print()">Print Letter</div></div>
						  <div class="col-md-2"><div>{{ link_to_route('save_pdf', 'Save as PDF', array($letter->id), array('class' => 'btn btn-info')) }}</div></div> -->
						  
						  	<div class="col-md-10"><h1>{{ $letter->letter_title}}</h1></div>
						  	<div class="col-md-2">{{ link_to_route('letters.edit', 'Edit', array($letter->id), array('class' => 'btn btn-info ')) }}</div>
						</div>
					</div>
					<!-- /tile header -->

					<!-- tile body -->
					<div class="tile-body">
						<div id="letter_text">
							<div class="center small_logo"><img src="/images/bluechip_logo.png" alt="logo" /></div>
							<div>
								
								{{ $letter->letter_text}}
							</div>
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



