<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use App\Http\Requests\Admin\Article\IndexArticle;
use App\Http\Requests\Admin\Article\StoreArticle;
use App\Http\Requests\Admin\Article\UpdateArticle;
use App\Http\Requests\Admin\Article\DestroyArticle;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Article;
use App\Models\Category;
use App\Models\Author;

class ArticleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexArticle $request
     * @return Response|array
     */
    public function index(IndexArticle $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Article::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title', 'publish_date', 'article_filename', 'confirm'],

            // set columns to searchIn
            ['id', 'title', 'publish_date', 'description', 'article_filename', 'created_at', 'updated_at']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.article.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('admin.article.create');

        return view('admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreArticle $request
     * @return Response|array
     */
    public function store(StoreArticle $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Article
        $article = Article::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/articles'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  Article $article
     * @return Response
     */
    public function show(Article $article)
    {
        $this->authorize('admin.article.show', $article);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Article $article
     * @return Response
     */
    public function edit(Article $article)
    {
        $this->authorize('admin.article.edit', $article);

        return view('admin.article.edit', [
            'article' => $article,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateArticle $request
     * @param  Article $article
     * @return Response|array
     */
    public function update(UpdateArticle $request, Article $article)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Article
        $article->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/articles'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyArticle $request
     * @param  Article $article
     * @return Response|bool
     */
    public function destroy(DestroyArticle $request, Article $article)
    {
        $article->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

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
        $file= public_path('images/article_images/'.$article->id.'.pdf');
        $headers = array(
                  'Content-Type: application/octet-stream',
                );

        return response()->download($file, 'filename.pdf', $headers);
        }
    }   
}