<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use LaravelShippo;
use App\User;


class UPCinfromtionController extends Controller
{
	private $len;
	private $width;
	private $height;
	private $full_weight;


    public function search()
    {
    	return view('UPC.search');
    }
    // =========================================//
    public function getdimension(Request $request)
    {
		$upc = $request->input('UPC');
    	$client = new Client();
		$res = $client->request('GET', 'https://api.upcitemdb.com/prod/trial/lookup?upc='.$upc);
		$go = $res->getBody();
		$item = (json_decode($go)->items[0]);
		  
		 $dimension = $item->dimension;
		 if(!empty($dimension)){
			$dim 			= explode('X ',$dimension);
			$len 			= floatval($dim[0]);
			$width			= floatval($dim[1]);
			$height 		= floatval($dim[2]);
			$full_weight 	= floatval($item->weight);
			}
			else
				{
					$noD_W = 'Small Package .';
					$len 			= 5;
					$width			= 5;
					$height 		= 5;
					$full_weight 	= 5;
				}


			 $weight 	= $item->weight;
			 $title 	= $item->title;
			 $brand 	= $item->brand;
			 $images 	= $item->images[0];

//============================================================================//
		$to_address = array(
			    'state' => 'CA',
			    'zip' => '94117',
			    'country' => 'US',
			);
		$from_address = array(
			    'zip' => '100000',
			    'country' => 'CHN',
			);
			$parcel = array(
			    'length'=> $len,
			    'width'=> $width,
			    'height'=> $height,
			    'distance_unit'=> 'in',
			    'weight'=> $full_weight,
			    'mass_unit'=> 'lb',
			  );			
			$shipment = \Shippo_Shipment::create(
			array(
			    'address_from'=> $from_address,
			    'address_to'=> $to_address,
			    'parcels'=> array($parcel),
			    'async'=> false
			));

		$rates = $shipment['rates'];

		return view('UPC.result', compact('dimension', 'len', 'width','height' , 'weight', 'brand', 'title', 'noD_W', 'full_weight','images','rates'));
    }

}
