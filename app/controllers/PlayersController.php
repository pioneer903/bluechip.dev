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
    $seasons = Season::orderBy('id', 'desc')->get();
    $seasons_array = array();
    foreach ($seasons as $s) {
      $seasons_array[$s->id] = $s->grad_year . ' ' . $s->season;
    }
    return View::make('players.create', compact('seasons_array'));
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
    // return "Form submitted via store(). The name is ". Input::get('user_name');
    $input = Input::all();
    // DB::insert('insert into posts ( title, body) values(?,?)', array ($input['title'], $input['body']));
    // DB::table('posts')->insert(array(
    // 		'title' => $input['title'],
    // 		'body'	=> $input['body']
    // 	));



    $v = Validator::make($input, Player::$rules, Player::$messages);
    if ($v->passes()) {
      // DB::table('users')->insert(array(
      // 	'first_name' => $input['first_name'],
      // 	'last_name'	 => $input['last_name'],
      // 	'birth_date' => $input['birth_date'],
      // 	'height'	 => $input['height']
      // ));

      $player = new Player;
      // $player->birth_date = $input['birth_date'];
      // $player->height = $input['height'];
      // $player->username = $input['username'];
      // $player->password = Hash::make($input['password']);
      // $player->password_confirmation = $input['password_confirmation'];
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
      return View::make('players.registration')
                      ->with('player', $player)
                      ->with('season', $season)
                      ->with('token', $token);
      // return Redirect::to('/players/registration')->with('success', 'You created new player ' . $player->username . ' successfully. Link '. URL::to('link/'.$token));
    } else {
      return Redirect::to('players/create')
                      ->withInput()
                      ->withErrors($v);
    }
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

  public function ajaxLetter() {

    $player = Player::find(Input::get('id'));
    $player->letter = Input::get('letter');
    $player->save();
  }

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
//    dd(Input::all());

    $html = <<<HTML
  <html>
      <head>
            <style type="text/css">
               @page teacher {
  size: A4 portrait;
  margin: 2cm;
}

.teacherPage {
   page: teacher;
   page-break-after: always;
}

            </style>
      </head>
      <body>
HTML;


    foreach (Player::whereIn('id', Input::get('players'))->get() as $player) {

      $html .= '<div class="teacherPage">'
              . $player->letter .
              '</div>';
    }

    return PDF::loadHTML($html)->download('selected.pdf');
    // return $pdf->download($player->first_name.' '.$player->last_name.'.pdf');
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

}
