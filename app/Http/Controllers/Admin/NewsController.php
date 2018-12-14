<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Carbon\Carbon;

use App\Models\News;
use App\User;
use App\Models\NewsComment;

class NewsController extends Controller
{
    protected function setUser($request) {
        if (empty($request->user())) {
            abort(404, 'User not found');
        }

        $this->user = $request->user();
    }

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
        $comment->created_at = Carbon::now();
        $comment->save();
        return redirect()->back();
    }

    public function deleteComment(Request $request)
    {
        $this->setUser($request);

        $user = $this->user;

        $comment = NewsComment::find($request->comment);

        // dd($comment);
        $comment->delete();

        return redirect()->back();
    }

}
