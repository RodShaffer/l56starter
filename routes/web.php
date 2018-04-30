<?php

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Auth::routes();

/*
|--------------------------------------------------------------------------
| Verification Routes
|--------------------------------------------------------------------------
*/
Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify')->name('reg.email.verify');
Route::get('/verifyemail/resend/{id}', 'Auth\RegisterController@resend')->name('reg.email.resend');

/*
|--------------------------------------------------------------------------
| Static Page Routes
|--------------------------------------------------------------------------
*/
Route::get('/', 'Page\PageController@index')->name('page.index');
Route::get('about', 'Page\PageController@about')->name('page.about');
Route::get('help', 'Page\PageController@help')->name('page.help');

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::get('user/{user}', 'Member\UserController@show')->name('user.show');
Route::get('user/edit/{user}', 'Member\UserController@edit')->name('user.edit');
Route::put('user/edit/{user}', 'Member\UserController@update')->name('user.update');

/*************************************************************************/

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {

    // Admin Dashboard
    Route::get('/', 'Admin\Dashboard\DashboardController@index')->name('dashboard');

    // ACL Routes
    Route::get('permission/search/{role}', 'Admin\Acl\Permission\PermissionController@searchByRole')->name('permission.search.role');
    Route::post('permission/destroy/mass', 'Admin\Acl\Permission\PermissionController@massDestroy')->name('permission.destroy.mass');
    Route::resource('permission', 'Admin\Acl\Permission\PermissionController');

    Route::get('role/search/{permission}', 'Admin\Acl\Role\RoleController@searchByPermission')->name('role.search.permission');
    Route::post('role/destroy/mass', 'Admin\Acl\Role\RoleController@massDestroy')->name('role.destroy.mass');
    Route::resource('role', 'Admin\Acl\Role\RoleController');

    Route::get('user/search/p/{permission}', 'Admin\Acl\User\UserController@searchByPermission')->name('user.search.permission');
    Route::get('user/search/r/{role}', 'Admin\Acl\User\UserController@searchByRole')->name('user.search.role');
    Route::post('user/destroy/mass', 'Admin\Acl\User\UserController@massDestroy')->name('user.destroy.mass');
    Route::resource('user', 'Admin\Acl\User\UserController');

});
