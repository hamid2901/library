<?php

namespace App\Http\Controllers;
use \Morilog\Jalali\Jalalian;
use Illuminate\Http\Request;
use App\Models\News;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::with('user')->get();
        // foreach($news as $new){
        //     $new->created_at = Jalalian::forge('now')->format('%B %d، %Y'); // دی 02، 1391
        // }
        return view('news.index')->with('news', $news);
    }
}
