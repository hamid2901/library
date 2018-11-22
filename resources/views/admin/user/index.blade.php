@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.user.actions.index'))

@section('body')

    <user-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/users') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.user.actions.index') }}
                        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('admin/users/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.user.actions.create') }}</a>
                    </div>
                    <div class="card-block" v-cloak>
                        <form @submit.prevent="">
                            <div class="row justify-content-md-between">
                                <div class="col col-lg-7 col-xl-5 form-group">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="{{ trans('brackets/admin-ui::admin.placeholder.search') }}" v-model="search" @keyup.enter="filter('search', $event.target.value)" />
                                        <span class="btn-group input-group-btn">
                                            <button type="button" class="btn btn-primary" @click="filter('search', search)"><i class="fa fa-search"></i>&nbsp; {{ trans('brackets/admin-ui::admin.btn.search') }}</button>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-auto form-group ">
                                    <select class="form-control" v-model="pagination.state.per_page">
                                        
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>

                            </div>
                        </form>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th is='sortable' :column="'id'">{{ trans('admin.user.columns.id') }}</th>
                                    <th is='sortable' :column="'email'">{{ trans('admin.user.columns.email') }}</th>
                                    <th is='sortable' :column="'email_verified_at'">{{ trans('admin.user.columns.email_verified_at') }}</th>
                                    <th is='sortable' :column="'image_name'">{{ trans('admin.user.columns.image_name') }}</th>
                                    <th is='sortable' :column="'role_id'">{{ trans('admin.user.columns.role_id') }}</th>
                                    <th is='sortable' :column="'status_id'">{{ trans('admin.user.columns.status_id') }}</th>
                                    <th is='sortable' :column="'confirm'">{{ trans('admin.user.columns.confirm') }}</th>
                                    <th is='sortable' :column="'first_name'">{{ trans('admin.user.columns.first_name') }}</th>
                                    <th is='sortable' :column="'last_name'">{{ trans('admin.user.columns.last_name') }}</th>
                                    <th is='sortable' :column="'phone'">{{ trans('admin.user.columns.phone') }}</th>
                                    <th is='sortable' :column="'profession'">{{ trans('admin.user.columns.profession') }}</th>
                                    <th is='sortable' :column="'university'">{{ trans('admin.user.columns.university') }}</th>
                                    <th is='sortable' :column="'birthdate'">{{ trans('admin.user.columns.birthdate') }}</th>
                                    <th is='sortable' :column="'sex'">{{ trans('admin.user.columns.sex') }}</th>
                                    <th is='sortable' :column="'city'">{{ trans('admin.user.columns.city') }}</th>
                                    <th is='sortable' :column="'street'">{{ trans('admin.user.columns.street') }}</th>
                                    <th is='sortable' :column="'plate'">{{ trans('admin.user.columns.plate') }}</th>
                                    <th is='sortable' :column="'alley'">{{ trans('admin.user.columns.alley') }}</th>
                                    <th is='sortable' :column="'postal_code'">{{ trans('admin.user.columns.postal_code') }}</th>
                                    <th is='sortable' :column="'activated'">{{ trans('admin.user.columns.activated') }}</th>
                                    <th is='sortable' :column="'forbidden'">{{ trans('admin.user.columns.forbidden') }}</th>
                                    <th is='sortable' :column="'language'">{{ trans('admin.user.columns.language') }}</th>
                                    
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in collection">
                                    <td>@{{ item.id }}</td>
                                    <td>@{{ item.email }}</td>
                                    <td>@{{ item.email_verified_at | datetime }}</td>
                                    <td>@{{ item.image_name }}</td>
                                    <td>@{{ item.role_id }}</td>
                                    <td>@{{ item.status_id }}</td>
                                    <td>@{{ item.confirm }}</td>
                                    <td>@{{ item.first_name }}</td>
                                    <td>@{{ item.last_name }}</td>
                                    <td>@{{ item.phone }}</td>
                                    <td>@{{ item.profession }}</td>
                                    <td>@{{ item.university }}</td>
                                    <td>@{{ item.birthdate }}</td>
                                    <td>@{{ item.sex }}</td>
                                    <td>@{{ item.city }}</td>
                                    <td>@{{ item.street }}</td>
                                    <td>@{{ item.plate }}</td>
                                    <td>@{{ item.alley }}</td>
                                    <td>@{{ item.postal_code }}</td>
                                    <td>
                                        <label class="switch switch-3d switch-success">
                                            <input type="checkbox" class="switch-input" v-model="collection[index].activated" @change="toggleSwitch(item.resource_url, 'activated', collection[index])">
                                            <span class="switch-label"></span>
                                            <span class="switch-handle"></span>
                                        </label>
                                    </td>
                                    
                                    <td>@{{ item.forbidden }}</td>
                                    <td>@{{ item.language }}</td>
                                    
                                    <td>
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/edit'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button"><i class="fa fa-edit"></i></a>
                                            </div>
                                            <form class="col" @submit.prevent="deleteItem(item.resource_url)">
                                                <button type="submit" class="btn btn-sm btn-danger" title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="row" v-if="pagination.state.total > 0">
                            <div class="col-sm">
                                <span class="pagination-caption">{{ trans('brackets/admin-ui::admin.pagination.overview') }}</span>
                            </div>
                            <div class="col-sm-auto">
                                <pagination></pagination>
                            </div>
                        </div>

	                    <div class="no-items-found" v-if="!collection.length > 0">
		                    <i class="icon-magnifier"></i>
		                    <h3>{{ trans('brackets/admin-ui::admin.index.no_items') }}</h3>
		                    <p>{{ trans('brackets/admin-ui::admin.index.try_changing_items') }}</p>
                            <a class="btn btn-primary btn-spinner" href="{{ url('admin/users/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.user.actions.create') }}</a>
	                    </div>
                    </div>
                </div>
            </div>
        </div>
    </user-listing>

@endsection