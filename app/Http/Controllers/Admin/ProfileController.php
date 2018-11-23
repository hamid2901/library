<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public $user;

    public function __construct()
    {
        // TODO add authorization
    }

    /**
     * Get logged user before each method
     *
     * @param  Request $request
     */
    protected function setUser($request) {
        if (empty($request->user())) {
            abort(404, 'User not found');
        }

        $this->user = $request->user();
    }

    /**
     * Show the form for editing logged user profile.
     *
     * @param  Request $request
     * @return  \Illuminate\Http\Response
     */
    public function editProfile(Request $request)
    {
        $this->setUser($request);

        return view('admin.profile.edit-profile', [
            'user' => $this->user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param        \Illuminate\Http\Request  $request
     * @return    \Illuminate\Http\Response|array
     */
    public function updateProfile(Request $request)
    {
        $this->setUser($request);
        $user = $this->user;

        // Validate the request
        $this->validate($request, [
            'email' => ['sometimes', 'email', Rule::unique('users', 'email')->ignore($this->user->getKey(), $this->user->getKeyName()), 'string'],
            'email_verified_at' => ['nullable', 'date'],
            'image_name' => ['nullable', 'string'],
            'role_id' => ['sometimes', 'integer'],
            'status_id' => ['sometimes', 'integer'],
            'confirm' => ['sometimes', 'integer'],
            'first_name' => ['nullable', 'string'],
            'last_name' => ['nullable', 'string'],
            'phone' => ['nullable', 'string'],
            'profession' => ['nullable', 'string'],
            'university' => ['nullable', 'string'],
            'birthdate' => ['nullable', 'string'],
            'sex' => ['sometimes', 'integer'],
            'city' => ['nullable', 'string'],
            'street' => ['nullable', 'string'],
            'plate' => ['nullable', 'integer'],
            'alley' => ['nullable', 'string'],
            'postal_code' => ['nullable', 'string'],
            'language' => ['sometimes', 'string'],
            
        ]);

        // Sanitize input
        $sanitized = $request->only([
            'email',
            'email_verified_at',
            'image_name',
            'role_id',
            'status_id',
            'confirm',
            'first_name',
            'last_name',
            'phone',
            'profession',
            'university',
            'birthdate',
            'sex',
            'city',
            'street',
            'plate',
            'alley',
            'postal_code',
            'language',
            
        ]);

        // Update changed values User
        $this->user->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/profile'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Request $request
     * @return  \Illuminate\Http\Response
     */
    public function editPassword(Request $request)
    {
        $this->setUser($request);

        return view('admin.profile.edit-password', [
            'user' => $this->user,
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param        \Illuminate\Http\Request  $request
     * @return    \Illuminate\Http\Response|array
     */
    public function updatePassword(Request $request)
    {
        $this->setUser($request);
        $user = $this->user;

        // Validate the request
        $this->validate($request, [
            'password' => ['sometimes', 'confirmed', 'min:7', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9]).*$/', 'string'],
            
        ]);

        // Sanitize input
        $sanitized = $request->only([
            'password',
            
        ]);

        //Modify input, set hashed password
        $sanitized['password'] = Hash::make($sanitized['password']);

        // Update changed values User
        $this->user->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/password'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/password');
    }

}
