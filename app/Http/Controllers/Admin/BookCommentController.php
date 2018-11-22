<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use App\Http\Requests\Admin\BookComment\IndexBookComment;
use App\Http\Requests\Admin\BookComment\StoreBookComment;
use App\Http\Requests\Admin\BookComment\UpdateBookComment;
use App\Http\Requests\Admin\BookComment\DestroyBookComment;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\BookComment;

class BookCommentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexBookComment $request
     * @return Response|array
     */
    public function index(IndexBookComment $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(BookComment::class)->processRequestAndGet(
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

        return view('admin.book-comment.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('admin.book-comment.create');

        return view('admin.book-comment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreBookComment $request
     * @return Response|array
     */
    public function store(StoreBookComment $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the BookComment
        $bookComment = BookComment::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/book-comments'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/book-comments');
    }

    /**
     * Display the specified resource.
     *
     * @param  BookComment $bookComment
     * @return Response
     */
    public function show(BookComment $bookComment)
    {
        $this->authorize('admin.book-comment.show', $bookComment);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  BookComment $bookComment
     * @return Response
     */
    public function edit(BookComment $bookComment)
    {
        $this->authorize('admin.book-comment.edit', $bookComment);

        return view('admin.book-comment.edit', [
            'bookComment' => $bookComment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateBookComment $request
     * @param  BookComment $bookComment
     * @return Response|array
     */
    public function update(UpdateBookComment $request, BookComment $bookComment)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values BookComment
        $bookComment->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/book-comments'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/book-comments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyBookComment $request
     * @param  BookComment $bookComment
     * @return Response|bool
     */
    public function destroy(DestroyBookComment $request, BookComment $bookComment)
    {
        $bookComment->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }
}
