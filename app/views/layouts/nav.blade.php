
 <!-- Navbar -->
       
        <div class="navbar navbar-default navbar-fixed-top navbar-transparent-black mm-fixed-top" role="navigation" id="navbar">
            <ul class="nav" class="navbar-header col-md-2">
            	
                @if ( Auth::guest() )
                    <li style="float:left">{{HTML::link('http://lacrossecamp.com/', 'Lacrosse Camp Home ')}}</li>
                    <li style="float:right">{{ HTML::link('login', 'Login') }}</li>
                    <li style="float:right" class='user'>Hello <b> Guest</b> </li>
                @elseif((Auth::user()->role_id)==1)
                    <li style="float:left">{{HTML::link('http://lacrossecamp.com/', 'Lacrosse Camp Home ')}}</li>
                    <li style="float:left">{{ HTML::link('players', 'Manage Players')}} </li>
                    <li style="float:left">{{ HTML::link('players/create', 'Add new Player')}} </li>
                    <li style="float:left">{{ HTML::link('seasons/create', 'Add new season')}} </li>
                    <li style="float:right">{{ HTML::link('logout', 'Logout') }}</li>
                    <li style="float:right" class='user'>Hello <b>{{ Auth::user()->first_name}}</b> </li>
                @elseif((Auth::user()->role_id)==3)
                    <li style="float:left">{{HTML::link('http://lacrossecamp.com/', 'Lacrosse Camp Home ')}}</li>
                    <li style="float:right">{{ HTML::link('logout', 'Logout') }}</li>
                    <li style="float:right" class='user'>Hello <b>{{ Auth::user()->first_name}}</b> </li>
                @endif
            </ul>

            
        </div>
        