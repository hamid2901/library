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

Route::group([ 'namespace' => 'Admin' ,'middleware'=>'admin', 'prefix' => 'admin'], function() {
    Route::get('/',                                'AdminController@index')->name('admin.dashboard');
    Route::get('/users',                           'UsersController@index')->name('admin.users');
    // Route::get('/users/tableusers',                'UsersController@tableusers')->name('admin.tableusers');
    Route::get('/users/create',                    'UsersController@create')->name('admin.users.create');
    Route::post('/users',                          'UsersController@store')->name('admin.users.store');
    Route::get('/users/{user}/edit',               'UsersController@edit')->name('admin.users.edit');
    Route::post('/users/{user}',                   'UsersController@update')->name('admin.users.update');
    Route::get('/users/{user}/delete',             'UsersController@delete')->name('admin.users.delete');
    Route::post('/users/{user}/status',            'UsersController@changeStatus')->name('admin.users.status');

    Route::get( '/books',                           'BookController@index')->name('admin.books');
    Route::get( '/books/create',                    'BookController@create')->name('admin.books.create');
    Route::post('/books',                           'BookController@store')->name('admin.books.store');
    Route::get( '/books/{book}/edit',               'BookController@edit')->name('admin.books.edit');
    Route::post('/books/{book}',                    'BookController@update')->name('admin.books.update');
    Route::get( '/books/{book}/delete',             'BookController@destroy')->name('admin.books.delete');

    Route::get( '/articles',                               'ArticleController@index');
    Route::get( '/articles/create',                        'ArticleController@create');
    Route::post('/articles',                               'ArticleController@store');
    Route::get( '/articles/{article}/edit',                'ArticleController@edit')->name('admin/articles/edit');
    Route::post('/articles/{article}',                     'ArticleController@update')->name('admin/articles/update');
    Route::get( '/articles/{article}/delete',              'ArticleController@destroy')->name('admin/articles/delete');
    Route::get( '/articles/{article}/confirm',             'ArticleController@confirmArticle');
   
    Route::get('/factors',                                  'FactorController@index');
    // Route::get('/admin/factors/create',                         'Admin\FactorController@create');
    // Route::post('/admin/factors',                               'Admin\FactorController@store');
    Route::post('/factors/{factor}',                         'FactorController@update')->name('admin/factors/update');
    Route::post('/factors/{factor}/receipt',                 'FactorController@factorReceipt');
    Route::get(' /factors/{factor}/detail',                  'FactorController@factorDetail');
    Route::get(' /factors/{factor}/delete',                  'FactorController@destroy')->name('admin/factors/delete');

    Route::get(   '/messages',                               'MessageController@index');
    Route::get(   '/messages/create',                        'MessageController@create');
    Route::post(  '/messages',                               'MessageController@store');
    Route::get(   '/messages/{message}/edit',                'MessageController@edit')->name('admin/messages/edit');
    Route::post(  '/messages/{message}',                     'MessageController@update')->name('admin/messages/update');
    Route::delete('/messages/{message}',                     'MessageController@destroy')->name('admin/messages/destroy');

    Route::get(   '/news',                                   'NewsController@index');
    Route::get(   '/news/create',                            'NewsController@create');
    Route::post(  '/news',                                   'NewsController@store');
    Route::get(   '/news/{news}/edit',                       'NewsController@edit')->name('admin/news/edit');
    Route::post(  '/news/{news}',                            'NewsController@update')->name('admin/news/update');
    Route::delete('/news/{news}',                            'NewsController@destroy')->name('admin/news/destroy');
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('/login',    'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login',   'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('logout/',   'Auth\AdminLoginController@logout')->name('admin.logout');
   });

   
Route::middleware(['user'])->group(function () {
    Route::get('/profile',                                'Admin\ProfileController@editProfile');
    Route::post('/profile/{id}',                               'Admin\ProfileController@updateProfile');
    Route::post('/books/{book}/comment/{user}',                 'Admin\BookController@storeComment');
    Route::post('/books/deleteComment',                 'Admin\BookController@deleteComment');
    Route::post('/news/{news}/comment/{user}',                 'Admin\NewsController@storeComment');
    Route::post('/news/deleteComment',                 'Admin\NewsController@deleteComment');
    Route::get('/articles/{article}/downloading','Admin\ArticleController@getDownload');

    Route::get( '/factor/cart',                                'Admin\FactorController@yourCart');
    Route::post('/factor/{book}/addToCart',                    'Admin\FactorController@addToCart');
    Route::post('/factor/{book}/removeFromCart',               'Admin\FactorController@removeFromCart');
    Route::post('/factor/reserved',                            'Admin\FactorController@reservedBooks');
    Route::post('/factor/borrowed',                            'Admin\FactorController@borrowedBooks');
    Route::post('/factor/yourFactor',                          'Admin\FactorController@factorIndex');
    Route::post('/factor/submitCart',                          'Admin\FactorController@submitFactor');
    Route::post('/factor/reserved',                            'Admin\FactorController@reservedBooks');
    Route::post('/factor/borrowed',                            'Admin\FactorController@borrowedBooks');
    Route::post('/factor/deleteReserve',                       'Admin\FactorController@deleteReserve');
});

//Homepage route
Route::get('/',                                            'HomeController@index')->name('home');
Route::post('/',                                           'HomeController@searchEveryThings')->name('home');

//Route for News
Route::get('/news',                                        'Admin\NewsController@indexNews');
Route::get('/news/{news}',                                 'Admin\NewsController@showNews');
Route::post('/news',                                       'Admin\NewsController@searchByText');
Route::post('/news/comment',                               'Admin\NewsController@storeComment');

//Route for Books
Route::get('/books',                                       'Admin\BookController@indexBooks');
Route::get('/books/{book}',                                'Admin\BookController@showBook');
Route::get('/books/category/{categoryName}',               'Admin\BookController@searchByCategory');
Route::get('/books/publisher/{publisherName}',             'Admin\BookController@searchByPublisher');
Route::post('/books',                                      'Admin\BookController@searchByText');
Route::post('/books/comment',                              'Admin\BookController@storeComment');


//Route for Articles
Route::get('/articles',                                    'Admin\ArticleController@indexArticles');
Route::get('/articles/{article}',                          'Admin\ArticleController@showArticle');
Route::get('/articles/category/{categoryName}',            'Admin\ArticleController@searchByCategory');
Route::post('/articles',                                   'Admin\ArticleController@searchByText');

//Route for Contact Us
Route::post('/contact',                                    'ContactUsController@store');

Route::get('/home', 'HomeController@index')->name('home');

//Routes for factor





  


// /* Auto-generated admin routes */
// Route::group(['middleware'=>'admin', 'prefix' => 'admin'], function() {
//     Route::get('/admin/book-comments',                          'Admin\BookCommentController@index');
//     Route::get('/admin/book-comments/create',                   'Admin\BookCommentController@create');
//     Route::post('/admin/book-comments',                         'Admin\BookCommentController@store');
//     Route::get('/admin/book-comments/{bookComment}/edit',       'Admin\BookCommentController@edit')->name('admin/book-comments/edit');
//     Route::post('/admin/book-comments/{bookComment}',           'Admin\BookCommentController@update')->name('admin/book-comments/update');
//     Route::delete('/admin/book-comments/{bookComment}',         'Admin\BookCommentController@destroy')->name('admin/book-comments/destroy');
// });

// /* Auto-generated admin routes */
// Route::group(['middleware'=>'admin', 'prefix' => 'admin'], function() {
//     Route::get('/admin/news-comments',                          'Admin\NewsCommentController@index');
//     Route::get('/admin/news-comments/create',                   'Admin\NewsCommentController@create');
//     Route::post('/admin/news-comments',                         'Admin\NewsCommentController@store');
//     Route::get('/admin/news-comments/{newsComment}/edit',       'Admin\NewsCommentController@edit')->name('admin/news-comments/edit');
//     Route::post('/admin/news-comments/{newsComment}',           'Admin\NewsCommentController@update')->name('admin/news-comments/update');
//     Route::delete('/admin/news-comments/{newsComment}',         'Admin\NewsCommentController@destroy')->name('admin/news-comments/destroy');
// });

// /* Auto-generated admin routes */
// Route::group(['middleware'=>'admin', 'prefix' => 'admin'], function() {
//     Route::get('/admin/publishers',                             'Admin\PublisherController@index');
//     Route::get('/admin/publishers/create',                      'Admin\PublisherController@create');
//     Route::post('/admin/publishers',                            'Admin\PublisherController@store');
//     Route::get('/admin/publishers/{publisher}/edit',            'Admin\PublisherController@edit')->name('admin/publishers/edit');
//     Route::post('/admin/publishers/{publisher}',                'Admin\PublisherController@update')->name('admin/publishers/update');
//     Route::delete('/admin/publishers/{publisher}',              'Admin\PublisherController@destroy')->name('admin/publishers/destroy');
// });