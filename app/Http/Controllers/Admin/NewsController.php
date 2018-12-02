<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;

use App\Models\News;
use App\User;
use App\Models\NewsComment;

class NewsController extends Controller
{

    public function indexNews()
    {
        $news = News::with('user')->where('confirm',1)->paginate(5);
        return view('news.index')->with('news', $news);
    }

    public function showNews($id = null)
    {
        $news = News::with('user')->where('id', $id)->get();
        $comments = NewsComment::with('user', 'news')->where('news_id', $id)->get();
        return view('news.show')->with(['news'=>$news, 'comments'=>$comments]);
    }


    public function storeComment(Request $request, $news, $user)
    {
        $comment = new NewsComment();
        $comment->content = $request->input('body');
        $comment->user_id = $user;
        $comment->news_id = $news;
        $comment->save();
        return redirect()->back();
    }

}
