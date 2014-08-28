@extends('layouts.master')

@section('nav')
  
@endsection

@section('content')
<script type="text/javascript">
        
        $(document).on('submit', '.delete-form', function(){
            return confirm('Are you sure you want to delete this player?');
            
        });
    </script>
    
    <!-- Wrap all page content here -->
    <div id="wrap" >

      


      <!-- Make page fluid -->
      <div class="row">
        





        
        <!-- Page content -->
        <div id="content" >
          







          <!-- content main container -->
          <div class="main">




            <!-- row -->
            <div class="row">

              <!-- col 8 -->
              <div class="col-md-6 col-md-offset-3">
              	<!-- tile -->
                <section id="rootwizard" class="tabbable transparent tile">



                  <!-- tile header -->
				<div class="tile-header transparent ">
					<h1 class="capitalize"> {{$season->grad_year}} {{$season->season}} Nike Blue Chip {{ $player->graduation_year}} Camp</h1>
					<div class="non-printable"  style='float:right;'>
						<div style='float:right; display:inline; padding:10px;'>{{Form::delete('players/'. $player->id, 'Delete', array('class' => 'btn-delete delete-form'))}}</div>
						<div style='float:right; display:inline; padding:10px;'>{{ link_to_route('players.edit', 'Edit player', array($player->id), array('class' => 'btn btn-info')) }}</div>
						<div style='float:right; display:inline; padding:10px;'onclick="window.print()">{{ link_to_route('print_player', 'Print player', array($player->id), array('class' => 'btn btn-info')) }}</div>
					</div>

				</div>
                  <!-- /tile header -->

                  <!-- tile widget -->
                  <div class="tile-widget nopadding color transparent-black rounded-top-corners non-printable">
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
	                        	<div id="" class="printable">
									<div class="tr">
										<div><h3>Personal Information</h3></div>
									</div>
									<div class="tr">
										<div class="td col-md-3">First Name</div>
										<div class="td col-md-4">{{ $player->first_name }} </div>
									</div>
									<div class="tr">
										<div class="td">Last Name</div>
										<div class="td">{{ $player->last_name }} </div>
									</div>
									<div class="tr">
										<div class="td">Email</div>
										<div class="td">{{ $player->email }}</div>
									</div>
									<div class="tr">
										<div class="td">Phone</div>
										<div class="td">{{ $player->phone}} </div>
									</div>
									<div class="tr">
										<div class="td">Street Address</div>
										<div class="td">{{ $player->street}} </div>
									</div>
									<div class="tr">
										<div class="td">City</div>
										<div class="td">{{ $player->city}} </div>
									</div>
									<div class="tr">
										<div class="td">State</div>
										<div class="td">{{ $player->state}} </div>
									</div>
									<div class="tr">
										<div class="td">Zip Code</div>
										<div class="td">{{ $player->zip}} </div>
									</div>
									<div class="tr">
										<div class="td">Date of Birth</div>
										<div class="td">
											<?php
												$bdate = strtotime($player->birth_date);
												echo date('m/d/Y', $bdate); 
											?> </div>
									</div>
									<div class="tr">
										<div class="td">Height</div>
										<div class="td">{{ $player->height }} </div>
									</div>
									<div class="tr">
										<div class="td">Weight</div>
										<div class="td">{{ $player->weight}} </div>
									</div>

									<div class="tr">
										<div><h3>Parent/Guardian Information</h3></div>
									</div>
									<div class="tr">
										<div class="td">Parent/Guardian 1 Name</div>
										<div class="td">{{ $player->parent1_name}} </div>
									</div>
									<div class="tr">
										<div class="td">Parent/Guardian 1 Email</div>
										<div class="td">{{ $player->parent1_email}}</div>
									</div>
									<div class="tr">
										<div class="td">Parent/Guardian 2 Name</div>
										<div class="td">{{ $player->parent2_name}} </div>
									</div>
									<div class="tr">
										<div class="td">Parent/Guardian 2 Email</div>
										<div class="td">{{ $player->parent2_email}}</div>
									</div>
									
									<div class="tr">
										<div><h3> School and Team Information</h3></div>
									</div>
									<div class="tr">
										<div class="td">Graduation Year</div>
										<div class="td">{{ $season->grad_year }} </div>
									</div>
									<div class="tr">
										<div class="td">Season</div>
										<div class="td">{{ $season->season}} </div>
									</div>
									<div class="tr">
										<div class="td">School Name</div>
										<div class="td">{{ $player->school_name}} </div>
									</div>
									<div class="tr">
										<div class="td">School Coach</div>
										<div class="td">{{ $player->school_coach}} </div>
									</div>
									<div class="tr">
										<div class="td">School Coach Phone</div>
										<div class="td">{{ $player->school_coach_phone}} </div>
									</div>
									<div class="tr">
										<div class="td">Club Team</div>
										<div class="td">{{ $player->club_team}} </div>
									</div>
									<div class="tr">
										<div class="td">Club Coach</div>
										<div class="td">{{ $player->club_coach}} </div>
									</div>
									<div class="tr">
										<div class="td">Club Coach Phone</div>
										<div class="td">{{ $player->club_coach_phone}} </div>
									</div>
									<div class="tr">
										<div class="td">GPA</div>
										<div class="td">{{ $player->gpa}} </div>
									</div>
									<div class="tr">
										<div class="td">PSAT</div>
										<div class="td">{{ $player->psat}} </div>
									</div>
									<div class="tr">
										<div class="td">SAT/ACT</div>
										<div class="td">{{ $player->sat_act}} </div>
									</div>

									<div class="tr">
										<div><h3> Lacrosse Information</h3></div>
									</div>
									<div class="tr">
										<div class="td">Position</div>
										<div class="td">{{ $player->position }} </div>
									</div>
									<div class="tr">
										<div class="td">Hand</div>
										<div class="td">{{ $player->hand }} </div>
									</div>
									<div class="tr">
										<div class="td">Faceoff</div>
										<div class="td">{{ $player->faceoff }} </div>
									</div>
									<div class="tr">
										<div class="td">LSM</div>
										<div class="td">{{ $player->lsm }} </div>
									</div>
									<div class="tr">
										<div class="td">Lacrosse Honors</div>
										<div class="td">{{ $player->lacrosse_honors }} </div>
									</div>
									<div class="tr">
										<div class="td">Other Sports</div>
										<div class="td">{{ $player->other_sports }} </div>
									</div>
									<div class="tr">
										<div class="td">I have committed to</div>
										<div class="td">{{ $player->committed_to}} </div>
									</div>
								</div>
							 </form>

	                      </div>

	                      <div class="tab-pane" id="tab2">

	                        <form class="form-horizontal form2" role="form" parsley-validate id="contact">
								<div class="printable">
		                      		<div class="tr">
										<div><h3> Medical Information</h3></div>
									</div>
									<div class="tr">
										<div class="td">Health Insurance Company Name</div>
										<div class="td">{{ $player->insurance_company}} </div>
									</div>
									<div class="tr">
										<div class="td">Health Insurance Policy</div>
										<div class="td">{{ $player->insurance_policy }} </div>
									</div>
									<div class="tr">
										<div class="td">Health Insurance Effective Date</div>
										<div class="td">
											<?php
												$format_date = strtotime($player->insurance_date);
												echo date('m/d/Y', $format_date); 
											?>
										</div>
									</div>
									<div class="tr">
										<div class="td">Player's Signature</div>
										<div class="td">{{ $player->player_signature_medical }} </div>
									</div>
									<div class="tr">
										<div class="td">Player's Signature Date</div>
										<div class="td">
											<?php
												$format_date = strtotime($player->player_signature_date_medical);
												echo date('m/d/Y', $format_date); 
											?> 
										</div>
									</div>
									<div class="tr">
										<div class="td">Parent/Guardian Signature</div>
										<div class="td">{{ $player->parent_signature_medical }} </div>
									</div>
									<div class="tr">
										<div class="td">Parent/Guardian Signature Date</div>
										<div class="td">
											<?php
												$format_date = strtotime($player->parent_signature_date_medical);
												echo date('m/d/Y', $format_date); 
											?>
										</div>
									</div>
									<div class="tr">
										<div class="td">Emergency Phone #1 </div>
										<div class="td">{{ $player->emergency_phone1 }} </div>
									</div>
									<div class="tr">
										<div class="td">Emergency Phone #2 </div>
										<div class="td">{{ $player->emergency_phone2 }} </div>
									</div>
									<div class="tr">
										<div class="td">Medical Conditions</div>
										<div class="td">{{ $player->medical_conditions}} </div>
									</div>
								</div>                         	
	                        </form>

	                      </div>
	                      
	                      <div class="tab-pane" id="tab3">
	                        
	                        <form class="form-horizontal form3" role="form" parsley-validate id="eula">
								<div class="printable">
									<div class="tr">
										<div><h3> Nike Event Release </h3></div>
									</div>
									<div class="tr">
										<div class="td"></div>
										<div class="td">{{ $player->release_text }} </div>
									</div>
									<div class="tr">
										<div class="td">I certify that: </div>
										<div class="td">{{ $player->release_i_certify}}</div>
									</div>
									<div class="tr">
										<div class="td">Participant Digital Signature</div>
										<div class="td">{{ $player->release_print_name }} </div>
									</div>
									<div class="tr">
										<div class="td">Date signed</div>
										<div class="td">
											<?php
												$format_date = strtotime($player->release_date_signed);
												echo date('m/d/Y', $format_date); 
											?>
										</div>
									</div>
									<div class="tr">
										<div class="td">Date of birth</div>
										<div class="td">
											<?php
												$format_date = strtotime($player->release_birth_date);
												echo date('m/d/Y', $format_date); 
											?>
										</div>
									</div>
									<div class="tr">
										<div class="td">Address</div>
										<div class="td">{{ $player->release_address }} </div>
									</div>
									<div class="tr">
										<div class="td">Email Address</div>
										<div class="td">{{ $player->release_email }} </div>
									</div>
									<div class="tr">
										<div class="td">Phone number</div>
										<div class="td">{{ $player->release_phone }} </div>
									</div>
									<div class="tr">
										<div class="td">Emergency Contact</div>
										<div class="td">{{ $player->release_emergency_contact }} </div>
									</div>
									<div class="tr">
										<div class="td"></div>
										<div class="td">{{ $player->release_text_minor }} </div>
									</div>
									<div class="tr">
										<div class="td">Parent or Guardian Name</div>
										<div class="td">{{ $player->release_parent_name }} </div>
									</div>
									<div class="tr">
										<div class="td">Date Signed</div>
										<div class="td">
											<?php
												$format_date = strtotime($player->release_parent_date_signed);
												echo date('m/d/Y', $format_date); 
											?>
										</div>
									</div>
								</div>                         	
	                        </form>

	                      </div>

	                    </div>
                    @else
						The Player is not selected
					@endif	
                    

                  </div>
                  <!-- /tile body -->

                  <!-- tile footer -->
                  <div class="tile-footer border-top color white rounded-bottom-corners nopadding non-printable">
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

