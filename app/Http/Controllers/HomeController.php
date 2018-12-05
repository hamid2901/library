<?php

namespace App\Http\Controllers;
use \Morilog\Jalali\Jalalian;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Article;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publishers = Publisher::all();
        $categories = Category::all();
        $news = News::with('user')->where('confirm',1)->orderBy('id', 'desc')->take(5)->get();;
        $articles = Article::with(['categories', 'authors'])->orderBy('id', 'desc')->take(5)->get();;
        $books = Book::with(['categories','bookFormat', 'publisher', 'authors', 'bookComments'])->where('availability_id', 1)->orderBy('id', 'desc')->take(5)->get();;

        return view('home.home')->with(['news'=>$news , 'articles'=> $articles, 'books'=> $books, 'publishers'=> $publishers, 'categories'=>$categories]);
    }
}
