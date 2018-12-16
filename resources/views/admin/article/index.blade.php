@extends('layouts.admin')

@section('form')
 
<div class="container">
    <div class="row col-12">
        <a href="/admin/articles/create" class="badge badge-primary p-3 m-2">افزودن مقاله</a>
    </div>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th class="">شناسه</th>
                <th class="">موضوع</th>
                <th class="">ژانر</th>
                <th class="">نویسنده</th>
                <th class="">وضعیت</th>
                <th class="">ویرایش</th>
                <th class="">حذف</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr>
                <th scope="row" class="">{{$article->id}}</th>
                <td class="">{{$article->title}}</td>
                <td class="">
                  @foreach( $article->categories as $article->category )
                     {{$article->category->type}}
                  @if(! $loop->last )
                     ،
                  @endif
                  @endforeach
               </td>
               <td>
                    @foreach( $article->authors as $article->author )
                     {{$article->author->last_name}}
                    @if(! $loop->last )
                     ،
                    @endif
                    @endforeach
               </td>
                <td class="">
                    <label class="switch">
                    <a href="/admin/articles/{{$article->id}}/confirm">
                    @if($article->confirm == 1)
                        <input type="checkbox" name="{{$article->id}}" id="{{$article->id}}" checked>
                    @else
                    <input type="checkbox" name="{{$article->id}}" id="{{$article->id}}">
                    @endif
                        <span class="slider round ConfirmSwitch" id="{{$article->id}}"></span>
                    </a>
                    </label>        
                </td>
                <td class=""><a href="/admin/articles/{{$article->id}}/edit"><i class="fas fa-edit"></i></a></td>
                <td class=""><a href="/admin/articles/{{$article->id}}/delete"><i class="fas fa-trash"></i></a></td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <div style="text-align:center;">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li>
                    {{$articles->links()}}
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- Pager -->

@stop

@section('pageSpecificScripts')
    <!-- <script src="{{ asset('js/article_switch.js')}}"></script> -->
@stop