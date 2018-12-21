<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use App\Models\Factor;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\Category;
use Carbon\Carbon;
use App\User;

use App\ValueObjects\Cart\ItemObject;

class FactorController extends Controller
{

    public function index(){
            
        $now = Carbon::now();
        $factors = Factor::with('users')->paginate(5);
        $delays = array();

        // add delay time(in minutes) for each factor 
        foreach($factors as $factor){
            $duration = Carbon::parse($factor->duration);
            $delays[$factor->id] = $duration->diffInDays($now);
        }

        return view('admin.factor.index')->with(['factors'=> $factors,
                                                'delays'  => $delays]);
    }


 
// to update factor
public function update(Request $request, $id = null)
{        
    $factor = Factor::with('books')->find($id);
    $factor->borrow_date = Carbon::now();

    $borrowDuration = $request->input('duration');
    switch($borrowDuration){
        case 1:
        $factor->duration = Carbon::now()->addWeek(1);
        break;
        case 2:
        $factor->duration = Carbon::now()->addWeek(2);
        break;
        case 3:
        $factor->duration = Carbon::now()->addMonth();
        break;
    }
    $factor->borrow_status = 1;
    $factor->save();

     // change the book availability 
    foreach($factor->books as $book){
        $book->availability_id = 3;
    }

    return redirect()->back();
}


// whene user give the book back to the library // 
public function factorReceipt(Request $request, $id = null)
{        
    $factor = Factor::with('books')->find($id);

    $factor->return_date = Carbon::now();
    $factor->borrow_status = 2;
   
    $factor->save();

    // change the book availability 
    foreach($factor->books as $book){
        $book->availability_id = 1;
    }

    return redirect()->back();
}

public function factorDetail($id){
   
    $factor = Factor::with(['users', 'books'])->find($id);
    
    return view('admin.factor.factordetail')->with(['factor'=> $factor]);

}


public function destroy($id){
    $factor = Factor::find($id);
    $factor->delete();
    return redirect()->back();
}

    public function addToCart(Request $request, $book){

        $user = $request->input('factor');
        $factorUser = User::with('factors')->find($user);

        $theFactor = $factorUser->factors;

        $lastFactor = null;

        if(!$theFactor->isEmpty()){
        foreach($theFactor as $theFact){
            if($theFact->borrow_status == 0)
                $lastFactor = $theFact;
        }

        // dd($lastFactor);
        if($lastFactor != null){
        if($lastFactor->borrow_status == 0){
            //اگر کتاب رزرو کرده باشد دیگر نمی تواند  کتابی به سبد خرید اضافه کند... نیاز است تا پیغامی را به کار بر نیز نمایش دهد
            return redirect()->back()->withErrors(['شما در حال حاضر کتاب رزرو کرده اید. نمی توانید کتاب دیگری را رزرو کنید.']);

        }else{            

            $user = $request->input('factor');

            //چک میکنه که بیشتر از 2 تا کتاب نتونه یکبار رزرو کنه
            if(\Cart::session($user)->getTotalQuantity() < 2){

                //برای اطمینان اگه نیاز شد کل سبد خریدش حذف بشه
                // \Cart::session($user)->clear();

                //اضافه کردن کتب به سبد رزرو
                \Cart::session($user)->add($book, 'Book', 0, 1, array());

                //درصورتی که کتاب به سبد رزرو اضافه شد وضعیت کتاب از در دسترس به رزروشده تغییر می یابد.
                $theBook = Book::find($book)->update(['availability_id'=>4]);

                return redirect()->back();
            }
            else{
            //اگه 2تا کتاب رزرو کرده برش میگردونه به همون صفحه فقط باید یه پیغامی رو بهش برگردونه. روش کار میکنیم.
                return redirect()->back()->withErrors(['شما بیشتر از دو کتاب هم زمان نمی توانید رزرو کنید.']);
        }}}else{
            $user = $request->input('factor');

            //چک میکنه که بیشتر از 2 تا کتاب نتونه یکبار رزرو کنه
            if(\Cart::session($user)->getTotalQuantity() < 2){

                //برای اطمینان اگه نیاز شد کل سبد خریدش حذف بشه
                // \Cart::session($user)->clear();

                //اضافه کردن کتب به سبد رزرو
                \Cart::session($user)->add($book, 'Book', 0, 1, array());

                //درصورتی که کتاب به سبد رزرو اضافه شد وضعیت کتاب از در دسترس به رزروشده تغییر می یابد.
                $theBook = Book::find($book)->update(['availability_id'=>4]);

                return redirect()->back();
        }else{
            //اگه 2تا کتاب رزرو کرده برش میگردونه به همون صفحه فقط باید یه پیغامی رو بهش برگردونه. روش کار میکنیم.
                return redirect()->back()->withErrors(['شما بیشتر از دو کتاب هم زمان نمی توانید رزرو کنید.']);
        }}}else{

            $user = $request->input('factor');

            //چک میکنه که بیشتر از 2 تا کتاب نتونه یکبار رزرو کنه
            if(\Cart::session($user)->getTotalQuantity() < 2){

                //برای اطمینان اگه نیاز شد کل سبد خریدش حذف بشه
                // \Cart::session($user)->clear();

                //اضافه کردن کتب به سبد رزرو
                \Cart::session($user)->add($book, 'Book', 0, 1, array());

                //درصورتی که کتاب به سبد رزرو اضافه شد وضعیت کتاب از در دسترس به رزروشده تغییر می یابد.
                $theBook = Book::find($book)->update(['availability_id'=>4]);

                return redirect()->back();
        }
        else{
            //اگه 2تا کتاب رزرو کرده برش میگردونه به همون صفحه فقط باید یه پیغامی رو بهش برگردونه. روش کار میکنیم.
                return redirect()->back()->withErrors(['شما بیشتر از دو کتاب هم زمان نمی توانید رزرو کنید.']);
        }
    }
}

    public function removeFromCart(Request $request, $book){

        $user = $request->input('factor');

        //حذف کردن کتاب از سبد رزرو
        \Cart::session($user)->remove($book);

        //درصورتی که کتاب از سبد رزرو حذف شد وضعیت کتاب به در دسترس تغییر می یابد.
        $theBook = Book::find($book)->update(['availability_id'=> 1]);

        return redirect()->back();
    }

    public function yourCart(Request $request){

        // dd($request->user());
        $user = $request->user()->id;
        $array = array();
        $books = \Cart::session($user)->getContent();
        
                foreach($books as $book){
                    $array[] = $book['id'];
                }

        $bookCart = Book::with(['categories','bookFormat', 'publisher', 'authors'])->find($array);
        $publishers = Publisher::all();
        $categories = Category::all();
        return view('factor.cartIndex')->with(['books'=>$bookCart,'item'=>'سبد رزرو','message'=>'سبد رزرو شما خالی است.', 'publishers'=> $publishers, 'categories'=>$categories]);
    }

    public function submitFactor(Request $request){

        $user_id = $request->input('user');
        $array = array();
        $books = \Cart::session($user_id)->getContent();
        
        foreach($books as $book){
            $array[] = $book['id'];
        }

        $factor = new Factor();
        $factor->borrow_status = 0;
        $factor->quantity = \Cart::session($user_id)->getTotalQuantity();
        $factor->reserve_date = Carbon::now();
        $factor->save();
        
        $user = User::find($user_id);

        foreach($books as $book){
            $user->books()->attach($book['id'], ['factor_id' => $factor->id]);
        }
        \Cart::session($user_id)->clear();

        return redirect('/books');

    }

    public function reservedBooks(Request $request){

        $user = $request->input('user_id');
        $factorUser = User::with('factors')->find($user);
        $theFactor = $factorUser->factors;
        //اینجا نیاز به تصحیح دارد... خواستم با آخرین آیدی وارد شده به جدول فاکتور برای یه یوزر خاص بگیرم اولین فاکتورشو داد از این ترفند استفاده کردم.
        $publishers = Publisher::all();
        $categories = Category::all();


        foreach($theFactor as $factor)
            if($factor->borrow_status == 0){

                $books = $factor->books;       
                $factorArray = $factor;

            foreach($books as $book){
                $array[] = $book['id'];
            }

            $bookCart = Book::with(['categories','bookFormat', 'publisher', 'authors'])->find($array);
            // dd($books);
            if($factorArray != null){
                return view('factor.reserved')->with(['factor'=>$factor ,'books'=>$bookCart,'item'=>'کتاب های رزرو شده', 'publishers'=> $publishers, 'categories'=>$categories]);
            }else{
                    
                
            
            
                return view('factor.reserved')->with(['books'=>array() ,'item'=>'کتاب های رزرو شده', 'message'=>'شما اخیراً کتابی رزرو نکرده اید.', 'publishers'=> $publishers, 'categories'=>$categories]);
            }
            
        }
        return view('factor.reserved')->with(['books'=>array() ,'item'=>'کتاب های رزرو شده', 'message'=>'شما اخیراً کتابی رزرو نکرده اید.', 'publishers'=> $publishers, 'categories'=>$categories]);

        
    }

    public function borrowedBooks(Request $request){

        $user = $request->input('user_id');
        $factorUser = User::with('factors')->find($user);
        $factors = $factorUser->factors;
        $array = array();
        $factorArray = array();

        $publishers = Publisher::all();
        $categories = Category::all();
        // dd($factors);
        foreach($factors as $factor){
            if($factor->borrow_status == 1){

                $books = $factor->books;       
                $factorArray = $factor;
                foreach($books as $book){
                    $array[] = $book['id'];
                }

                
            }
        }
        // dd($array);
            
        // dd($factorArray);

            $bookCart = Book::with(['categories','bookFormat', 'publisher', 'authors'])->find($array);
            // dd($bookCart);

            return view('factor.borrowed')->with(['message'=>'شما اخیراً کتابی امانت نگرفته اید' ,'factor'=>$factorArray ,'books'=>$bookCart,'item'=>'کتاب های امانت گرفته شده', 'publishers'=> $publishers, 'categories'=>$categories]);



    }

    public function deleteReserve(Request $request){

        $user = $request->input('user');
        $factorUser = User::with('factors')->find($user);
        $theFactor = $factorUser->factors;
        $factor = $theFactor[0];
        // dd($factors);

        $thisFactor = Factor::find($factor->id);
        $thisFactor->delete();

        // dd($books);
            
        return redirect('/books');
    }

   
}