<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Auth;
use Image;
use App\Favorite;
use App\Post;
use App\User;


class UserController extends Controller
{
    //
    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user')); 
    }
    
    public function updata_avater(Request $request){
        //updata_avater
        if($request->has('updata_avater')){
        	   if ($request->hasfile('avater')) {
        		$avater = $request->file('avater');
        		$filename = Auth::user()->id. Auth::user()->name . '.' . $avater->getClientOriginalExtension();
        		Image::make($avater)->resize(300,300)->save( public_path('/uploed/avater/'.$filename));
        		$user= Auth::user();
        		$user->avater = $filename;
        		$user->save();	
                        return Redirect::to('posts');
        	}
            else{
                    return back();

            }
        }
        }
    public function Updata_password(Request $request){
            //Updata_password
            if($request->has('Updata_password')){
                $user = Auth::user();
                $old_password = $request->input('old_password');
                $password = $request->input('password');
                $password_confirmation = $request->input('password_confirmation');

                $ruels = $this->validate($request,[
                        'old_password'=>'required|min:6',
                            'password'=>'required|min:6|confirmed',
                        'password_confirmation'=>'required|min:6'
                        ]);

                if (\Hash::check($old_password, Auth::user()->password))  {
                        $user->update([
                            'password' =>bcrypt($request->input('password'))
                        ]);
                        return Redirect::to('posts');

                }
                else{
                    return back();
                    }               
            }
        }

    public function myFavorites()
    {
        $myFavorites = Auth::user()->favorites;
        
        return view('my_favorites', compact('myFavorites'));
    }   
}
    
