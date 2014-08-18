<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Hello</h2>

		<p>
                    <strong>Hello</strong> {{$player->first_name}} {{$player->last_name}}
		</p>
                Please follow the link <a href="{{URL::to('link/'.$token)}}">{{URL::to('link/'.$token)}}</a> to finish your registration
	</body>
</html>