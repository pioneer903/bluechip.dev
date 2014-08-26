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
                <section id="rootwizard" class="tabbable transparent tile">



                  <!-- tile header -->
				<div class="tile-header transparent">
					<h1>{{ $player->first_name }}&nbsp;{{ $player->last_name }}&rsquo;s Profile </h1>

					<div style='float:right; display:inline; padding:10px;'>{{Form::delete('players/'. $player->id, 'Delete', array('class' => 'btn-delete delete-form'))}}</div>
					<div style='float:right; display:inline; padding:10px;'>{{ link_to_route('players.edit', 'Edit player', array($player->id), array('class' => 'btn btn-info')) }}</div>
					<div style='float:right; display:inline; padding:10px;'>{{ link_to_route('print_player', 'Print player', array($player->id), array('class' => 'btn btn-info')) }}</div>

				</div>
                  <!-- /tile header -->

                  <!-- tile widget -->
                  <div class="tile-widget nopadding color transparent-black rounded-top-corners">
                    <ul>
                      <li><a href="#tab1" data-toggle="tab">Player's Information</a></li>
                      <li><a href="#tab2" data-toggle="tab">Medical Information</a></li>
                      <li><a href="#tab3" data-toggle="tab">Nike Release</a></li>
                    </ul>
                  </div>
                  <!-- /tile widget -->

                  <!-- tile body -->
                  <div class="tile-body">
                    
                    @if(isset($player))
	                    <div class="tab-content">
	                      
	                      <div class="tab-pane" id="tab1">

	                        <form class="form-horizontal form1" role="form" >
	                        	<table class="table table-striped table-bordered table-hover">
									<tr>
										<th colspan='2'><h3>Personal Information</h3></th>
									</tr>
									<tr>
										<td>First Name</td>
										<td>{{ $player->first_name }} </td>
									</tr>
									<tr>
										<td>Last Name</td>
										<td>{{ $player->last_name }} </td>
									</tr>
									<tr>
										<td>Email</td>
										<td><a href="mailto:{{ $player->email }}?Subject=Contact%20from%20Blue%20Chip" target="_top">{{ $player->email }} </a></td>
									</tr>
									<tr>
										<td>Phone</td>
										<td>{{ $player->phone}} </td>
									</tr>
									<tr>
										<td>Street Address</td>
										<td>{{ $player->street}} </td>
									</tr>
									<tr>
										<td>City</td>
										<td>{{ $player->city}} </td>
									</tr>
									<tr>
										<td>State</td>
										<td>{{ $player->state}} </td>
									</tr>
									<tr>
										<td>Zip Code</td>
										<td>{{ $player->zip}} </td>
									</tr>
									<tr>
										<td>Date of Birth</td>
										<td>
											<?php
												$bdate = strtotime($player->birth_date);
												echo date('m/d/Y', $bdate); 
											?>
										</td>

									</tr>
									<tr>
										<td>Height</td>
										<td>{{ $player->height }} </td>
									</tr>
									<tr>
										<td>Weight</td>
										<td>{{ $player->weight}} </td>
									</tr>

									<tr>
										<th colspan='2'><h3>Parents/Guardians Information</h3></th>
									</tr>
									<tr>
										<td>Parent/Guardian 1 Name</td>
										<td>{{ $player->parent1_name}} </td>
									</tr>
									<tr>
										<td>Parent/Guardian 1 Email</td>
										<td><a href="mailto:{{ $player->parent1_email }}?Subject=Contact%20from%20Blue%20Chip" target="_top">{{ $player->parent1_email}} </a></td>
									</tr>
									<tr>
										<td>Parent/Guardian 2 Name</td>
										<td>{{ $player->parent2_name}} </td>
									</tr>
									<tr>
										<td>Parent/Guardian 2 Email</td>
										<td><a href="mailto:{{ $player->parent2_email }}?Subject=Contact%20from%20Blue%20Chip" target="_top">{{ $player->parent2_email}} </a></td>
									</tr>
									
									<tr>
										<th colspan='2'><h3> School and Team Information</h3></th>
									</tr>
									<tr>
										<td>Graduation Year</td>
										<td>{{ $season->grad_year }} </td>
									</tr>
									<tr>
										<td>Season</td>
										<td>{{ $season->season}} </td>
									</tr>
									<tr>
										<td>School Name</td>
										<td>{{ $player->school_name}} </td>
									</tr>
									<tr>
										<td>School Coach</td>
										<td>{{ $player->school_coach}} </td>
									</tr>
									<tr>
										<td>School Coach Phone</td>
										<td>{{ $player->school_coach_phone}} </td>
									</tr>
									<tr>
										<td>Club Team</td>
										<td>{{ $player->club_team}} </td>
									</tr>
									<tr>
										<td>Club Coach</td>
										<td>{{ $player->club_coach}} </td>
									</tr>
									<tr>
										<td>Club Coach Phone</td>
										<td>{{ $player->club_coach_phone}} </td>
									</tr>
									<tr>
										<td>GPA</td>
										<td>{{ $player->gpa}} </td>
									</tr>
									<tr>
										<td>PSAT</td>
										<td>{{ $player->psat}} </td>
									</tr>
									<tr>
										<td>SAT/ACT</td>
										<td>{{ $player->sat_act}} </td>
									</tr>

									<tr>
										<th colspan='2'><h3> Lacrosse Information</h3></th>
									</tr>
									<tr>
										<td>Position</td>
										<td>{{ $player->position }} </td>
									</tr>
									<tr>
										<td>Hand</td>
										<td>{{ $player->hand }} </td>
									</tr>
									<tr>
										<td>Faceoff</td>
										<td>{{ $player->faceoff }} </td>
									</tr>
									<tr>
										<td>LSM</td>
										<td>{{ $player->lsm }} </td>
									</tr>
									<tr>
										<td>Lacrosse Honors</td>
										<td>{{ $player->lacrosse_honors }} </td>
									</tr>
									<tr>
										<td>Other Sports</td>
										<td>{{ $player->other_sports }} </td>
									</tr>
									<tr>
										<td>I have committed to</td>
										<td>{{ $player->committed_to}} </td>
									</tr>
								</table>
							 </form>

	                      </div>

	                      <div class="tab-pane" id="tab2">

	                        <form class="form-horizontal form2" role="form" parsley-validate id="contact">
								<table class="table table-striped table-bordered table-hover">
		                      		<tr>
										<th colspan='2'><h3> Medical Information</h3></th>
									</tr>
									<tr>
										<td>Health Insurance Company Name</td>
										<td>{{ $player->insurance_company}} </td>
									</tr>
									<tr>
										<td>Health Insurance Policy</td>
										<td>{{ $player->insurance_policy }} </td>
									</tr>
									<tr>
										<td>Health Insurance Effective Date</td>
										<td>
											<?php
												$format_date = strtotime($player->insurance_date);
												echo date('m/d/Y', $format_date); 
											?>
										</td>
									</tr>
									<tr>
										<td>Player's Signature</td>
										<td>{{ $player->player_signature_medical }} </td>
									</tr>
									<tr>
										<td>Player's Signature Date</td>
										<td>
											<?php
												$format_date = strtotime($player->player_signature_date_medical);
												echo date('m/d/Y', $format_date); 
											?>
										</td>
									</tr>
									<tr>
										<td>Parent/Guardian Signature</td>
										<td>{{ $player->parent_signature_medical }} </td>
									</tr>
									<tr>
										<td>Parent/Guardian Signature Date</td>
										<td>
											<?php
												$format_date = strtotime($player->parent_signature_date_medical);
												echo date('m/d/Y', $format_date); 
											?>
										</td>

									</tr>
									<tr>
										<td>Emergency Phone #1 </td>
										<td>{{ $player->emergency_phone1 }} </td>
									</tr>
									<tr>
										<td>Emergency Phone #2 </td>
										<td>{{ $player->emergency_phone2 }} </td>
									</tr>
									<tr>
										<td>Medical Conditions</td>
										<td>{{ $player->medical_conditions}} </td>
									</tr>
								</table>                         	
	                        </form>

	                      </div>
	                      
	                      <div class="tab-pane" id="tab3">
	                        
	                        <form class="form-horizontal form3" role="form" parsley-validate id="eula">
								<table class="table table-striped table-bordered table-hover">
									<tr>
										<th colspan='2'><h3> Nike Release</h3></th>
									</tr>
									<tr>
										<td colspan='2'>{{ $player->release_text }} </td>
									</tr>
									<tr>
										<td>I certify that: </td>
										<td>{{ $player->release_i_certify}}</td>
									</tr>
									<tr>
										<td>Participant Digital Signature</td>
										<td>{{ $player->release_print_name }} </td>
									</tr>
									<tr>
										<td>Date signed</td>
										<td>
											<?php
												$format_date = strtotime($player->release_date_signed);
												echo date('m/d/Y', $format_date); 
											?>
										</td>
									</tr>
									<tr>
										<td>Date of birth</td>
										<td>
											<?php
												$format_date = strtotime($player->release_birth_date);
												echo date('m/d/Y', $format_date); 
											?>
										</td>
									</tr>
									<tr>
										<td>Address</td>
										<td>{{ $player->release_address }} </td>
									</tr>
									<tr>
										<td>Email Address</td>
										<td>{{ $player->release_email }} </td>
									</tr>
									<tr>
										<td>Phone number</td>
										<td>{{ $player->release_phone }} </td>
									</tr>
									<tr>
										<td>Emergency Contact</td>
										<td>{{ $player->release_email }} </td>
									</tr>
									<tr>
										<td colspan='2'>{{ $player->release_text_minor }} </td>
									</tr>
									<tr>
										<td>Parent or Guardian Name</td>
										<td>{{ $player->release_parent_name }} </td>
									</tr>
									<tr>
										<td>Date Signed</td>
										<td>
											<?php
												$format_date = strtotime($player->release_parent_date_signed);
												echo date('m/d/Y', $format_date); 
											?>
										</td>
									</tr>
								</table>                         	
	                        </form>

	                      </div>

	                    </div>
                    @else
						The Player is not selected
					@endif	


				
                  </div>
                  <!-- /tile body -->

                  <!-- tile footer -->
                  <div class="tile-footer border-top color white rounded-bottom-corners nopadding">
                    <ul class="pager pager-full wizard">
                      <li class="previous"><a href="javascript:;"><i class="fa fa-arrow-left fa-lg"></i></a></li>
                      <li class="next"><a href="javascript:;"><i class="fa fa-arrow-right fa-lg"></i></a></li>
                      <li class="next finish" style="display:none;"><a href="javascript:;"><i class="fa fa-check fa-lg"></i></a></li>
                    </ul>
                  </div>
                  <!-- /tile footer -->
                  
                


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


<script>
    $(function(){

      //initialize form wizard
      $('#rootwizard').bootstrapWizard({

        'tabClass': 'nav nav-tabs tabdrop',
        onTabShow: function(tab, navigation, index) {
          var $total = navigation.find('li').not('.tabdrop').length;
          var $current = index+1;
          var $percent = ($current/$total) * 100;
          $('#rootwizard').find('#bar .progress-bar').css({width:$percent+'%'});

          // If it's the last tab then hide the last button and show the finish instead
          if($current >= $total) {
            $('#rootwizard').find('.pager .next').hide();
            $('#rootwizard').find('.pager .finish').show();
            $('#rootwizard').find('.pager .finish').removeClass('disabled');
          } else {
            $('#rootwizard').find('.pager .next').show();
            $('#rootwizard').find('.pager .finish').hide();
          }  
        },

        onNext: function(tab, navigation, index) {

          var form = $('.form' + index)

          form.parsley('validate');

          if(form.parsley('isValid')) {
            //tab.addClass('success');       
          } else {
            return false;
          }

        },

        onTabClick: function(tab, navigation, index) {

          var form = $('.form' + (index+1))

          form.parsley('validate');

          if(form.parsley('isValid')) {
            //tab.addClass('success');  
          } else {
            return false;
          }

        }

      });

      // Initialize tabDrop
      $('.tabdrop').tabdrop({text: '<i class="fa fa-th-list"></i>'});
      
      
    })
      
    </script>

@stop

