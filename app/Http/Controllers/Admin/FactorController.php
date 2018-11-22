<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use App\Http\Requests\Admin\Factor\IndexFactor;
use App\Http\Requests\Admin\Factor\StoreFactor;
use App\Http\Requests\Admin\Factor\UpdateFactor;
use App\Http\Requests\Admin\Factor\DestroyFactor;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Factor;

class FactorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexFactor $request
     * @return Response|array
     */
    public function index(IndexFactor $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Factor::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'borrow_status', 'quantity', 'borrow_date', 'reserve_date', 'duration'],

            // set columns to searchIn
            ['id', 'borrow_date', 'created_at', 'updated_at', 'reserve_date', 'duration']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.factor.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('admin.factor.create');

        return view('admin.factor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreFactor $request
     * @return Response|array
     */
    public function store(StoreFactor $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Factor
        $factor = Factor::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/factors'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/factors');
    }

    /**
     * Display the specified resource.
     *
     * @param  Factor $factor
     * @return Response
     */
    public function show(Factor $factor)
    {
        $this->authorize('admin.factor.show', $factor);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Factor $factor
     * @return Response
     */
    public function edit(Factor $factor)
    {
        $this->authorize('admin.factor.edit', $factor);

        return view('admin.factor.edit', [
            'factor' => $factor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateFactor $request
     * @param  Factor $factor
     * @return Response|array
     */
    public function update(UpdateFactor $request, Factor $factor)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Factor
        $factor->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/factors'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/factors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyFactor $request
     * @param  Factor $factor
     * @return Response|bool
     */
    public function destroy(DestroyFactor $request, Factor $factor)
    {
        $factor->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }
}
