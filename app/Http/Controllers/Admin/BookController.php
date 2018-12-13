<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Category;
use App\Models\BookAvailability;
use App\Models\BookFormat;
use App\Models\AuthorRole;
use App\Models\BookComment;
use Carbon\Carbon;

class BookController extends Controller
{

    // return books to the admin panel
    public function index(){

        $books = Book::with(['categories','bookFormat', 'publisher', 'authors', 'bookComments'])
                        ->paginate(5);
    
        return view('admin.book.index')->with(['books'=> $books]);

    }
    
    // create the form to add book
    public function create()
    {
        $bookAvailability = BookAvailability::all();
        $bookFormat       = BookFormat::all();
        $category         = Category::all();
        $authorRole       = AuthorRole::all();
        $publisher        = Publisher::all();
        $author           = Author::all();

        return view('admin.book.create')->with(['bookAvailabilities'=>$bookAvailability,
                                                'bookFormats'=> $bookFormat,
                                                'categories'=> $category,
                                                'authorRoles'=> $authorRole,
                                                'publishers'=> $publisher,
                                                'authors'=> $author]);
    }



    // store book
    public function store(Request $request)
    {
        $front= $request->file('front_photo')->store();
        $back=$request->file('back_photo')->getClientOriginalName();

        $request->front_photo->move(public_path().'/images/book_images/front', $front); 
        $request->back_photo->move(public_path().'/images/book_images/back', $back);   
            
        $book = Book::create([
                    'title'             => $request->input('title'),
                    'availability_id'   => $request->input('status'),
                    'isbn'              => $request->input('isbn'),
                    'publisher_id'      => $request->input('publisher'),
                    'description'       => $request->input('description'),
                    'issue_date'        => Carbon  ::parse($request->input('issue_date'))->timestamp,
                    'cover'             => $request->input('cover'),
                    'format_id'         => $request->input('format'),
                    'pages'             => $request->input('pages'),
                    'weight'            => $request->input('weight'),
                    'price'             => $request->input('price'),
                    // 'image_dir'         => $path,
                ]); 
        $book->categories()->attach($request->input('category'));
        $book->authors()->attach($request->input('author'));

        return redirect()->back();
    }


    // to edit and update book
    public function update(Request $request, $id = null)
    {        
        $book = Book::find($id);

        $book->title = $request->input('title');
        $book->availability_id = $request->input('status');
        $book->isbn = $request->input('isbn');
        $book->publisher_id = $request->input('publisher');
        $book->description = $request->input('description');
        $book->issue_date = Carbon  ::parse($request->input('issue_date'))->timestamp;
        $book->cover = $request->input('cover');
        $book->cover = $request->input('format');
        $book->pages = $request->input('pages');
        $book->weight = $request->input('weight');
        $book->price = $request->input('price');
        $book->updated_at = Carbon::now();

        $book->save();
        return redirect()->back();
    }


    public function destroy($id)
    {
        $book = Book::find($id);

        $book->delete();
        return redirect()->back();
    }

    public function indexBooks()
    {
        $books = Book::with(['categories','bookFormat', 'publisher', 'authors', 'bookComments'])->paginate(5);
        $publishers = Publisher::all();
        $categories = Category::all();
        return view('books.index')->with(['books'=> $books , 'publishers'=>$publishers, 'categories'=> $categories]);
    }

    public function searchByCategory($categoryName = null)
    {

        $categoryBook = Category::with('books', 'books.publisher', 'books.categories', 'books.authors', 'books.bookComments')->where('type',$categoryName )->paginate(5);
        $categories = Category::all();
        $publishers = Publisher::all();
        return view('books.search')->with(['searchedBooks'=> $categoryBook, 'publishers'=>$publishers, 'categories'=> $categories ]);

    }

    public function searchByPublisher($publisherName = null)
    {
        $books = publisher::with('books', 'books.publisher', 'books.categories', 'books.authors', 'books.bookComments')->where('name', $publisherName )->paginate(5);
        $publishers = Publisher::all();
        $categories = Category::all();
        return view('books.search')->with(['searchedBooks'=> $books , 'publishers'=>$publishers, 'categories'=> $categories]);
    }

    public function searchByText(Request $request)
    {
        $keyword = $request->get('word');
        $books = Book::with(['categories','bookFormat', 'publisher', 'authors', 'bookComments'])->where('title','LIKE','%'.$keyword.'%')->orWhere('description','LIKE','%'.$keyword.'%')->orWhere('description','LIKE','%'.$keyword.'%')->paginate(5);
        $publishers = Publisher::all();
        $categories = Category::all();
        return view('books.index')->with(['books'=> $books , 'publishers'=>$publishers, 'categories'=> $categories]);
     }


     public function showBook($id = null)
    {
        $book = Book::with(['categories','bookFormat', 'publisher', 'authors', 'bookComments.user'])->where('id', $id)->get();
        $publishers = Publisher::all();
        $categories = Category::all();
        $comments = BookComment::with(['user', 'book'])->where('book_id', $id)->get();

        // dd($comments->user()->first_name);
        return view('books.show')->with(['books'=> $book , 'publishers'=>$publishers, 'categories'=> $categories, 'comments'=>$comments]);
     }

     public function storeComment(Request $request, $book, $user)
    {
        // dd($user);
        $comment = new BookComment();
        $comment->content = $request->input('body');
        $comment->user_id = $user;
        $comment->book_id = $book;
        $comment->save();

        
        return redirect()->back();
    }
    
}