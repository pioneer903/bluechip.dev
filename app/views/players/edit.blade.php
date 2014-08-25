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
<script type="text/javascript">
$(document).ready(function(){
  
  var release_text = $('#release_text').html();
  $('#release_text_form').val(release_text);

  var release_text_minor = $('#release_text_minor').html();
  $('#release_text_minor_form').val(release_text_minor);

  var street = $('[name="street"]').val(); 
  var city = $('[name="city"]').val();
  var state = $('[name="state"]').val();
  var email = $('[name="email"]').val();
  var phone = $('[name="phone"]').val();
  var birth_date = $('[name="birth_date"]').val();
  var emergency_phone1 = $('[name="emergency_phone1"]').val();

  $('[name="release_address"]').val(street + ', ' + city + ', ' + state);
  $('[name="release_email"]').val(email);
  $('[name="release_phone"]').val(phone);
  $('[name="release_birth_date"]').val(birth_date);
  $('[name="release_emergency_contact"]').val(emergency_phone1);
 
  console.log(emergency_phone1);
  // release_text_minor_text

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
        <div id="content" >
          







          <!-- content main container -->
          <div class="main">




            <!-- row -->
            <div class="row">

              <!-- col 8 -->
              <div class="col-md-8 col-md-offset-2">



                <!-- tile -->
                <section class="tile color transparent">
                
                <!-- tile header -->
                  <div class="tile-header transparent">
                    <h1>Edit player</h1>
                  </div>
                  <!-- /tile header -->

                  <!-- tile body -->
            <div class="tile-body color transparent-black rounded-corners">
              
              {{ Form::model($player, array('role' => 'form', 'method' => 'put' , 'class' => 'form-horizontal form1',  'parsley-validate', 'route' => array('players.update', $player->id))) }}
                <legend>Personal Information</legend>
                <div class="form-group">
                  <label for="first_name" class="col-sm-4 control-label">First Name *</label>
                  @if (Auth::guest())
                    <div class="col-sm-8">
                      {{ Form::text('first_name', $player->first_name, array('readonly', 'class' => 'form-control', 
                        'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '2', 'parsley-validation-minlength' => '1')) }}
                    </div>
                  @else
                    <div class="col-sm-8">
                      {{ Form::text('first_name', $player->first_name, array( 'class' => 'form-control', 
                        'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '2', 'parsley-validation-minlength' => '1')) }}
                    </div>
                  @endif 
                </div>

                 <div class="form-group">
                  <label for="last_name" class="col-sm-4 control-label">Last Name *</label>
                 @if (Auth::guest())
                    <div class="col-sm-8">
                      {{ Form::text('last_name', $player->last_name, array('readonly', 'class' => 'form-control', 
                        'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '2', 'parsley-validation-minlength' => '1')) }}
                    </div>
                  @else
                    <div class="col-sm-8">
                      {{ Form::text('last_name', $player->last_name, array('class' => 'form-control', 
                        'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '2', 'parsley-validation-minlength' => '1')) }}
                    </div>
                  @endif
                </div>


                <div class="form-group">
                  <label for="email" class="col-sm-4 control-label">Email *</label>
                  <div class="col-sm-8">
                    {{ Form::text('email', $player->email, array('class' => 'form-control',
                        'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '2', 'parsley-validation-minlength' => '1')) }}
                  </div>
                </div>

                <div class="form-group">
                  <label for="phone" class="col-sm-4 control-label">Phone *</label>
                  <div class="col-sm-8">
                    {{ Form::text('phone', $player->phone, array('class' => 'form-control',
                        'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '2', 'parsley-validation-minlength' => '1')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="street" class="col-sm-4 control-label">Street Address *</label>
                  <div class="col-sm-8">
                    {{ Form::text('street', $player->street, array('class' => 'form-control',
                        'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '2', 'parsley-validation-minlength' => '1')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="city" class="col-sm-4 control-label">City *</label>
                  <div class="col-sm-8">
                    {{ Form::text('city', $player->city, array('class' => 'form-control',
                        'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '2', 'parsley-validation-minlength' => '1')) }}
                  </div>
                </div>

                <div class="form-group">
                  <label for="state" class="col-sm-4 control-label">State</label>
                  <div class="col-sm-8">
                    {{ Form::select('state', array(
                      ''   => 'Select State/Province',
                      'AL' => 'AL - Alabama',
                      'AK' => 'AK - Alaska',
                      'AS' => 'AS - American Samoa',
                      'AZ' => 'AZ - Arizona',
                      'AR' => 'AR - Arkansas',
                      'CA' => 'CA - California',
                      'CO' => 'CO - Colorado',
                      'CT' => 'CT - Connecticut',
                      'DE' => 'DE - Delaware',
                      'DC' => 'DC - District of Columbia',
                      'FM' => 'FM - Federated States of Micronesia',
                      'FL' => 'FL - Florida',
                      'GA' => 'GA - Georgia',
                      'GU' => 'GU - Guam',
                      'HI' => 'HI - Hawaii',
                      'ID' => 'ID - Idaho',
                      'IL' => 'IL - Illinois',
                      'IN' => 'IN - Indiana',
                      'IA' => 'IA - Iowa',
                      'KS' => 'KS - Kansas',
                      'KY' => 'KY - Kentucky',
                      'LA' => 'LA - Louisiana',
                      'ME' => 'ME - Maine',
                      'MH' => 'MH - Marshall Islands',
                      'MD' => 'MD - Maryland',
                      'MA' => 'MA - Massachusetts',
                      'MI' => 'MI - Michigan',
                      'MN' => 'MN - Minnesota',
                      'MS' => 'MS - Mississippi',
                      'MO' => 'MO - Missouri',
                      'MT' => 'MT - Montana',
                      'NE' => 'NE - Nebraska',
                      'NV' => 'NV - Nevada',
                      'NH' => 'NH - New Hampshire',
                      'NJ' => 'NJ - New Jersey',
                      'NM' => 'NM - New Mexico',
                      'NY' => 'NY - New York',
                      'NC' => 'NC - North Carolina',
                      'ND' => 'ND - North Dakota',
                      'MP' => 'MP - Northern Mariana Islands',
                      'OH' => 'OH - Ohio',
                      'OK' => 'OK - Oklahoma',
                      'OR' => 'OR - Oregon',
                      'PW' => 'PW - Palau',
                      'PA' => 'PA - Pennsylvania',
                      'PR' => 'PR - Puerto Rico',
                      'RI' => 'RI - Rhode Island',
                      'SC' => 'SC - South Carolina',
                      'SD' => 'SD - South Dakota',
                      'TN' => 'TN - Tennessee',
                      'TX' => 'TX - Texas',
                      'UT' => 'UT - Utah',
                      'VT' => 'VT - Vermont',
                      'VI' => 'VI - Virgin Islands',
                      'VA' => 'VA - Virginia',
                      'WA' => 'WA - Washington',
                      'WV' => 'WV - West Virginia',
                      'WI' => 'WI - Wisconsin',
                      'WY' => 'WY - Wyoming',
                      'AA' => 'AA - Armed Forces Americas',
                      'AE' => 'AE - Armed Forces Africa',
                      'AE' => 'AE - Armed Forces Canada',
                      'AE' => 'AE - Armed Forces Europe',
                      'AE' => 'AE - Armed Forces Middle East',
                      'AP' => 'AP - Armed Forces Pacific',
                      ' '   => '=========================',
                      'AB' => 'Alberta',
                      'BC' => 'British Columbia',
                      'MB' => 'Manitoba',
                      'NB' => 'New Brunswick',
                      'NL' => 'Newfoundland and Labrador',
                      'NS' => 'Nova Scotia',
                      'NT' => 'Northwest Territories',
                      'NU' => 'Nunavut',
                      'ON' => 'Ontario',
                      'PE' => 'Prince Edward Island',
                      'QC' => 'Quebec',
                      'SK' => 'Saskatchewan',
                      'YT' => 'Yukon',), null,
                      array('class'=>'chosen-select chosen-transparent form-control')) }}

                  </div>
                </div>

                <div class="form-group">
                  <label for="zip" class="col-sm-4 control-label">Zip</label>
                  <div class="col-sm-8">
                    {{ Form::text('zip',$player->zip, array('class' => 'form-control')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="country" class="col-sm-4 control-label">country </label>
                  <div class="col-sm-8">
                    {{ Form::select('country', array(
                      'US' => 'United States',
                      'Canada' => 'Canada',), null,
                      array('id' =>'country', 'class'=>'chosen-select chosen-transparent form-control')) }}
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="birth_date" class="col-sm-4 control-label">Date of birth *</label>
                  <div class="col-sm-8">
                    {{ Form::date('birth_date', $player->birth_date, array('class' => 'form-control datepicker', 
                      'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '4', 
                      'parsley-type'=>'dateIso', 'parsley-validation-minlength'=> '1')) }}
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="player_registration_date" class="col-sm-4 control-label">player registration date</label>
                  <div class="col-sm-8">
                    <?php $player_registration_date = strtotime($player->player_registration_date);  ?>
                    {{ Form::text('player_registration_date',  date('m/d/Y',$player_registration_date),
                     array('class' => 'form-control ','readonly')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="payment_due_date" class="col-sm-4 control-label">payment due date  </label>
                  <div class="col-sm-8">
                    <?php $payment_due_date = strtotime($player->payment_due_date); ?>
                    {{ Form::text('payment_due_date', date('m/d/Y', $payment_due_date),
                     array('class' => 'form-control ','readonly')) }}
                  </div>
                </div>

        
                <div class="form-group">
                  <label for="height" class="col-sm-4 control-label">Height *</label>
                  <div class="col-sm-8">
                    {{ Form::text('height', $player->height, array('class' => 'form-control',
                        'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '2', 'parsley-validation-minlength' => '1')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="weight" class="col-sm-4 control-label">Weight *</label>
                  <div class="col-sm-8">
                    {{ Form::text('weight', $player->weight, array('class' => 'form-control',
                        'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '2', 'parsley-validation-minlength' => '1')) }}
                  </div>
                </div>



                <legend>Parents Information</legend>
                <div class="form-group">
                  <label for="parent1_name" class="col-sm-4 control-label">parent1 name *</label>
                  <div class="col-sm-8">
                    {{ Form::text('parent1_name', $player->parent1_name, array('class' => 'form-control',
                        'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '2', 'parsley-validation-minlength' => '1')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="parent1_email" class="col-sm-4 control-label">parent1 email *</label>
                  <div class="col-sm-8">
                    {{ Form::text('parent1_email', $player->parent1_email, array('class' => 'form-control',
                        'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '2', 'parsley-validation-minlength' => '1')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="parent2_name" class="col-sm-4 control-label">parent2 name</label>
                  <div class="col-sm-8">
                    {{ Form::text('parent2_name', $player->parent2_name, array('class' => 'form-control')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="parent2_email" class="col-sm-4 control-label">parent2 email</label>
                  <div class="col-sm-8">
                    {{ Form::text('parent2_email', $player->parent2_email, array('class' => 'form-control')) }}
                  </div>
                </div>

               

                <legend>School and Team Information</legend>
                
                <div class="form-group">
                  <label for="grad_year" class="col-sm-4 control-label">Camp Season</label>
                  <div class="col-sm-8">
                    {{ Form::select('season_id', $seasons_array, null, array('class'=>'chosen-select chosen-transparent form-control')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="graduation_year" class="col-sm-4 control-label">graduation year</label>
                  <div class="col-sm-8">
                    {{ Form::select('graduation_year', array(
                      'freshman' => 'Freshman',
                      'junior' => 'Junior',
                      'sophomore' => 'Sophomore',
                      'senior' => 'Senior',), 'cribbb',
                      array('class'=>'chosen-select chosen-transparent form-control')) }}

                  </div>
                </div>
                <div class="form-group">
                  <label for="school_name" class="col-sm-4 control-label">school name</label>
                  <div class="col-sm-8">
                    {{ Form::text('school_name', $player->school_name, array('class' => 'form-control')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="school_coach" class="col-sm-4 control-label">school coach</label>
                  <div class="col-sm-8">
                    {{ Form::text('school_coach', $player->school_coach, array('class' => 'form-control')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="school_coach_phone" class="col-sm-4 control-label">school coach phone</label>
                  <div class="col-sm-8">
                    {{ Form::text('school_coach_phone', $player->school_coach_phone, array('class' => 'form-control')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="club_team" class="col-sm-4 control-label">club team</label>
                  <div class="col-sm-8">
                    {{ Form::text('club_team', $player->club_team, array('class' => 'form-control')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="club_coach" class="col-sm-4 control-label">club coach</label>
                  <div class="col-sm-8">
                    {{ Form::text('club_coach', $player->club_coach, array('class' => 'form-control')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="club_coach_phone" class="col-sm-4 control-label">club coach phone</label>
                  <div class="col-sm-8">
                    {{ Form::text('club_coach_phone', $player->club_coach_phone, array('class' => 'form-control')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="gpa" class="col-sm-4 control-label">GPA </label>
                  <div class="col-sm-8">
                    {{ Form::text('gpa', $player->gpa, array('class' => 'form-control')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="psat" class="col-sm-4 control-label">PSAT </label>
                  <div class="col-sm-8">
                    {{ Form::text('psat', $player->psat, array('class' => 'form-control')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="sat_act" class="col-sm-4 control-label">SAT/ACT </label>
                  <div class="col-sm-8">
                    {{ Form::text('sat_act', $player->sat_act, array('class' => 'form-control')) }}
                  </div>
                </div>

                <legend>Lacrosse Information</legend>
                @if((Auth::user()->role_id)==1)
                <div class="form-group">
                  <label for="position" class="col-sm-4 control-label">position *</label>
                  <div class="col-sm-8">
                    {{ Form::select('position', array(
                      ''  => 'Please Select', 
                      'A' => 'A - ATTACK',
                      'D' => 'D - DEFENSE (Long Stick MIDFIELD)',
                      'G' => 'G - GOALIE',
                      'M' => 'M - MIDFIELD',), $player->position,
                      array('id' =>'positioin', 'class'=>'chosen-select chosen-transparent form-control',
                        'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-error-container' =>'position')) }}
                  </div>
                </div>
                @else
                <div class="form-group">
                  <label for="position" class="col-sm-4 control-label">position </label>
                  <div class="col-sm-8">
                    {{ Form::text('position', $player->sat_act, array('class' => 'form-control', 'readonly')) }}
                  </div>
                </div>
                @endif

                <div class="form-group">
                  <label class="col-sm-4 control-label" id="hand_label">Hand *</label>
                  <div class="col-sm-8">
                    <div class="radio radio-transparent">
                      <input type="radio" name="hand" id="left" value="left" 
                          parsley-group="hand-group" parsley-trigger="change" parsley-required="true" parsley-mincheck="1" parsley-error-container="#hand_label .last"
                          @if(($player->hand)=="left") checked="checked"@endif> 
                      <label for="left" >left</label>
                    
                      <input type="radio" name="hand" id="right" value="right" 
                          parsley-group="hand-group" parsley-trigger="change" parsley-required="true" parsley-mincheck="1" parsley-error-container="#hand_label .last"
                          @if(($player->hand)=="right") checked="checked"@endif> 
                      <label for="right">right</label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label" id="hand_label">Faceoff *</label>
                  <div class="col-sm-8">
                    <div class="radio radio-transparent">
                      <input type="radio" name="faceoff" id="faceoff_yes" value="yes" 
                          parsley-group="faceoff-group" parsley-trigger="change" parsley-required="true" parsley-mincheck="1" parsley-error-container="#hand_label .last"
                          @if(($player->faceoff)=="yes") checked="checked"@endif> 
                      <label for="faceoff_yes" >yes</label>
                    
                      <input type="radio" name="faceoff" id="faceoff_no" value="no" 
                          parsley-group="faceoff-group" parsley-trigger="change" parsley-required="true" parsley-mincheck="1" parsley-error-container="#hand_label .last"
                          @if(($player->faceoff)=="no") checked="checked"@endif> 
                      <label for="faceoff_no">no</label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label" id="lsm_label">LSM *</label>
                  <div class="col-sm-8">
                    <div class="radio radio-transparent">
                      <input type="radio" name="lsm" id="lsm_yes" value="yes" 
                          parsley-group="lsm-group" parsley-trigger="change" parsley-required="true" parsley-mincheck="1" parsley-error-container="#lsm_label .last"
                          @if(($player->lsm)=="yes") checked="checked" @endif> 
                      <label for="lsm_yes" >yes</label>
                    
                      <input type="radio" name="lsm" id="lsm_no" value="no" 
                          parsley-group="lsm-group" parsley-trigger="change" parsley-required="true" parsley-mincheck="1" parsley-error-container="#lsm_label .last"
                          @if(($player->lsm)=="no") checked="checked" @endif> 
                      <label for="lsm_no">no</label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="lacrosse_honors" class="col-sm-4 control-label">lacrosse honors </label>
                  <div class="col-sm-8">
                    {{ Form::text('lacrosse_honors', $player->lacrosse_honors, array('class' => 'form-control')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="other_sports" class="col-sm-4 control-label">other sports </label>
                  <div class="col-sm-8">
                    {{ Form::text('other_sports', $player->other_sports, array('class' => 'form-control')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="committed_to" class="col-sm-4 control-label">I have committed to </label>
                  <div class="col-sm-8">
                    {{ Form::text('committed_to', $player->committed_to, array('class' => 'form-control', 'placeholder' => 'Name of College')) }}
                  </div>
                </div>



                <legend>Medical Information</legend>
                <span class="help-block white">* Player must have health insurance to participate</span>
                <div class="form-group">
                  <label for="insurance_company" class="col-sm-4 control-label">health Insurance company *</label>
                  <div class="col-sm-8">
                    {{ Form::text('insurance_company', $player->insurance_company, array('class' => 'form-control',
                    'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '4')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="insurance_policy" class="col-sm-4 control-label">Insurance policy number *</label>
                  <div class="col-sm-8">
                    {{ Form::text('insurance_policy', $player->insurance_policy, array('class' => 'form-control',
                    'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '4')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="insurance_date" class="col-sm-4 control-label">Insurance effective date *</label>
                  <div class="col-sm-8">
                    {{ Form::date('insurance_date', $player->insurance_date, array('class' => 'form-control datepicker', 
                      'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '4', 
                      'parsley-type'=>'dateIso', 'parsley-validation-minlength'=> '1')) }}
                  </div>
                </div>
                <legend> Medical Treatment Authorization</legend>
                <span class="help-block white">The undersigned authorize the Nike Blue Chip Lacrosse Camp and its agents, permission to request medical treatment as necessary to insure the well being of the player. </span>
                <div class="form-group">
                  <label for="player_signature_medical" class="col-sm-4 control-label">player's digital signature *</label>
                  <div class="col-sm-4">
                    {{ Form::text('player_signature_medical', $player->player_signature_medical, array('class' => 'form-control', 'placeholder' => 'Print your full name', 
                      'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '4', 'parsley-validation-minlength' => '1')) }}
                  </div>
                  <div class="col-sm-4">
                    {{ Form::date('player_signature_date_medical', $player->player_signature_date_medical, array('class' => 'form-control datepicker', 
                      'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '4', 
                      'parsley-type'=>'dateIso', 'parsley-validation-minlength'=> '1')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="parent_signature_medical" class="col-sm-4 control-label">Parent/Guardian Signature signature and date</label>
                  <div class="col-sm-4">
                    {{ Form::text('parent_signature_medical', $player->parent_signature_medical, array('class' => 'form-control')) }}
                  </div>
                  <div class="col-sm-4">
                    {{ Form::date('parent_signature_date_medical', $player->parent_signature_date_medical, array('class' => 'form-control datepicker', 
                      'parsley-trigger' => 'change', 'parsley-type'=>'dateIso')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="emergency_phone1" class="col-sm-4 control-label">emergency phone #1* </label>
                  <div class="col-sm-8">
                    {{ Form::text('emergency_phone1', $player->emergency_phone1, array('class' => 'form-control',
                    'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '4')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="emergency_phone2" class="col-sm-4 control-label">emergency phone #2 </label>
                  <div class="col-sm-8">
                    {{ Form::text('emergency_phone2', $player->emergency_phone2, array('class' => 'form-control')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="medical_conditions" class="col-sm-4 control-label">medical conditions </label>
                  <div class="col-sm-8">
                    {{ Form::textarea('medical_conditions', $player->medical_conditions, array('class' => 'form-control')) }}
                    <span class="help-block white">Please list any medical conditions (allergies, asthma, diabetes, etc.) or special medication or physical conditions( recent injuries) that our certified trainer needs to be aware of to help your son play to the best of his ability.</span>
                  </div>
                </div>



                  <legend>Nike Event Release</legend>
                  <div class="col-md-12 bg-dark" id="release_text" >
                    <p><i>Please Read Carefully, Sign and Submit the form</i></p>
                    <p></p><b>NCAA/HIGH SCHOOL ELIGIBILITY.</b> I understand and agree that if I am, or may become, a student-athlete I am responsible for my own eligibility and/or amateur standing. I am aware of, and agree to comply with, all applicable rules, regulations, and bylaws of my state association, the NCAA and of any other governing body ("the Rules"). I understand the consequences of any failure to comply with the Rules, included but not limited to, loss of my eligibility to participate in future athletic contests in any sport.</p>
                    <p>For purposes of this "Participant Release" document, "Event" means the "XXX" event being held at [location name and address] on [date], any and all transportation to, from, and between Event locations, all product testing at the Event. In consideration of the opportunity to participate in the Event, I, the undersigned participant, acknowledge and agree that:</p>
                    <p><b>1.  ASSUMPTION OF RISK.</b> Participation in or attendance at the Event involves inherent risks and dangers of accidents, personal and bodily injury (including death) and property loss or damage. Theme may result from my own actions or inactions, as well as the actions or inactions of others, the rules of play, and the conditions of the facilities and equipment. Further, there may be other risks not know to me and not reasonably foreseeable at this time. I have considered the nature and extent of the risks involved, and I voluntarily choose to assume all such risks, both known and unknown, even those risks that result from the negligence of the Released Parties (defined below) or other and assume full responsibility for my participation in the Event. 
                      <b><i> I consent to treatment in the event of an emergency or other incident in which, in the reasonable judgment of the on-site personnel, I require medical care. I further agree to pay all costs associated with such medical care and to indemnify and hold harmless the Released Parties from any costs or claims arising from such medical care.</i></b></p>
                    <p><b>2.  RELEASE FROM LIABILITY.</b> I, for myself and on behalf of my heirs, estate, insurers, successors and assigns, hereby fully and forever release and discharge NIKE, Inc. and the affiliates and subsidiaries of NIKE, Inc., their respective officers, directors, shareholders, employees, agents, distributors, representatives, contractors, successors, assigns, and insurers, all Event sponsors, advertisers, volunteers, and staff, and all owners or lessors of premises used in connection with the Event (collectively the “Released Parties”) from any and all claims or causes of action  I may have for damages for personal or bodily injury, disability, death, loss or damage to person or property relating in any way to the Event, whether arising from the negligence of any or all of the Released Parties or otherwise, to the fullest extent permitted by law.</p>
                    <p><b>3.  AUTHORIZATION TO RECORD AND TO USE RECORDINGS and NAME.</b> I hereby grant to NIKE, Inc., its affiliates, subsidiaries, successors, assigns and licensees (collectively “NIKE”) permission to film, photograph, video record and otherwise record my image, voice, or any other aspects of the recording at the Event (collectively “Recording”) and the right, throughout the world, in perpetuity, to register for copyright, to use and to assign and/or license others to use all or any portion of the results thereof (or a reproduction thereof), in all media and in any manner now known or hereafter developed, in connection with the Event or otherwise without any additional consideration. I shall have no right of approval and no legal claim arising out of any use or editing of the recording or my name. NIKE shall have no obligation to use any of the rights I grant. I represent that it is not necessary for NIKE to obtain permission from or to pay any third party in connection with the rights granted in this paragraph.</p>
                    <p><b>4.  LICENCE TO USE COMMENTS, FEEDBACK AND IDEAS.</b> I hereby grant to NIKE a perpetual license to use all comments, feedback and ideas I may share with them, without notice, compensation or acknowledgement to me, for any purposes whatsoever, including, but not limited to, developing, manufacturing and marketing products and services and creating, modifying or improving products and services.</p>
                    <p><b>5.  ARBITRATION.</b> In the event of any dispute between me and any of the Released Parties (defined above), such dispute shall be settled by administered by the American Arbitration Association under its Commercial Arbitration Rules (but not its Procedures for Large, Complex Commercial Disputes). The hearing shall be conducted in Portland, Oregon unless both parties consent to a different location. The decision of the arbitrator shall be final and binding upon all parties, and judgment upon the award rendered pursuant to such arbitration may be entered in any court of competent jurisdiction. </p>
                    <p><b>I have read this Participant Release, fully understand and agree to its terms, and understand that I am giving up substantial rights by signing it. I sign this Participant Release freely and voluntarily, without any inducement or coercion.</b></p>

                  </div> 
                  <div class="form-group hidden"><!--  Hidden field to submit the text above to the database -->
                    <label for="release_text" class="col-sm-4 control-label">nike release  </label>
                    <div class="col-sm-8">
                      {{ Form::textarea('release_text', 'no text',
                       array('class' => 'form-control', 'readonly', 'id' => 'release_text_form')) }}
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-sm-4 control-label" id ="i_certify_label">* I certify that: *</label>
                    <div class="col-sm-8" id="i_certify">
                      <div class="radio radio-transparent" >
                        <input type="radio" name="release_i_certify" id="over_18"  value="I am over the age of majority (18 years of age or older in most states)" 
                          parsley-group="i_certify-group" parsley-trigger="change" parsley-required="true" parsley-mincheck="1" parsley-error-container="#i_certify_label .last"
                          @if($player->release_i_certify =="I am over the age of majority (18 years of age or older in most states)") checked="checked" @endif >
                        <label for="over_18" >I am over the age of majority (18 years of age or older in most states), or</label>
                      </div>
                      <div class="radio radio-transparent">
                        <input type="radio" name="release_i_certify" id="have_parent_consent"
                          parsley-group="i_certify-group" parsley-trigger="change" parsley-required="true" parsley-mincheck="1" parsley-error-container="#i_certify_label .last"
                          @if($player->release_i_certify =="I have my parent's or legal guardian's consent as indicated below") checked="checked" @endif value="I have my parent's or legal guardian's consent as indicated below">
                        <label for="have_parent_consent">I have my parent's or legal guardian's consent as indicated below</label>
                      </div>                
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="release_print_name" class="col-sm-4 control-label">Participant's signature and date*</label>
                    <div class="col-sm-4">
                      {{ Form::text('release_print_name', $player->release_print_name, array('class' => 'form-control', 'placeholder'=>'Print full name',
                      'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '4')) }}
                    </div>
                    <div class="col-sm-4">
                      {{ Form::date('release_date_signed', $player->release_date_signed, array('class' => 'form-control', 
                      'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '4', 'parsley-validation-minlength' => '1')) }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="release_birth_date" class="col-sm-4 control-label">Date of birth *</label>
                    <div class="col-sm-8">
                      {{ Form::date('release_birth_date', $player->release_birth_date, array('class' => 'form-control')) }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="release_address" class="col-sm-4 control-label">Address *</label>
                    <div class="col-sm-8">
                      {{ Form::text('release_address', $player->release_address, array('class' => 'form-control',
                      'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '4')) }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="release_email" class="col-sm-4 control-label">E-mail address *</label>
                    <div class="col-sm-8">
                      {{ Form::text('release_email', $player->release_email, array('class' => 'form-control',
                      'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '4')) }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="release_phone" class="col-sm-4 control-label">Phone number *</label>
                    <div class="col-sm-8">
                      {{ Form::text('release_phone', $player->release_phone, array('class' => 'form-control',
                      'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '4')) }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="release_emergency_contact" class="col-sm-4 control-label">Emergency contact *</label>
                    <div class="col-sm-8">
                      {{ Form::text('release_emergency_contact', $player->release_emergency_contact, array('class' => 'form-control',
                      'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '4')) }}
                    </div>
                  </div>

                
                  <div class="col-md-12 bg-dark" id="release_text_minor">
                    <p>IF THE PARTICIPANT IS A MINOR, THE PARENT OR GUARDIAN MYST READ AND SIGN BELOW:</p>
                    <p>I am the parent or legal guardian of the above-named participant, and I agree that the participant may take part in the Event. 
                      I understand that transportation may be provided, and, in the event transportation is provided, 
                      I consent to the participant taking the bus, car or other vehicle provided. 
                      On behalf of the participant, I hereby irrevocably and unconditionally 
                      (1) agree to all of the terms of this Participant Release, and 
                      (2) authorize NIKE to arrange for any necessary medical treatment for Participant.
                      I also, for myself and on behalf of my heirs, estate, insurers, successors and assigns, 
                      hereby fully and forever release and discharge the Released Parties (defined above) from any and all claims or causes of action 
                      I may have for damages for personal or bodily injury, disability, death, loss or damage to person or property, whether arising 
                      from the negligence of any or all of the Released Parties or otherwise, to the fullest extent permitted by law.
                    </p>
                  </div>
                  <div class="form-group hidden"><!--  Hidden field to submit the text above to the database -->
                    <label for="release_text" class="col-sm-4 control-label">nike release  </label>
                    <div class="col-sm-8">
                      {{ Form::textarea('release_text_minor', 'no text',
                       array('class' => 'form-control', 'readonly', 'id' => 'release_text_minor_form')) }}
                    </div>
                  </div>

                <div class="form-group">
                  <label for="release_parent_name" class="col-sm-4 control-label">Parent or guardian name and date *</label>
                  <div class="col-sm-4">
                    {{ Form::text('release_parent_name', $player->release_parent_name, array('class' => 'form-control',
                    'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '4')) }}
                  </div>
                  <div class="col-sm-4">
                    {{ Form::date('release_parent_date_signed', $player->release_parent_date_signed, array('class' => 'form-control', 
                      'parsley-trigger' => 'change', 'parsley-type'=>'dateIso', 'parsley-required' => 'true')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="check_number" class="col-sm-4 control-label">Check number you are including *</label>
                  <div class="col-sm-4">
                    {{Form::text('check_number', $player->check_number,
                     array('class' => 'form-control', 'id' => 'check_number', 'placeholder' => 'Check number you are including'))}}
                  </div>
                </div>
                <div class="form-group ">
                  <label for="comments" class="col-sm-4 control-label">additional comments </label>
                  <div class="col-sm-8">
                    {{ Form::textarea('comments', $player->comments,
                     array('class' => 'form-control', 'id' => 'comments', 'placeholder' => 'Please indicate if any initial information was inforrect')) }}
                  </div>
                </div>


                <div class="form-group form-footer">
                  <div class="col-sm-offset-4 col-sm-8">
                    {{ Form::submit('Update player', array('class' => 'btn btn-primary'))}}

                  </div>
                </div>
              {{ Form::close() }}
              <div class="span4" style="padding:30px;">
                @if($errors->any())
                <ul>
                  {{ implode('', $errors->all('<li class="has-error">:message</li>')) }}
                </ul>
                @endif
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





