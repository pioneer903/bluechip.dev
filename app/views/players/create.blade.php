@extends('layouts.master')

@section('nav')
  
@endsection

@section('content')

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
                    <h1>Add new player</h1>
                  </div>
                  <!-- /tile header -->

                  <!-- tile body -->
            <div class="tile-body color transparent-black rounded-corners">
              
              {{ Form::open(array('url' => 'players', 'method' => 'POST', 'class' => 'form-horizontal',  'role' => 'form', 'parsley-validate')) }}
                <legend>Personal Information</legend>
                <div class="form-group">
                  <label for="first_name" class="col-sm-4 control-label">First Name</label>
                  <div class="col-sm-8">
                    {{ Form::text('first_name', '', array( 'class' => 'form-control', 
                      'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '2', 'parsley-validation-minlength' => '1')) }}
                  </div>
                </div>

                 <div class="form-group">
                  <label for="last_name" class="col-sm-4 control-label">Last Name</label>
                  <div class="col-sm-8">
                    {{ Form::text('last_name', '', array( 'class' => 'form-control', 
                      'parsley-trigger' => 'change', 'parsley-required' => 'true', 'parsley-minlength' => '2', 'parsley-validation-minlength' => '1')) }}
                  </div>
                </div>


                <div class="form-group">
                  <label for="email" class="col-sm-4 control-label">Email</label>
                  <div class="col-sm-8">
                    {{ Form::text('email','', array('class' => 'form-control')) }}
                  </div>
                </div>

                <div class="form-group">
                  <label for="phone" class="col-sm-4 control-label">Phone</label>
                  <div class="col-sm-8">
                    {{ Form::text('phone','', array('class' => 'form-control')) }}
                  </div>
                </div>

                <legend>Address</legend>
                <div class="form-group">
                  <label for="street" class="col-sm-4 control-label">Street Address</label>
                  <div class="col-sm-8">
                    {{ Form::text('street','', array('class' => 'form-control')) }}
                  </div>
                </div>

                <div class="form-group">
                  <label for="city" class="col-sm-4 control-label">City</label>
                  <div class="col-sm-8">
                    {{ Form::text('city','', array('class' => 'form-control')) }}
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
                    {{ Form::text('zip','', array('class' => 'form-control')) }}
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


                <legend>Camp and School information</legend>
                

                <div class="form-group">
                  <label for="grad_year" class="col-sm-4 control-label">Camp Season</label>
                  <div class="col-sm-8">
                    {{ Form::select('season_id', $seasons_array, null, array('class'=>'chosen-select chosen-transparent form-control')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-4 control-label">Template</label>
                  <div class="col-sm-8">
                    {{ Form::select('letter_id', $letters_array, null, array('class'=>'chosen-select chosen-transparent form-control')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="graduation_year" class="col-sm-4 control-label">graduation year</label>
                  <div class="col-sm-8">
                    {{ Form::select('graduation_year', array(
                      'Senior' => 'Senior',
                      'Junior' => 'Junior',
                      'Sophomore' => 'Sophomore',
                      'Freshman' => 'Freshman',
                      ), null,
                      array('class'=>'chosen-select chosen-transparent form-control')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="position" class="col-sm-4 control-label">position </label>
                  <div class="col-sm-8">
                    {{ Form::select('position', array(
                      ''  => 'Select Position', 
                      'A' => 'A - Attack',
                      'M' => 'M - Midfield',
                      'D' => 'D - Defense (Long Stick Midfield)',
                      'G' => 'G - Goalie',
                      ), null ,
                      array('id' =>'positioin', 'class'=>'chosen-select chosen-transparent form-control')) }}
                  </div>
                </div>
                <?php
                    $player_registration_date = new DateTime();
                    $player_registration_date = $player_registration_date->format('Y-m-d');

                    $payment_due_date = new DateTime();
                    // add one month
                    //$payment_due_date->add(new DateInterval('P1M'));
                    
                    //add 21 days
                    date_add($payment_due_date, date_interval_create_from_date_string('21 days'));
                    $payment_due_date = $payment_due_date->format('Y-m-d');
                ?>

                <div class="form-group hidden">
                  <label for="player_registration_date" class="col-sm-4 control-label">player registration date *</label>
                  <div class="col-sm-8">
                    {{ Form::text('player_registration_date', $player_registration_date, 
                        array('class' => 'form-control ')) }}
                  </div>
                </div>
                <div class="form-group hidden">
                  <label for="payment_due_date" class="col-sm-4 control-label">payment_due_date  *</label>
                  <div class="col-sm-8">
                    {{ Form::text('payment_due_date', $payment_due_date,
                     array('class' => 'form-control ', )) }}
                  </div>
                </div>

               
                <div class="form-group form-footer">
                  <div class="col-sm-offset-4  col-sm-3">
                    {{ Form::submit('Add player', array('class' => 'btn btn-primary'))}}
                  </div>
                  <div class="col-sm-2">
                    {{ Form::reset('Reset', array('class' => 'btn btn-danger'))}}
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


