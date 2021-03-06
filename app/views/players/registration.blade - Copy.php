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
                      <div class="col-md-2"><div class="btn btn-info"  onclick="window.print()">Print Letter</div></div>
                      <div class="col-md-2"><div>{{ link_to_route('save_pdf', 'Save as PDF', array($player->id), array('class' => 'btn btn-info')) }}</div></div>
                    </div>
                    
                    <!-- <div style=' margin-left:-15px; ' onclick="window.print()">{{ link_to_route('players.edit', 'Print letter', array($player->id), array('class' => 'btn btn-info')) }}</div> -->
                   <!--  <form id="contactForm1">
                      <input type="text" id="letter" name="letter" data-id = "<?php $player->id ?>"/>
                      <button class="btn btn-info" id="saveLetter" type="submit">submit</button>
                   
                    </form> -->
                  </div>
                  <!-- /tile header -->

                  <!-- tile body -->
                  <div class="tile-body">
                    

                    @if(isset($player))
                    <?php
                      $payment_due_date = strtotime($player->payment_due_date);
                    ?> 
                    <div id="letter_text">
                      <div class="center small_logo"><img src="images/bluechip_logo.png" alt="logo" /></div>
                    	<p><b>Dear {{ $player->first_name }}&nbsp;{{ $player->last_name }},</b></p>
                    	
                      <p>
                        Congratulations! This letter is an invitation to participate in the 
                        <span class="capitalize bold"> {{$season->grad_year}} {{$season->season}}  Nike Blue Chip {{$player->graduation_year}} Lacrosse Camp.</span>
                        If you accept this invitation, please visit this link, where you will be directed to enter your personal information and fill out medical and release forms:
                        <b>{{ URL::to('link/'.$token)}}</b> (*This link is a one-time use link; if you encounter any issues, please contact us for assistance at sailinshoe3@comcast.net).
                      </p>
  
                      <p>
                        The <span class="capitalize bold">{{$season->grad_year}}  {{$season->season}} Nike Blue Chip Lacrosse Camp </span> will be held on 
                        Saturday, November 22nd and Sunday, November 23rd at the Mecklenburg County Sportsplex at Matthews in Charlotte, NC. 
                        Games will take place on Saturday, November 22 beginning at 9am and ending by 6pm and on Sunday, November 23 beginning at 8am and ending by 2pm. 
                        The Sportsplex is located about 30 minutes from Charlotte Douglas International Airport (CLT). All players must provide their own transportation, lodging, and meals. 
                        Please go to <b>lacrossecamp.com</b> for more information about lodging and online store.
                      </p>
                      
                      <p>
                        Each player’s profile will be in a booklet given to the coaches in attendance. Upon arrival, each player will be provided with his own numbered reversible jersey, 
                        which will be listed in the coach’s booklet. Unfortunately, team requests cannot be honored.
                      </p>
                      
                      <p>
                        The cost of the <b>Nike Blue Chip Lacrosse Camp</b> is $500.00. This payment is <b>non-refundable (in the case of an injury, 
                        a 50% refund will be given to those who present a note from a physician before November 1). </b>
                        If we do not receive your payment by 
                        <b><?php echo date('m/d/Y', $payment_due_date);  ?></b>, your spot will be forfeited and another player will be chosen to take your place. 
                        Please enclose your confirmation letter along with a check made payable to Maryland Lacrosse Academy Inc. 
                        and mailed to the following address (regular US mail only, do not send mail signature required): 
                      </p>      
                      <textarea>Some text here {{$player->first_name}} </textarea>      
                      
                      <p style="padding-left:40px;"> <br>
                      Nike Blue Chip Lacrosse Camp <br>
                      3302 Foster Ave. <br>
                      Baltimore MD 21224 
                      </p>
                      <p><br>
                      If you have any questions please email me at sailinshoe3@comcast.net <br><br>
                      Sincerely,<br> <br>
                      Jake Reed<br>
                      Nike Blue Chip Lacrosse Camp</p>

                    </div>  
                    @else
          						The Player is not selected
          					@endif	
                    
                    <form id="letterForm" data-id="{{$player->id}}">
                      
                    </form>
<!-- 
                     {{ Form::open(array('url' => 'players', 'method' => 'POST', 'class' => 'form-horizontal',  'role' => 'form', 'parsley-validate')) }}
                      <legend>Personal Information</legend>
                      <div class="form-group">
                        <label for="first_name" class="col-sm-4 control-label">letter</label>
                        <div class="col-sm-8">
                          {{ Form::text('letter', '', array( 'class' => 'form-control', 
                            'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '2', 'parsley-validation-minlength' => '1')) }}
                        </div>
                      </div>

                       <div class="form-group form-footer">
                        <div class="col-sm-offset-4 col-sm-8">
                          {{ Form::submit('Add player', array('class' => 'btn btn-primary'))}}

                        </div>
                      </div>
                    {{ Form::close() }}
                    <div class="span4" style="padding:30px;">
                      @if($errors->any())
                      <ul>
                        {{ implode('', $errors->all('<li class="has-error">:message</li>')) }}
                      </ul>
                      @endif
                    </div> -->

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



