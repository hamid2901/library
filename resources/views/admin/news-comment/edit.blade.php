@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.news-comment.actions.edit', ['name' => $newsComment->id]))

@section('body')

    <div class="container-xl">

        <div class="card">

            <news-comment-form
                :action="'{{ $newsComment->resource_url }}'"
                :data="{{ $newsComment->toJson() }}"
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.news-comment.actions.edit', ['name' => $newsComment->id]) }}
                    </div>

                    <div class="card-block">

                        @include('admin.news-comment.components.form-elements')

                    </div>

                    <div class="card-footer">
	                    <button type="submit" class="btn btn-primary" :disabled="submiting">
		                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
		                    {{ trans('brackets/admin-ui::admin.btn.save') }}
	                    </button>
                    </div>

                </form>

        </news-comment-form>

    </div>

</div>

@endsection