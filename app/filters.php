<?php

/*
  |--------------------------------------------------------------------------
  | Application & Route Filters
  |--------------------------------------------------------------------------
  |
  | Below you will find the "before" and "after" events for the application
  | which may be used to do any work before or after a request into your
  | application. Here you may also register your custom route filters.
  |
 */

App::before(function($request) {
  //
});


App::after(function($request, $response) {
  //
});

/*
  |--------------------------------------------------------------------------
  | Authentication Filters
  |--------------------------------------------------------------------------
  |
  | The following filters are used to verify that the user of the current
  | session is logged into this application. The "basic" filter easily
  | integrates HTTP Basic authentication for quick, simple checking.
  |
 */

Route::filter('auth', function() {
  if (Auth::guest()) {
    return Redirect::guest('login');
  } else {
    $admin_list = array('players');
//          dd(Route::current());
//     if (Route::current()->uri() == 'players/{players}/edit' and  Auth::user()->role_id != 1) {
//       $parameters = Route::current()->parameters();
// //      dd($parameters['players']!=Auth::user()->player->id);
//       if($parameters['players']!=Auth::user()->player->id){
//         return Redirect::to('players/' . Auth::user()->player->id . '/edit');
//       }
//     }
    if (in_array(Route::current()->uri(), $admin_list) and Auth::user()->role_id != 1) {
      $user = User::find(Auth::user()->id);
      $player_id = $user->player->id;
      return Redirect::to('players/' . $player_id . '/edit');
    }
  }
});


Route::filter('auth.basic', function() {
  return Auth::basic();
});

/*
  |--------------------------------------------------------------------------
  | Guest Filter
  |--------------------------------------------------------------------------
  |
  | The "guest" filter is the counterpart of the authentication filters as
  | it simply checks that the current user is not logged in. A redirect
  | response will be issued if they are, which you may freely change.
  |
 */

Route::filter('guest', function() {
  if (Auth::check())
    return Redirect::to('/');
});

/*
  |--------------------------------------------------------------------------
  | CSRF Protection Filter
  |--------------------------------------------------------------------------
  |
  | The CSRF filter is responsible for protecting your application against
  | cross-site request forgery attacks. If this special token in a user
  | session does not match the one given in this request, we'll bail.
  |
 */

Route::filter('csrf', function() {
  if (Session::token() != Input::get('_token')) {
    throw new Illuminate\Session\TokenMismatchException;
  }
});
