@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.message.actions.edit', ['name' => $message->email]))

@section('body')

    <div class="container-xl">

        <div class="card">

            <message-form
                :action="'{{ $message->resource_url }}'"
                :data="{{ $message->toJson() }}"
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.message.actions.edit', ['name' => $message->email]) }}
                    </div>

                    <div class="card-block">

                        @include('admin.message.components.form-elements')

                    </div>

                    <div class="card-footer">
	                    <button type="submit" class="btn btn-primary" :disabled="submiting">
		                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
		                    {{ trans('brackets/admin-ui::admin.btn.save') }}
	                    </button>
                    </div>

                </form>

        </message-form>

    </div>

</div>

@endsection