<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
Auth::routes();

// Super Admin only routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'permission:perms.super.admin', 'activity']], function () {

	Route::resource('/settings', 'Admin\SettingsController', ['names' => [
		'index' => 'admin.settings.index',
		'create' => 'admin.settings.create',
		'store' => 'admin.settings.store',
		'edit' => 'admin.settings.edit',
		'update' => 'admin.settings.update',
		'destroy' => 'admin.settings.destroy',

	]]);

	Route::resource('/categories', 'Admin\CategoriesController', ['names' => [
		'index' => 'admin.categories.index',
		'create' => 'admin.categories.create',
		'store' => 'admin.categories.store',
		'edit' => 'admin.categories.edit',
		'update' => 'admin.categories.update',
		'destroy' => 'admin.categories.destroy',

	]]);
});

// Writer and above routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'permission:perms.writer', 'activity']], function () {
	Route::get('/pages/posts/{slug}', 'Admin\AdminController@post');

	Route::resource('posts', 'Admin\PostController', [
		'names' => [
			'create' => 'posts.create',
			'index' => 'admin.posts',
			'update' => 'updatepost',
			'store' => 'storepost',
			'edit' => 'editpost',
			'destroy' => 'destroypost',
		],
		'except' => [
			'show',
		],
		'parameters' => [
			'post' => 'id',
		],
	]);

	Route::resource('tags', 'Admin\TagController', [
		'names' => [
			'create' => 'createtag',
			'index' => 'showtags',
			'update' => 'updatetag',
			'store' => 'storetag',
			'edit' => 'edittag',
			'destroy' => 'destroytag',
		],
		'except' => [
			'show',
		],
		'parameters' => [
			'tag' => 'id',
		],
	]);

	Route::get('sliders/{id}/category', 'Admin\CategoriesController@addslider')->name('admin.addcategoryslider.index');
	Route::post('addcategorystore', 'Admin\CategoriesController@sliderstore')->name('admin.slidercategory.store');
	Route::post('addcategorydestroy', 'Admin\CategoriesController@sliderdestroy')->name('admin.slidercategory.destroy');
	Route::resource('sliders/{id}/post', 'Admin\SlidersController', ['names' => [
		'index' => 'admin.sliders.index',
		'store' => 'admin.sliders.store',
		'destroy' => 'admin.sliders.destroy',

	]]);

	Route::resource('/admin/sliders', 'Admin\SlidersController', ['names' => [
		'index' => 'admin.sliders.index',
		'store' => 'admin.sliders.store',
		'destroy' => 'admin.sliders.destroy',

	]]);

	Route::get('/uploads', 'Admin\AdminController@uploads')->name('admin-uploads');
});

// User and above routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'permission:perms.user', 'activity']], function () {
	Route::get('/', 'Admin\AdminController@index')->name('admin');
	Route::get('/sitemap', 'Admin\AdminController@sitemap')->name('sitemap-admin');
	Route::post('/generate-sitemap', 'Admin\AdminController@generateSitemap')->name('generate-sitemap');
});
//----------front end front end----------//

Route::get('/', 'HomePageController@index');
Route::get('/posts/{slug}', 'HomePageController@post');
Route::get('/tags/{slug}', 'HomePageController@tags');

Route::get('/categories/{slug}', 'HomePageController@categories');
// RSS Feed Route
Route::feeds();
// Contact Routes
Route::get('/contact', 'ContactController@index')->name('contact');
Route::post('/contact', 'ContactController@contactSend')->name('contactSend');
