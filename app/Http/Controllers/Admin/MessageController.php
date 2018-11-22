<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use App\Http\Requests\Admin\Message\IndexMessage;
use App\Http\Requests\Admin\Message\StoreMessage;
use App\Http\Requests\Admin\Message\UpdateMessage;
use App\Http\Requests\Admin\Message\DestroyMessage;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Message;

class MessageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexMessage $request
     * @return Response|array
     */
    public function index(IndexMessage $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Message::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'user_id', 'email', 'admin_id', 'create_at'],

            // set columns to searchIn
            ['id', 'content', 'email', 'create_at']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.message.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('admin.message.create');

        return view('admin.message.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreMessage $request
     * @return Response|array
     */
    public function store(StoreMessage $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Message
        $message = Message::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/messages'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/messages');
    }

    /**
     * Display the specified resource.
     *
     * @param  Message $message
     * @return Response
     */
    public function show(Message $message)
    {
        $this->authorize('admin.message.show', $message);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Message $message
     * @return Response
     */
    public function edit(Message $message)
    {
        $this->authorize('admin.message.edit', $message);

        return view('admin.message.edit', [
            'message' => $message,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateMessage $request
     * @param  Message $message
     * @return Response|array
     */
    public function update(UpdateMessage $request, Message $message)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Message
        $message->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/messages'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/messages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyMessage $request
     * @param  Message $message
     * @return Response|bool
     */
    public function destroy(DestroyMessage $request, Message $message)
    {
        $message->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }
}
