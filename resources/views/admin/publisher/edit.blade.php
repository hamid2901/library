@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.publisher.actions.edit', ['name' => $publisher->id]))

@section('body')

    <div class="container-xl">

        <div class="card">

            <publisher-form
                :action="'{{ $publisher->resource_url }}'"
                :data="{{ $publisher->toJson() }}"
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.publisher.actions.edit', ['name' => $publisher->id]) }}
                    </div>

                    <div class="card-block">

                        @include('admin.publisher.components.form-elements')

                    </div>

                    <div class="card-footer">
	                    <button type="submit" class="btn btn-primary" :disabled="submiting">
		                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
		                    {{ trans('brackets/admin-ui::admin.btn.save') }}
	                    </button>
                    </div>

                </form>

        </publisher-form>

    </div>

</div>

@endsection