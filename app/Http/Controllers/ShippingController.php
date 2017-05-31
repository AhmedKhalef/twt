<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use LaravelShippo;
use UPCinfromtionController;
use App\User;

class ShippingController extends Controller
{
    public function Ship()
    {
    	// return \Shippo_CarrierAccount::all(array('carrier'=> 'uber'));
    	// $user = auth()->user();
			$to_address = array(
			    'zip' => '01809',
			    'country' => 'DE',
			);
		$from_address = array(
			    'state' => 'CA',
			    'zip' => '94117',
			    'country' => 'US',
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
		 return view('UPC.ship', compact('rates'));


    }
}