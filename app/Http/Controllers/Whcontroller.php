<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Whcontroller extends Controller
{
	private $wehda;

	public function aw()
	{
		# code...
		$welcome = "sdfghjk".<br>;
   	$wehda='hi ahmed';

		return view('wh', compact('welcome','wehda'));
	}
   
   public function we()
   {
   	# code...
   	$wehda='hi ahmed';
   	return view('wh', compact('wehda'));
   }
}
