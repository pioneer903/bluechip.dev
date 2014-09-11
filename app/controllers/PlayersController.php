<?php

class PlayersController extends BaseController {

  public $restful = true;

  /**
   * Display a listing of the resource.
   * GET /players
   *
   * @return Response
   */
  public function index() {
    //route get users
    //return all the players
    // $seasons = Player::all()->season;
    // dd($seasons);

    $players = Player::all();
    $seasons = Season::all();
    // $grad_year_list = Season::groupBy('grad_year')->get(array('grad_year'));
    // $season_list = Season::groupBy('season')->lists('season', 'season');
    // $grad_year = Season::groupBy('grad_year')->lists('grad_year', 'grad_year');

    return View::make('players.index')
                    ->with('players', $players)
                    ->with('seasons', $seasons);
  }

  public function postIndex() {
    return "form submitted. The name was " . Input::get('user_name');
  }

  /**
   * Show the form for creating a new resource.
   * GET /players/create
   *
   * @return Response
   */
  public function create() {
    //route/users/create
    //create new player
    $letters = Letter::orderBy('id', 'asc')->get();
    $letters_array = array();
    foreach ($letters as $l) {
      $letters_array[$l->id] = $l->letter_title;
    }

    $seasons = Season::orderBy('id', 'desc')->get();
    $seasons_array = array();
    foreach ($seasons as $s) {
      $seasons_array[$s->id] = $s->grad_year . ' ' . $s->season;
    }
    return View::make('players.create', compact('seasons_array', 'letters_array'));
  }

  /**
   * Store a newly created resource in storage.
   * POST /players
   *
   * @return Response
   */
  public function store() {
    //route post
    // insert data into database
    
    $input = Input::all();

    //Validate inputs against the rules in the /models/Player
    $v = Validator::make($input, Player::$rules, Player::$messages);
    if ($v->passes()) {

      //Create new instance of a player
      $player = new Player;

      //Save all the inputs into the new player 
      $player->first_name = $input['first_name'];
      $player->last_name = $input['last_name'];
      $player->email = $input['email'];
      $player->phone = $input['phone'];

      $player->street = $input['street'];
      $player->city = $input['city'];
      $player->state = $input['state'];
      $player->zip = $input['zip'];
      $player->country = $input['country'];

      $player->season_id = $input['season_id'];
      $player->graduation_year = $input['graduation_year'];
      $player->position = $input['position'];
      $player->player_registration_date = $input['player_registration_date'];
      $player->payment_due_date = $input['payment_due_date'];
      $player->save();

      //Create token for the new player
      $token = $player->last_name . Str::random(5);
      $ext = 0;
      while (Token::where('token', '=', $token)->count() > 0) {
        $token = $token . $ext;
        $ext++;
      }
      $t = new Token();
      $t->token = $token;
      $t->player_id = $player->id;
      $t->save();
      $data = array('email' => $player->email);
      // Mail::send('email.new', compact('player','token'), function($message) use($data) {
      //           $message->to($data['email'])->subject('Invitation');
      //         });
      // return Redirect::to('players/new')->with('success', 'You created new player ' . $player->username . ' successfully. Link '. $token)
      //   ->with('player', $player)
      //   ->with('token', $token);
      // Session::put('success', 'You created new player ' . $player->username . ' successfully.');
      $season = Season::where('id', '=', $player->season_id)->first();
      
      //Add generated and merged letter to the Players table
      $letter_id = $input['letter_id'];
      $letter = Letter::find($letter_id);
      $mergedLetter = new MergeCodes($player, $season, $token);
      $player->letter = $mergedLetter->transform($letter->letter_text);
      $player->save();
      

      return View::make('players.registration')
                      ->with('player', $player)
                      ->with('season', $season)
                      ->with('token', $token)
                      ->with('letter', $letter);
    } else {
      return Redirect::to('players/create')
                      ->withInput()
                      ->withErrors($v);
    }
  }

  public function create_token($id)
  {
    $player = Player::find($id);

    //Create new token for the player
    $token = $player->last_name . Str::random(5);
    $ext = 0;
    while (Token::where('token', '=', $token)->count() > 0) {
      $token = $token . $ext;
      $ext++;
    }
    $t = new Token();
    $t->token = $token;
    $t->player_id = $player->id;
    $t->save();

    return View::make('players/link')
      ->with('token', $t)
      ->with('player', $player);
  }

  /**
   * Display the specified resource.
   * GET /players/{id}
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id) {

    //lookup specific player by id
    $player = Player::find($id);

    $season = Season::where('id', '=', $player->season_id)->first();
    return View::make('players.show')
                    ->with('player', $player)
                    ->with('season', $season);
  }

  public function print_player($id) {
    if ($id == null) {
      return 'id is null';
    } elseif (!is_null($id)) {

      $player = Player::find($id);

      $season = Season::where('id', '=', $player->season_id)->first();
      return View::make('players.print_player')
                      ->with('player', $player)
                      ->with('season', $season);
    } else {
      return 'something else';
    }
  }

  /**
   * Show the form for editing the specified resource.
   * GET /players/{id}/edit
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id) {

    $seasons = Season::orderBy('id', 'desc')->get();
    $seasons_array = array();
    foreach ($seasons as $s) {
      $seasons_array[$s->id] = $s->grad_year . ' ' . $s->season;
    }
    $player = Player::find($id);
    if (is_null($player)) {
      return Redirect::route('players.index');
    }
    return View::make('players.edit', compact('seasons_array'))
                    ->with('player', $player);
  }

  /**
   * Update the specified resource in storage.
   * PUT /players/{id}
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id) {
    $input = Input::except(array('_method', '_token'));
    $user = User::where('username', '=', 'admin');
    $validation = Validator::make($input, Player::$rules_update);
    if ($validation->passes()) {
      $player = Player::find($id);
      $player->update($input);

      if (Auth::user()->role_id == 3) {
        return Redirect::route('confirmation', $id)
                        ->with('success', $player->first_name . ' ' . $player->last_name . '\'s profile was successfully updated');
      }
      return Redirect::route('players.show', $id)
                      ->with('success', $player->first_name . ' ' . $player->last_name . '\'s profile was successfully updated');
    }
    return Redirect::route('players.edit', $id)
                    ->withInput()
                    ->withErrors($validation)
                    ->with('message', 'There were validation errors.');
  }

  /**
   * Remove the specified resource from storage.
   * DELETE /players/{id}
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id) {

    if (Player::find($id)) {
      $seasons = Season::all();
      Player::find($id)->delete();

      return Redirect::to('players')
                      ->with('success', 'Player deleted')
                      ->with('seasons', $seasons);
    } else {
      $seasons = Season::all();
      return View::make('players.index')->withErrors('The player was already deleted');
    }
  }

  public function ajax() {

    $player = Player::find(Input::get('id'));
    $player->paid = Input::get('checked');
    $player->save();
  }

  // public function ajaxLetter() {

  //   $player = Player::find(Input::get('id'));
  //   $player->letter = Input::get('letter');
  //   $player->save();
  // }

  public function ajaxCheckUsername(){
    $username = Input::get('username');
    $user = User::where('username', '=', $username)->count();
    if($user>0){
      echo 0;
    }
    else{
      echo 1;
    }
  }

  public function deferLoading(){
    // DB table to use
    $table = 'players';
     
    // Table's primary key
    $primaryKey = 'id';
     
    // Array of database columns which should be read and sent back to DataTables.
    // The `db` parameter represents the column name in the database, while the `dt`
    // parameter represents the DataTables column identifier. In this case simple
    // indexes
    $columns = array(
        array( 'db' => 'first_name', 'dt' => 0 ),
        array( 'db' => 'last_name',  'dt' => 1 ),
        array( 'db' => 'phone',   'dt' => 2 ),
        array( 'db' => 'email',     'dt' => 3 ),
        array( 'db' => 'graduation_year',     'dt' => 3 )        
    );
     
    // SQL server connection information
    $sql_details = array(
        'user' => 'root',
        'pass' => '',
        'db'   => 'bluechip',
        'host' => 'localhost'
    );
     
     
    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * If you just want to use the basic configuration for DataTables with PHP
     * server-side, there is no need to edit below this line.
     */
     
    require( 'ssp.class.php' );
     
    echo json_encode(
        SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
    );
  }

  public function link($token) {

    if (Token::where('token', '=', $token)->count() > 0) {
      $t = Token::where('token', '=', $token)->first();
      $player_id = $t->player_id;
      $player = Player::find($player_id);
//      $t->delete();

      $seasons = Season::orderBy('id', 'desc')->get();
      $seasons_array = array();
      foreach ($seasons as $s) {
        $seasons_array[$s->id] = $s->grad_year . ' ' . $s->season;
      }

      return View::make('players.password', compact('player', 'token'))
                      ->with('seasons_array', $seasons_array);
    } else {
      return Redirect::to('/');
    }
  }

  public function email() {
    $emails = array();
    foreach (Input::get('players') as $player) {
      $pl = Player::find($player);
      $emails[] = $pl->email;
    }
    $emails = implode(', ', $emails);
    return View::make('players.email', compact('emails'));
  }

  public function emailSend() {
    $headers = 'From: ' . $_POST["from"] . PHP_EOL; //added a From field in the email.blade.php for SMTP blocking server
    $emails = Input::get('recepients');
    $emails = explode(',', $emails);
    $subject = Input::get('subject');
    $body = Input::get('message');
    foreach ($emails as $email) {
      $email = trim($email);
      if (Player::where('email', '=', $email)->count() > 0) {
        $mailuser = Player::where('email', '=', $email)->first();
        //For the server that blocks SMTP
        mail($mailuser['email'], $subject, $body, $headers);

        /* For the server that blocks SMTP */
        // Mail::queue('email.general', compact('body'), function($message) use ($mailuser,$subject) {
        //   $message
        //           ->to($mailuser['email'], $mailuser['first_name'] . ' ' . $mailuser['lastname'])
        //           ->subject($subject);
        // });
      } else {

        $email = trim($email);
        //For the server that blocks SMTP
        mail($email, $subject, $body, $headers);

        /* For the server that allows SMTP */
        // Mail::queue('email.general',compact('body'), function($message) use ($email, $subject) {
        //   $message
        //           ->to($email)
        //           ->subject($subject);
        // });
      }
    }
    return View::make('players.emailConfirmation')
                    ->with('emails', $emails)
                    ->with('subject', $subject)
                    ->with('body', $body);
  }

  public function save_pdf($id) {
    $player = Player::find($id);
    $pdf = PDF::loadHTML($player->letter)->save('files/' . $player->first_name . ' ' . $player->last_name . '.pdf');
    return $pdf->download($player->first_name . ' ' . $player->last_name . '.pdf');
    // return $pdf->download($player->first_name.' '.$player->last_name.'.pdf');
  }

  public function playerPrint() {
    $html = <<<HTML
  <html>
      <head>
            <style type="text/css">
               @page player {
                  size: A4 portrait;
                  margin: 2cm;
                }
                .playerPage {
                   page: teacher;
                   page-break-after: always;
                }
                table h3{text-align:left; margin-bottom: 5px;}
                table td.border {border: 1px solid gray;}
                .bold{font-weight:bold;}
                .capitalize{text-transform:capitalize;}
            </style>
      </head>
      <body>
HTML;


    foreach (Player::whereIn('id', Input::get('players'))->get() as $player) {
      $season = Season::where('id', '=', $player->season_id)->first();
      
      $html .= '<div class="playerPage">
                  
                  <table id="players_information">
                    <tr>
                      <th colspan="5"><h3>Personal Information</h3></th>
                    </tr>
                    <tr>
                      <td>First Name</td>
                      <td  class="bold">' . $player->first_name . ' </td>
                      <td class="divider"></td>
                      <td>Last Name</td>
                      <td class="bold">' . $player->last_name . ' </td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td class="bold"><a href="mailto:' . $player->email . '?Subject=Contact%20from%20Blue%20Chip" target="_top">' . $player->email . ' </a></td>
                      <td class="divider"></td>
                      <td>Phone</td>
                      <td class="bold">' . $player->phone. ' </td>
                    </tr>
                    <tr>
                      <td>Street Address</td>
                      <td class="bold">' . $player->street. ' </td>
                      <td></td>
                      <td>City</td>
                      <td class="bold">' . $player->city. ' </td>
                    </tr>
                    <tr>
                      <td>State</td>
                      <td class="bold">' . $player->state. ' </td>
                      <td></td>
                      <td>Zip Code</td>
                      <td class="bold">' . $player->zip. ' </td>
                    </tr>
                    <tr>
                      <td>Date of Birth</td>
                      <td class="bold">'. date("m/d/Y", strtotime($player->birth_date)) .'</td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>Height</td>
                      <td class="bold">' . $player->height . ' </td>
                      <td></td>
                      <td>Weight</td>
                      <td class="bold">' . $player->weight. ' </td>
                    </tr>

                    <tr>
                      <th colspan="5"><h3>Parents/Guardians Information</h3></th>
                    </tr>
                    <tr>
                      <td>Parent/Guardian 1: Name</td>
                      <td class="bold">' . $player->parent1_name. ' </td>
                      <td></td>
                      <td>Email</td>
                      <td><a href="mailto:' . $player->parent1_email . '?Subject=Contact%20from%20Blue%20Chip" target="_top">' . $player->parent1_email. ' </a></td>
                    </tr>
                    <tr>
                      <td>Parent/Guardian 2: Name</td>
                      <td class="bold">' . $player->parent2_name. ' </td>
                      <td></td>
                      <td> Email</td>
                      <td><a href="mailto:' . $player->parent2_email . '?Subject=Contact%20from%20Blue%20Chip" target="_top">' . $player->parent2_email. ' </a></td>
                    </tr>
                  </table>

                  
                  <table>
                    <tr>
                      <th colspan="5"><h3> School and Team Information</h3></th>
                    </tr>
                    <tr>
                      <td>Camp Year and Season</td>
                      <td class="bold capitalize" colspan="3">' . $season->grad_year  . ' ' . $season->season . '</td>
                    </tr>
                    
                    <tr>
                      <td>Graduation year</td>
                      <td class="bold capitalize">' . $player->graduation_year. ' </td>
                      <td></td>
                      <td>School Name</td>
                      <td class="bold">' . $player->school_name. ' </td>
                    </tr>
                    <tr>
                      <td>School Coach</td>
                      <td class="bold">' . $player->school_coach. ' </td>
                      <td></td>
                      <td>School Coach Phone</td>
                      <td class="bold">' . $player->school_coach_phone. ' </td>
                    </tr>
                    <tr>
                      <td>Club Team</td>
                      <td class="bold">' . $player->club_team. ' </td>
                      <td></td>
                      <td>Club Coach</td>
                      <td class="bold">' . $player->club_coach. ' </td>
                    </tr>
                    <tr>
                      <td>Club Coach Phone</td>
                      <td class="bold">' . $player->club_coach_phone. ' </td>
                      <td></td>
                      <td>GPA</td>
                      <td class="bold">' . $player->gpa. ' </td>
                    </tr>
                   
                    <tr>
                      <td>PSAT</td>
                      <td class="bold">' . $player->psat. ' </td>
                      <td></td>
                      <td>SAT/ACT</td>
                      <td class="bold">' . $player->sat_act. ' </td>
                    
                    </tr>
                  </table>

                  <table>
                    <tr>
                      <th colspan="5"><h3> Lacrosse Information</h3></th>
                    </tr>
                    <tr>
                      <td>Position</td>
                      <td class="bold">' . $player->position . ' </td>
                      <td></td>
                      <td>Hand</td>
                      <td class="bold">' . $player->hand . ' </td>
                    </tr>
                    <tr>
                      <td>Faceoff</td>
                      <td class="bold">' . $player->faceoff . ' </td>
                      <td></td>
                      <td>LSM</td>
                      <td class="bold">' . $player->lsm . ' </td>
                    </tr>
                    <tr>
                      <td>Lacrosse Honors</td>
                      <td class="bold">' . $player->lacrosse_honors . ' </td>
                      <td></td>
                      <td>Other Sports</td>
                      <td class="bold">' . $player->other_sports . ' </td>
                    </tr>
                    <tr>
                      <td>I have committed to</td>
                      <td colspan="4" class="bold">' . $player->committed_to. ' </td>
                    </tr>
                  </table>
                </div>
                
                <div class="playerPage">
                  <table>

                    <tr>
                      <th colspan="2"><h3> Medical Information</h3></th>
                    </tr>
                    <tr>
                      <td>First Name</td>
                      <td  class="bold">' . $player->first_name . ' </td>
                      <td class="divider"></td>
                      <td>Last Name</td>
                      <td class="bold">' . $player->last_name . ' </td>
                    </tr>
                    <tr>
                      <td>Health Insurance Company Name</td>
                      <td class="bold">' . $player->insurance_company. ' </td>
                    </tr>
                    <tr>
                      <td>Health Insurance Policy</td>
                      <td class="bold">' . $player->insurance_policy . ' </td>
                    </tr>
                    <tr>
                      <td>Health Insurance Effective Date</td>
                      <td class="bold">'. date("m/d/Y", strtotime($player->insurance_date)). '</td>
                    </tr>
                    <tr>
                      <td>Player Signature</td>
                      <td class="bold">' . $player->player_signature_medical . ' </td>
                    </tr>
                    <tr>
                      <td>Player Signature Date</td>
                      <td class="bold">' . date("m/d/Y", strtotime($player->player_signature_date_medical)). '</td>
                    </tr>
                    <tr>
                      <td>Parent/Guardian Signature</td>
                      <td class="bold">' . $player->parent_signature_medical . ' </td>
                    </tr>
                    <tr>
                      <td>Parent/Guardian Signature Date</td>
                      <td class="bold">' . date("m/d/Y", strtotime($player->parent_signature_date_medical)). '</td>

                    </tr>
                    <tr>
                      <td>Emergency Phone #1 </td>
                      <td class="bold">' . $player->emergency_phone1 . ' </td>
                    </tr>
                    <tr>
                      <td>Emergency Phone #2 </td>
                      <td class="bold">' . $player->emergency_phone2 . ' </td>
                    </tr>
                    <tr>
                      <td>Medical Conditions</td>
                      <td class="bold">' . $player->medical_conditions. ' </td>
                    </tr>
                  </table> 
                </div>

                ';
    }

    // return PDF::loadHTML($html)->download('selected.pdf');
    return PDF::loadHTML($html)->stream('selected-players-'. date('j/F/Y h:i:s A').'pdf');
    
  }

  public function confirmation($id) {
    $player = Player::find($id);
    return View::make('players.confirmation')
                    ->with('player', $player);
  }

  public function password() {
    $token = Token::where('token', '=', Input::get('token'));
    if ($token->count() > 0) {
      $player = Player::find(Input::get('player_id'));
      $user = new User();
      $user->password = Hash::make(Input::get('password'));
      $user->first_name = $player->first_name;
      $user->last_name = $player->last_name;
      $user->username = Input::get('username');
      $user->role_id = 3;
      $user->save();
      $player->user_id = $user->id;
      $player->save();
      $token->delete();

      if (Auth::attempt(array('username' => $user->username, 'password' => Input::get('password')))) {
        return Redirect::intended('players/' . $player->id . '/edit');
      } else {
        // return Redirect::intended('players.edit');  
        echo 'User is not authenticated';
      }
    }
  }

  public function test(){
    return View::make('players.test');
  }


}
