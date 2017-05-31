<?php







Route::get('/011', 'Whcontroller@aw');


Route::get('/121', 'Whcontroller@we');



























Route::get('/', function () {
    return view('welcome');
});
// ============== start of UPCinfromtion ======================//
Route::get('/search', 'UPCinfromtionController@search');
Route::get('/getdimension', 'UPCinfromtionController@getdimension');
// ============== end of UPCinfromtion ======================//

// ============== start of Currency ======================//
Route::get('/ex', 'CurrencyController@view');
Route::get('/convert', 'CurrencyController@test');
// ============== end of Currency ======================//

// ============== start of Shipping ======================//

// Route::get('/getdimension',['uses' =>'ShippingController@ship']);



// ============== end of Shipping ======================//

Auth::routes();
Route::get('/home', 'HomeController@index');

Route::get('auth/{provider}', 'AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'AuthController@handleProviderCallback');


Route::group(['middleware' => ['web','auth']], function ()
{
	// post
	Route::resource('posts','PostController');
	// comment
	Route::resource('comment','CommentController');

	// profile
	Route::get('profile','UserController@profile');
	Route::post('change','UserController@updata_avater');
	Route::post('changepassword','UserController@Updata_password');
	// tag
	Route::get('tag/{tag_slug}', 'TagsController@index');

	// like 	
	Route::post('favorite/{post}', 'PostController@favoritePost');
	Route::post('unfavorite/{post}', 'PostController@unFavoritePost');
	Route::get('my_favorites', 'UserController@myFavorites');
	
});



Route::get('test', 'test@index');
Route::delete('users/{user}/notifications','test@markasread');


	// return $users = App\User::all();
	// return $users = App\User::find(2);

	// return $posts = App\Post::all();

	// return $posts = App\Post::where('user_id',2)->get();

	// $user = App\User::find(2); // Auth::user();
	// return $user->load('posts.comments');
	
	// $pass = '123456';
	// if (\Hash::check($pass, Auth::user()->password)) {
	// 	return 'true';
	// } 
	// else {
	// 	return 'false';
	// }

	// $num = App\Post::find(1)->user_id;

	// return App\User::find($num)->name;
	
	


// php artisan serve --host 192.168.10.2 --port 1334

	// Route::get('/posts', 'PostController@index');
	// Route::get('/posts/create', 'PostController@create');

	// Route::get('/posts/{post}', 'PostController@show');
	// Route::post('/posts','PostController@store');
