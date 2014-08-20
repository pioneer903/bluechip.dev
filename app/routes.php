<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome');
// Route::get('players.letter', 'PlayersController@letter');

// Authentication
Route::get('login', 'AuthController@showLogin');
Route::post('login', 'AuthController@postLogin');
Route::get('logout', 'AuthController@getLogout');


// Secured Routes
Route::group(array('before' => 'auth'), function()
{
    Route::get('secret', 'HomeController@showSecret');
    Route::resource('players', 'PlayersController');
    Route::resource('seasons', 'SeasonsController');

});

Route::get('contact', 'Pages@contact');
Route::resource('users', 'UserController');

Route::get('/register', 'UserController@showUserRegistration');
Route::post('/register', 'UserController@saveUser');


// Route::get('players/(:any)/edit', 'players@edit');



Route::resource('posts', 'PostsController');
Route::resource('phones', 'PhonesController');

Route::get('/', 'HomeController@index');
Route::get('about', 'HomeController@about');
Route::get('thanks', 'HomeController@thanks');

Route::post('ajax', 'PlayersController@ajax');
Route::post('ajaxLetter', 'PlayersController@ajaxLetter');
Route::post('email', 'PlayersController@email');
Route::post('sendemail', 'PlayersController@emailSend');

Route::get('link/{token}', 'PlayersController@link');
// Route::get('print_player', array('as' => 'print_player', 'uses'=> 'PlayersController@print_player'));
Route::get('print_player/{id}', array('as' => 'print_player', 'uses'=> 'PlayersController@print_player', function($id){
	// return 'id is: '. $id; 
	// $player = Player::find($id);

 //    $season = Season::where('id', '=', $player->season_id)->first();
 //    return View::make('players.print_player')
 //                    ->with('player', $player)
 //                    ->with('season', $season);

    
}));
Route::get('letter/{id}', array('as' => 'letter', 'uses'=> 'PlayersController@letter', function($id){
}));

Route::get('save_pdf/{id}', array('as' => 'save_pdf', 'uses'=> 'PlayersController@save_pdf', function($id){
}));

Route::get('confirmation/{id}', array('as' => 'confirmation', 'uses'=> 'PlayersController@confirmation', function($id){
}));



// get the cuteness level of a puppy
Route::get('puppies/{cutelevel}', function($cutelevel) 
	{
		return 'This puppy is an absolute ' . $cutelevel . ' out of ' . $cutelevel;
	});


Route::get('/csv', function() {
    $table = Player::get('first_name');
 	
    foreach ($table as $row) {
        $output=  implode(",",$row->toArray());
        var_dump($output);
    }
    $headers = array(
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="ExportFileName.csv"',
    );
 
    return Response::make(rtrim($output, "\n"), 200, $headers);
});

// Route::any('print_player', [
//     'as' => 'print_player',
//     function() {
//         return View::make('print_player');
//     }
// ]);


// Route::controller('/', 'HomeController');//has to be the last one 


// Route::get('/', function(){
	
// 	$authors = Author::all();
 
// 	foreach($authors as $author)
// 	{
// 	  $var = $author->posts()->get();
// 	   // dd($author->find(2)->name);
	 	
// 	  foreach ($var as $a)
// 	  {
// 	  	echo 'Title: '. $a->title .'<br>';
// 		echo 'Body: ' . $a->body. '<br>';
// 	  	echo '<hr>';
// 	  }
// 	}
	
// 	// $post = Post::find(4)->author;//get info about the post with specific id
// 	// echo $post->name.'<br>';
// 	// echo $post->email.'<br>';
	
// });

// Route::get('/', function(){
// 	// $seasons = Season::where('seasons.season', '=', 'Summer');
// 	// echo 'Year: '. $seasons->find(1)->grad_year . '<br>';
// 	// echo 'Season: '. $seasons->find(1)->season . '<br><br>';
// //SELECT season, email FROM `players`, `seasons` WHERE `season_id` = `seasons`.`id` AND `season`='Summer'
// 	// $player = DB::table('seasons')
// 	// 	->leftJoin('players', 'seasons.id', '=', 'players.season_id')
// 	// 	->select('seasons.season', 'players.email')
// 	// 	->get();
	
// 	// $seasons=  Player::leftJoin('seasons', 'players.season_id', '=','seasons.id')
// 	// 	// ->where('seasons.season', '=', 'Summer')
// 	// 	->where('seasons.grad_year', '=', '2018')
// 	// 	->get(array('seasons.season','players.email', 'players.first_name'));
// 	// foreach($seasons as $s)
// 	// {
// 	// 	echo 'Season: ' . $s->season . ' ';
// 	// 	echo $s->first_name . ' : ';
// 	// 	echo $s->email . '<br>';
		
//  // 	}

// 	$seasons = Season::all();
// 	// where('seasons.season', '=', 'Fall')
// 	// 	->where('seasons.grad_year', '2018')
// 		// ->get();
// 	foreach($seasons as $season)
// 	{
// 		$player = $season->players()->get();
// 		echo $season->grad_year . ': ';
// 		echo $season->season . '<br>';
		
// 		foreach($player as $p)
// 		{
// 			echo $p->first_name. ' | '.$p->email. ' | Season_id: ' . $p->season_id . '<br>';
// 		}
// 		echo '<hr>';
// 	}

// });




// Route::get('movies', array('as'=>'movies', 'uses'=>'Movies@index'));
// Route::get('movies/(:any)', array('as'=>'movie', 'uses'=>'movies@show'));
// Route::get('movies/new', array('as'=>'new_movie', 'uses'=>'movies@new'));

// Route::get('/', function()
// {
// 	// return View::make('hello');
// 	// return View::make('hello', array('name' => 'Yuriy'));
	
// 	// $data = array(
// 	// 	'greeting' => 'Welcome, ', 
// 	// 	'thing'	   => 'Yuriy', 
// 	// 	'title'    => 'home' 	
// 	// 	);
// 	// return View::make('home.index', $data);

// 	// $users = DB::table('users')->get();
// 	$users = User::all();

// 	return View::make('home.index')
// 		->with('users', $users);
	
// });
// Route::get('posts', function(){
// 	$input = Input::all();



	
// 	// $results = DB::select('select * from posts ');
// 	// return $results[2]->title;
// 	// $first_name = "Yuriy";
// 	// $user = DB::table('user')->where('first_name', $first_name)->orWhere('user_id', '>', '2')->get();
// 	// $user = DB::table('user')->whereBetween('user_id', array('3', '4'))->get();
// 	// $user = DB::table('user')->orderBy('first_name', 'asc')->get();
// 	// $user = DB::table('user')->select('first_name', 'last_name')->orderBy('birth_date', 'des')->get();
// 	 // var_dump($user);

// 	//retrieve last names
// 	// foreach ($user as $user_last) {
// 	// 	var_dump($user_last->last_name);
// 	// }

	
	 
// });

// Route::post('/', function(){
// 	$input = Input::all();	
// 	// DB::insert('insert into posts ( title, body) values(?,?)', array ($input['title'], $input['body']));
// 	// DB::table('posts')->insert(array(
// 	// 		'title' => $input['title'],
// 	// 		'body'	=> $input['body']
// 	// 	));
	
	

// 	$v = Validator::make($input, User::$rules, User::$messages);
// 	if($v->passes()){
// 		// DB::table('users')->insert(array(
// 		// 	'first_name' => $input['first_name'],
// 		// 	'last_name'	 => $input['last_name'],
// 		// 	'birth_date' => $input['birth_date'],
// 		// 	'height'	 => $input['height']
// 		// ));

// 		$user = new User;
// 		$user->first_name = $input['first_name'];
// 		$user->last_name = $input['last_name'];
// 		$user->birth_date = $input['birth_date'];
// 		$user->height = $input['height'];
// 		$user->username = $input['username'];
// 		$user->email = $input['email'];
// 		$user->password = Hash::make( $input['password']);
// 		// $user->password_confirmation = $input['password_confirmation'];
// 		$user->save();
// 		return Redirect::to('/');
// 	}else{
// 		return Redirect::to('create')
// 			->withInput()
// 			->withErrors($v);
// 	}
	
// });

Route::get('posts', function(){
	// $user_id = 1;
	// $post = Post::find($user_id);
	// $birth_date = User::find($user_id)->birth_date; //as in SLQ: SELECT birth_date FROM users WHERE id='user_id'
	// echo  $birth_date;

	// get info about all users
	// $users = User::all();
	// return View::make('home.posts')->with('users', $users);

	// $pomments = Post::find(1)->comment;

	// echo '<h2>' .$post->title. '</h2>';
	// echo '<p>'	.$post->body.  '</p>';
	// foreach ($pomments as $p) {

	// 	echo '<li>' .$p->comment. '</li>';
	// }

});

// Route::get('users', function(){
// 	$users = User::all();
// 	return View::make('home.users')->with('users', $users);


// });
Route::get('create', function(){
	return View::make('home.create');

});

// Route::get('about', function()
// {
// 	$title = "About";
// 	return View::make('home.about')
// 		->with('title', $title);
// });

Route::get('foreach', function(){
	// $title = "Foreach";
	return View::make('home.foreach', array(
		'items' => array('item1', 'item2', 'item3', 'item4')));
			
		});
// 

Route::get('/test', function()
{
	return View::make('home/test');
});


// Route::get('/user', function()
// {
//   $user = new User;
//   $user->username = 'yuriy';
//   $user->email = 'yuriy@moscreative.com';
//   $user->password = 'diancheg';
//   // $user->password_confirmation = 'diancheg';
//   var_dump($user->save());
// });

// Route::get("login", [
//  "as"   => "user/login",
//  "uses" => "UserController@login"
// ]);


 // Route::resource('post', 'PostsController');



Event::listen('laravel.query', function ($sql){
	var_dump($sql);
});