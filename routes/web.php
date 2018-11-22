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


Route::get('/admin', function () {
    return view('admin.hello-world');
});



/* Auto-generated admin routes */
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/users',                                  'Admin\UsersController@index');
    Route::get('/admin/users/create',                           'Admin\UsersController@create');
    Route::post('/admin/users',                                 'Admin\UsersController@store');
    Route::get('/admin/users/{user}/edit',                      'Admin\UsersController@edit')->name('admin/users/edit');
    Route::post('/admin/users/{user}',                          'Admin\UsersController@update')->name('admin/users/update');
    Route::delete('/admin/users/{user}',                        'Admin\UsersController@destroy')->name('admin/users/destroy');
});
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


/* Auto-generated admin routes */
// Route::middleware(['admin'])->group(function () {
    Route::get('/admin/books',                                  'Admin\BookController@index');
    Route::get('/admin/books/create',                           'Admin\BookController@create');
    Route::post('/admin/books',                                 'Admin\BookController@store');
    Route::get('/admin/books/{book}/edit',                      'Admin\BookController@edit')->name('admin/books/edit');
    Route::post('/admin/books/{book}',                          'Admin\BookController@update')->name('admin/books/update');
    Route::delete('/admin/books/{book}',                        'Admin\BookController@destroy')->name('admin/books/destroy');
// });

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
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/authors',                                'Admin\AuthorController@index');
    Route::get('/admin/authors/create',                         'Admin\AuthorController@create');
    Route::post('/admin/authors',                               'Admin\AuthorController@store');
    Route::get('/admin/authors/{author}/edit',                  'Admin\AuthorController@edit')->name('admin/authors/edit');
    Route::post('/admin/authors/{author}',                      'Admin\AuthorController@update')->name('admin/authors/update');
    Route::delete('/admin/authors/{author}',                    'Admin\AuthorController@destroy')->name('admin/authors/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/categories',                             'Admin\CategoryController@index');
    Route::get('/admin/categories/create',                      'Admin\CategoryController@create');
    Route::post('/admin/categories',                            'Admin\CategoryController@store');
    Route::get('/admin/categories/{category}/edit',             'Admin\CategoryController@edit')->name('admin/categories/edit');
    Route::post('/admin/categories/{category}',                 'Admin\CategoryController@update')->name('admin/categories/update');
    Route::delete('/admin/categories/{category}',               'Admin\CategoryController@destroy')->name('admin/categories/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['admin'])->group(function () {
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