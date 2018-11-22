@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.factor.actions.edit', ['name' => $factor->id]))

@section('body')

    <div class="container-xl">

        <div class="card">

            <factor-form
                :action="'{{ $factor->resource_url }}'"
                :data="{{ $factor->toJson() }}"
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.factor.actions.edit', ['name' => $factor->id]) }}
                    </div>

                    <div class="card-block">

                        @include('admin.factor.components.form-elements')

                    </div>

                    <div class="card-footer">
	                    <button type="submit" class="btn btn-primary" :disabled="submiting">
		                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
		                    {{ trans('brackets/admin-ui::admin.btn.save') }}
	                    </button>
                    </div>

                </form>

        </factor-form>

    </div>

</div>

@endsection