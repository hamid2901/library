<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\User;
use App\Models\Factor;
use App\Models\Book;

use \Illuminate\Http\Response;
use App\Models\UserStatus;
use App\Models\UserRole;
use App\Models\UserGender;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
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

        $user = $this->user;
        $factors = User::with('factors.books')->where('id', $user->id)->get();

        $newsComments = User::with('newsComments.news')->where('id', $user->id)->get();
        
        $bookComments = User::with('bookComments.book')->where('id', $user->id)->get();

        $factorUser = User::with('factors.books')->find($user->id);
        $theFactor = $factorUser->factors;
        $reservedArray = array();
        $borrowedArray = array();
        foreach($theFactor as $factor)
            if($factor->borrow_status == 0){

                $books = $factor->books;       
                $factorArray = $factor;

            foreach($books as $book){
                $reservedArray[] = $book['id'];
            }}
        $reservedBooks = Book::with(['categories','bookFormat', 'publisher', 'authors'])->find($reservedArray);

        foreach($theFactor as $factor)
        if($factor->borrow_status == 1){

            $books = $factor->books;       
            $factorArray = $factor;

        foreach($books as $book){
            $borrowedArray[] = $book['id'];
        }}
        $borrowedBooks = Book::with(['categories','bookFormat', 'publisher', 'authors'])->find($borrowedArray);
        return view('profile.index', [
            'user' => $this->user,
            'userNews'=> $bookComments,
            'userBooks'=> $newsComments,
            'userFactors'=> $factors,
            'borrowedBooks'=> $borrowedBooks,
            'reservedBooks'=> $reservedBooks,
            'factorUser'=> $factorUser
        ]);
    
    }
    /**
     * Update the specified resource in storage.
     *
     * @param        \Illuminate\Http\Request  $request
     * @return    \Illuminate\Http\Response|array
     */
    public function updateProfile(Request $request, $id)
    {
        $user = User::find($id);

        if($request->user_photo != null){
            if(File::exists(public_path('images/users_images/'.$user->image_name.''))) {
                File::delete(public_path('images/users_images/'.$user->image_name.''));
            }
            $photoName = time().'.'.$request->user_photo->getClientOriginalExtension();
            $request->user_photo->move(public_path('images/users_images/'), $photoName);
            $user->image_name = $photoName;
        }
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->phone = $request->input('phone');
        $user->profession = $request->input('profession');
        $user->university = $request->input('university');
        if($request->input('birthdate') != null)
        $user->birthdate = $request->input('birthdate');
        $user->city = $request->input('city');
        $user->street = $request->input('street');
        $user->alley = $request->input('alley');
        $user->plate = $request->input('plate');
        $user->updated_at = Carbon::now();

        $user->save();
        return redirect()->back();
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
