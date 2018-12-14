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

/* Auto-generated admin routes */
Route::middleware([])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });
    Route::get('/admin/users',                                  'Admin\UsersController@index');
    Route::get('/admin/users/create',                           'Admin\UsersController@create');
    Route::post('/admin/users',                                 'Admin\UsersController@store');
    Route::get('/admin/users/{user}/edit',                      'Admin\UsersController@edit')->name('admin/users/edit');
    Route::post('/admin/users/{user}',                          'Admin\UsersController@update')->name('admin/users/update');
    Route::get('/admin/users/{user}/delete',                    'Admin\UsersController@delete')->name('admin/users/delete');
    Route::post('/admin/users/{user}/status',                   'Admin\UsersController@changeStatus');

});


/* Auto-generated admin routes */
Route::middleware([])->group(function () {
    Route::get('/admin/books',                                  'Admin\BookController@index');
    Route::get('/admin/books/create',                           'Admin\BookController@create');
    Route::post('/admin/books',                                 'Admin\BookController@store');
    Route::get('/admin/books/{book}/edit',                      'Admin\BookController@edit')->name('admin/books/edit');
    Route::post('/admin/books/{book}',                          'Admin\BookController@update')->name('admin/books/update');
    Route::get('/admin/books/{book}/delete',                    'Admin\BookController@destroy');

});
/* Auto-generated admin routes */
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/articles',                               'Admin\ArticleController@index');
    Route::get('/admin/articles/create',                        'Admin\ArticleController@create');
    Route::post('/admin/articles',                              'Admin\ArticleController@store');
    Route::get('/admin/articles/{article}/edit',                'Admin\ArticleController@edit')->name('admin/articles/edit');
    Route::post('/admin/articles/{article}',                    'Admin\ArticleController@update')->name('admin/articles/update');
    Route::delete('/admin/articles/{article}',                  'Admin\ArticleController@destroy')->name('admin/articles/destroy');
});



/* Auto-generated admin routes */
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/factors',                                'Admin\FactorController@index');
    Route::get('/admin/factors/create',                         'Admin\FactorController@create');
    Route::post('/admin/factors',                               'Admin\FactorController@store');
    Route::get('/admin/factors/{factor}/edit',                  'Admin\FactorController@edit')->name('admin/factors/edit');
    Route::post('/admin/factors/{factor}',                      'Admin\FactorController@update')->name('admin/factors/update');
    Route::delete('/admin/factors/{factor}',                    'Admin\FactorController@destroy')->name('admin/factors/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/messages',                               'Admin\MessageController@index');
    Route::get('/admin/messages/create',                        'Admin\MessageController@create');
    Route::post('/admin/messages',                              'Admin\MessageController@store');
    Route::get('/admin/messages/{message}/edit',                'Admin\MessageController@edit')->name('admin/messages/edit');
    Route::post('/admin/messages/{message}',                    'Admin\MessageController@update')->name('admin/messages/update');
    Route::delete('/admin/messages/{message}',                  'Admin\MessageController@destroy')->name('admin/messages/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/news',                                   'Admin\NewsController@index');
    Route::get('/admin/news/create',                            'Admin\NewsController@create');
    Route::post('/admin/news',                                  'Admin\NewsController@store');
    Route::get('/admin/news/{news}/edit',                       'Admin\NewsController@edit')->name('admin/news/edit');
    Route::post('/admin/news/{news}',                           'Admin\NewsController@update')->name('admin/news/update');
    Route::delete('/admin/news/{news}',                         'Admin\NewsController@destroy')->name('admin/news/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/book-comments',                          'Admin\BookCommentController@index');
    Route::get('/admin/book-comments/create',                   'Admin\BookCommentController@create');
    Route::post('/admin/book-comments',                         'Admin\BookCommentController@store');
    Route::get('/admin/book-comments/{bookComment}/edit',       'Admin\BookCommentController@edit')->name('admin/book-comments/edit');
    Route::post('/admin/book-comments/{bookComment}',           'Admin\BookCommentController@update')->name('admin/book-comments/update');
    Route::delete('/admin/book-comments/{bookComment}',         'Admin\BookCommentController@destroy')->name('admin/book-comments/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/news-comments',                          'Admin\NewsCommentController@index');
    Route::get('/admin/news-comments/create',                   'Admin\NewsCommentController@create');
    Route::post('/admin/news-comments',                         'Admin\NewsCommentController@store');
    Route::get('/admin/news-comments/{newsComment}/edit',       'Admin\NewsCommentController@edit')->name('admin/news-comments/edit');
    Route::post('/admin/news-comments/{newsComment}',           'Admin\NewsCommentController@update')->name('admin/news-comments/update');
    Route::delete('/admin/news-comments/{newsComment}',         'Admin\NewsCommentController@destroy')->name('admin/news-comments/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/publishers',                             'Admin\PublisherController@index');
    Route::get('/admin/publishers/create',                      'Admin\PublisherController@create');
    Route::post('/admin/publishers',                            'Admin\PublisherController@store');
    Route::get('/admin/publishers/{publisher}/edit',            'Admin\PublisherController@edit')->name('admin/publishers/edit');
    Route::post('/admin/publishers/{publisher}',                'Admin\PublisherController@update')->name('admin/publishers/update');
    Route::delete('/admin/publishers/{publisher}',              'Admin\PublisherController@destroy')->name('admin/publishers/destroy');
});

/* Auto-generated profile routes */
Route::middleware(['auth'])->group(function () {
    Route::get('/profile',                                'Admin\ProfileController@editProfile');
    Route::post('/profile/{id}',                               'Admin\ProfileController@updateProfile');
});



//Routes for Visitors---------------------------->

//Homepage route
Route::get('/',                                            'HomeController@index')->name('home');
Route::post('/',                                           'HomeController@searchEveryThings')->name('home');

//Route for News
Route::get('/news',                                        'Admin\NewsController@indexNews');
Route::get('/news/{news}',                                 'Admin\NewsController@showNews');
Route::post('/news',                                       'Admin\NewsController@searchByText');
Route::post('/news/comment',                               'Admin\NewsController@storeComment');
Route::post('/news/{news}/comment/{user}',                 'Admin\NewsController@storeComment');
Route::post('/news/deleteComment',                 'Admin\NewsController@deleteComment');

//Route for Books
Route::get('/books',                                       'Admin\BookController@indexBooks');
Route::get('/books/{book}',                                'Admin\BookController@showBook');
Route::get('/books/category/{categoryName}',               'Admin\BookController@searchByCategory');
Route::get('/books/publisher/{publisherName}',             'Admin\BookController@searchByPublisher');
Route::post('/books',                                      'Admin\BookController@searchByText');
Route::post('/books/comment',                              'Admin\BookController@storeComment');
Route::post('/books/{book}/comment/{user}',                 'Admin\BookController@storeComment');
Route::post('/books/deleteComment',                 'Admin\BookController@deleteComment');

//Route for Articles
Route::get('/articles',                                    'Admin\ArticleController@indexArticles');
Route::get('/articles/{article}',                          'Admin\ArticleController@showArticle');
Route::get('/articles/category/{categoryName}',            'Admin\ArticleController@searchByCategory');
Route::post('/articles',                                   'Admin\ArticleController@searchByText');
Route::get('/articles/{article}/downloading','Admin\ArticleController@getDownload');

//Route for Contact Us
Route::post('/contact',                                    'ContactUsController@store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Routes for factor
Route::middleware(['auth'])->group(function () {

    Route::get('/factor/cart',                                'Admin\FactorController@yourCart');
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
