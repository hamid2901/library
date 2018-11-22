<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use App\Http\Requests\Admin\Author\IndexAuthor;
use App\Http\Requests\Admin\Author\StoreAuthor;
use App\Http\Requests\Admin\Author\UpdateAuthor;
use App\Http\Requests\Admin\Author\DestroyAuthor;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Author;

class AuthorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexAuthor $request
     * @return Response|array
     */
    public function index(IndexAuthor $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Author::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'first_name', 'last_name', 'role_id'],

            // set columns to searchIn
            ['id', 'first_name', 'last_name']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.author.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('admin.author.create');

        return view('admin.author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAuthor $request
     * @return Response|array
     */
    public function store(StoreAuthor $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Author
        $author = Author::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/authors'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/authors');
    }

    /**
     * Display the specified resource.
     *
     * @param  Author $author
     * @return Response
     */
    public function show(Author $author)
    {
        $this->authorize('admin.author.show', $author);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Author $author
     * @return Response
     */
    public function edit(Author $author)
    {
        $this->authorize('admin.author.edit', $author);

        return view('admin.author.edit', [
            'author' => $author,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateAuthor $request
     * @param  Author $author
     * @return Response|array
     */
    public function update(UpdateAuthor $request, Author $author)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Author
        $author->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/authors'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/authors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyAuthor $request
     * @param  Author $author
     * @return Response|bool
     */
    public function destroy(DestroyAuthor $request, Author $author)
    {
        $author->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }
}
