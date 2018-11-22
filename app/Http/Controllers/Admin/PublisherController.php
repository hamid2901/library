<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use App\Http\Requests\Admin\Publisher\IndexPublisher;
use App\Http\Requests\Admin\Publisher\StorePublisher;
use App\Http\Requests\Admin\Publisher\UpdatePublisher;
use App\Http\Requests\Admin\Publisher\DestroyPublisher;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Publisher;

class PublisherController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexPublisher $request
     * @return Response|array
     */
    public function index(IndexPublisher $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Publisher::class)->processRequestAndGet(
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

        return view('admin.publisher.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('admin.publisher.create');

        return view('admin.publisher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePublisher $request
     * @return Response|array
     */
    public function store(StorePublisher $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Publisher
        $publisher = Publisher::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/publishers'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/publishers');
    }

    /**
     * Display the specified resource.
     *
     * @param  Publisher $publisher
     * @return Response
     */
    public function show(Publisher $publisher)
    {
        $this->authorize('admin.publisher.show', $publisher);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Publisher $publisher
     * @return Response
     */
    public function edit(Publisher $publisher)
    {
        $this->authorize('admin.publisher.edit', $publisher);

        return view('admin.publisher.edit', [
            'publisher' => $publisher,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePublisher $request
     * @param  Publisher $publisher
     * @return Response|array
     */
    public function update(UpdatePublisher $request, Publisher $publisher)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Publisher
        $publisher->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/publishers'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/publishers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyPublisher $request
     * @param  Publisher $publisher
     * @return Response|bool
     */
    public function destroy(DestroyPublisher $request, Publisher $publisher)
    {
        $publisher->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }
}
