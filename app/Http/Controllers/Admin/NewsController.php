<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use App\Http\Requests\Admin\News\IndexNews;
use App\Http\Requests\Admin\News\StoreNews;
use App\Http\Requests\Admin\News\UpdateNews;
use App\Http\Requests\Admin\News\DestroyNews;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\News;
use App\User;
use App\Models\NewsComment;

class NewsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexNews $request
     * @return Response|array
     */
    public function index(IndexNews $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(News::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title', 'user_id', 'confirm'],

            // set columns to searchIn
            ['id', 'title', 'content', 'image_dir', 'created_at', 'updated_at']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.news.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('admin.news.create');

        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreNews $request
     * @return Response|array
     */
    public function store(StoreNews $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the News
        $news = News::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/news'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/news');
    }

    /**
     * Display the specified resource.
     *
     * @param  News $news
     * @return Response
     */
    public function show(News $news)
    {
        $this->authorize('admin.news.show', $news);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  News $news
     * @return Response
     */
    public function edit(News $news)
    {
        $this->authorize('admin.news.edit', $news);

        return view('admin.news.edit', [
            'news' => $news,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateNews $request
     * @param  News $news
     * @return Response|array
     */
    public function update(UpdateNews $request, News $news)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values News
        $news->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/news'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyNews $request
     * @param  News $news
     * @return Response|bool
     */
    public function destroy(DestroyNews $request, News $news)
    {
        $news->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    public function indexNews()
    {
        $news = News::with('user')->where('confirm',1)->paginate(5);
        return view('news.index')->with('news', $news);
    }

    public function showNews($id = null)
    {
        $news = News::with('user')->where('id', $id)->get();;
        // $comments = NewsComment::with('News')->where('confirm', 1)->get();
        return view('News.show',compact('news','comments'));
    }
}
