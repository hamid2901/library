<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use App\Http\Requests\Admin\NewsComment\IndexNewsComment;
use App\Http\Requests\Admin\NewsComment\StoreNewsComment;
use App\Http\Requests\Admin\NewsComment\UpdateNewsComment;
use App\Http\Requests\Admin\NewsComment\DestroyNewsComment;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\NewsComment;

class NewsCommentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexNewsComment $request
     * @return Response|array
     */
    public function index(IndexNewsComment $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(NewsComment::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            [''],

            // set columns to searchIn
            ['']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.news-comment.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('admin.news-comment.create');

        return view('admin.news-comment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreNewsComment $request
     * @return Response|array
     */
    public function store(StoreNewsComment $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the NewsComment
        $newsComment = NewsComment::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/news-comments'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/news-comments');
    }

    /**
     * Display the specified resource.
     *
     * @param  NewsComment $newsComment
     * @return Response
     */
    public function show(NewsComment $newsComment)
    {
        $this->authorize('admin.news-comment.show', $newsComment);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  NewsComment $newsComment
     * @return Response
     */
    public function edit(NewsComment $newsComment)
    {
        $this->authorize('admin.news-comment.edit', $newsComment);

        return view('admin.news-comment.edit', [
            'newsComment' => $newsComment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateNewsComment $request
     * @param  NewsComment $newsComment
     * @return Response|array
     */
    public function update(UpdateNewsComment $request, NewsComment $newsComment)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values NewsComment
        $newsComment->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/news-comments'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/news-comments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyNewsComment $request
     * @param  NewsComment $newsComment
     * @return Response|bool
     */
    public function destroy(DestroyNewsComment $request, NewsComment $newsComment)
    {
        $newsComment->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }
}
