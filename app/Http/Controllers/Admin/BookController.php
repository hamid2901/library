<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use App\Http\Requests\Admin\Book\IndexBook;
use App\Http\Requests\Admin\Book\StoreBook;
use App\Http\Requests\Admin\Book\UpdateBook;
use App\Http\Requests\Admin\Book\DestroyBook;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\Category;

class BookController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexBook $request
     * @return Response|array
     */
    public function index(IndexBook $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Book::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title', 'availability_id', 'image_dir', 'isbn', 'publisher_id', 'issue_date', 'cover', 'format_id', 'pages', 'weight', 'price'],

            // set columns to searchIn
            ['id', 'title', 'image_dir', 'created_at', 'updated_at', 'isbn', 'description', 'issue_date']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        // return view('admin.book.index', ['data' => $data]);
        return view('admin.book.index')->with('books', Book::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('admin.book.create');

        return view('admin.book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreBook $request
     * @return Response|array
     */
    public function store(StoreBook $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Book
        $book = Book::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/books'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/books');
    }

    /**
     * Display the specified resource.
     *
     * @param  Book $book
     * @return Response
     */
    public function show(Book $book)
    {
        $this->authorize('admin.book.show', $book);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Book $book
     * @return Response
     */
    public function edit(Book $book)
    {
        $this->authorize('admin.book.edit', $book);

        return view('admin.book.edit', [
            'book' => $book,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateBook $request
     * @param  Book $book
     * @return Response|array
     */
    public function update(UpdateBook $request, Book $book)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Book
        $book->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/books'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyBook $request
     * @param  Book $book
     * @return Response|bool
     */
    public function destroy(DestroyBook $request, Book $book)
    {
        $book->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    public function BookByCateogory(){

    }

    public function indexBooks()
    {
        $books = Book::with(['categories','bookFormat', 'publisher', 'authors', 'bookComments'])->where('availability_id', 1)->paginate(5);
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
        return view('books.show')->with(['books'=> $book , 'publishers'=>$publishers, 'categories'=> $categories]);
     }
    
}
