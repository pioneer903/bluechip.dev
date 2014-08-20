{{ 
	Fpdf::AddPage();
	Fpdf::SetFont('Arial','B',16);
	Fpdf::Cell(40,10,'Hello World!  '. $player->last_name. ' '. $player->first_name);
	Fpdf::Cell(0,30,  URL::to('/link').'/'.$token->token);
	Fpdf::Output($player->first_name. ' '. $player->last_name.'.pdf', 'D');
	exit;
}}
//works, but have to construct everything yourself
