@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.book-comment.actions.edit', ['name' => $bookComment->id]))

@section('body')

    <div class="container-xl">

        <div class="card">

            <book-comment-form
                :action="'{{ $bookComment->resource_url }}'"
                :data="{{ $bookComment->toJson() }}"
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.book-comment.actions.edit', ['name' => $bookComment->id]) }}
                    </div>

                    <div class="card-block">

                        @include('admin.book-comment.components.form-elements')

                    </div>

                    <div class="card-footer">
	                    <button type="submit" class="btn btn-primary" :disabled="submiting">
		                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
		                    {{ trans('brackets/admin-ui::admin.btn.save') }}
	                    </button>
                    </div>

                </form>

        </book-comment-form>

    </div>

</div>

@endsection