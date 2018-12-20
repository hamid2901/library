<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use App\Models\AuthorRole;
use App\Models\Article;
use App\Models\Category;
use App\Models\Author;
use Carbon\Carbon;

class ArticleController extends Controller
{

 // return books to the admin panel
 public function index(){

    $articles = Article::with(['categories', 'authors'])
                    ->paginate(5);

    return view('admin.article.index')->with(['articles'=> $articles]);

}

// create the form to add book
public function create()
{
    $category    = Category   ::all();
    $authorRole  = AuthorRole ::all();
    $author      = Author     ::all();

    return view('admin.article.create')->with([
                                            'categories' => $category,
                                            'authorRoles'=> $authorRole,
                                            'authors'    => $author]);
}

 // create the form to edit book
 public function edit($id)
 {
    $article = Article::with([
                        'categories',
                        'authors'
                        ])->find($id);
    
    $currentAuthor = [];
    foreach($article->authors as $author){
        $currentAuthor[] = $author->last_name;
    }

    $currentCategory = [];
    foreach($article->categories as $category){
        $currentCategory[] = $category->type;
    }

    $category   = Category   ::all();
    $authorRole = AuthorRole ::all();
    $author     = Author     ::all();

    return view('admin.article.edit')->with(['article'    => $article, 
                                        'categories'      => $category,
                                        'authorRoles'     => $authorRole,
                                        'authors'         => $author,
                                        'currentAuthor'   => $currentAuthor,
                                        'currentCategory' => $currentCategory]);
 }


// store book
public function store(Request $request)
{

    $fileName = $request->input('title') . ".pdf";

    Input::file('article_file')->move(public_path().'/images/article_images', $fileName);
  
    $book = Article::create([
                'title'           => $request->input('title'),
                'description'     => $request->input('description'),
                'publish_date'    => $request->input('publish_date'),
                'article_filename'=> $fileName,
            ]); 
    $book->categories()->attach($request->input('category'));
    $book->authors()->attach($request->input('author'));

    return redirect()->back();
}


// to edit and update book
public function update(Request $request, $id = null)
{        
    $article = Article::find($id);

    $oldfileName = $article->article_filename;
    $newfileName = $request->input('title') .".pdf";
    $filePass = public_path().'/images/article_images';

    if(file_exists($filePass."/".$oldfileName)) {
        
        File::delete($filePass . "/" . $oldfileName);
    
    }
    
    Input::file('article_file')->move($filePass , $newfileName);
    

    $article->title            = $request->input('title');
    $article->description      = $request->input('description');
    $article->publish_date     = Carbon  ::parse($request->input('publish_date'));
    $article->updated_at       = Carbon  ::now();
    $article->article_filename = $newfileName;

    $article->categories()->sync($request->input('category'));
    $article->authors()->sync($request->input('author'));

    $article->save();
    return redirect()->back();
}


public function destroy($id)
{
    $article = Article::find($id);

    $fileName = $article->article_filename;
    $filePass = public_path().'/article_images';

    if(file_exists($filePass . $fileName)) { 
        
        File::delete($filePass . "/" . $fileName);
    }

    $article->delete();
    return redirect()->back();
}

//this is for confirming articles//
public function confirmArticle($id)
    {

        $article = Article::find($id);

            if($article->confirm == 0){
                $article->confirm = 1;
            }else{
                $article->confirm = 0;
            }

        $article->save();
        return redirect()->back();
    }


    public function indexArticles()
    {
        $articles = Article::with(['categories', 'authors'])->where('confirm', 1)->paginate(5);
        $categories = Category::all();
        return view('articles.index')->with(['articles'=> $articles, 'categories'=> $categories]);
    }

    public function searchByCategory($categoryName = null)
    {
        $categoryArticle = Category::with('articles', 'articles.categories', 'articles.authors')->where('type',$categoryName )->paginate(5);
        $categories = Category::all();
        return view('articles.search')->with(['searchedArticles'=> $categoryArticle, 'categories'=> $categories ]);
    }

    public function searchByText(Request $request)
    {
        $keyword = $request->get('word');
        $articles = Article::with(['categories', 'authors'])->where('title','LIKE','%'.$keyword.'%')->orWhere('description','LIKE','%'.$keyword.'%')->where('confirm', 1)->paginate(5);
        $categories = Category::all();
        return view('articles.index')->with(['articles'=> $articles, 'categories'=> $categories]);
     }


     public function showArticle($id = null)
    {
        $article = Article::with(['categories', 'authors'])->where('id', $id)->get();
        $categories = Category::all();
        return view('articles.show')->with(['articles'=> $article, 'categories'=> $categories]);
     }

     public function getDownload($id = null)
    {
        $articles = Article::with(['categories', 'authors'])->where('id', $id)->get();
        foreach($articles as $article){
        //PDF file is stored under project/public/download/info.pdf
        $file= public_path('images/article_images/files/'.$article->article_filename.'.pdf');
        $headers = array(
                  'Content-Type: application/octet-stream',
                );

        return response()->download($file, 'filename.pdf', $headers);
        }
    }   
}