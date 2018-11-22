@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.book.actions.index'))

@section('body')

    <book-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/books') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.book.actions.index') }}
                        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('admin/books/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.book.actions.create') }}</a>
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
                                    <th is='sortable' :column="'id'">{{ trans('admin.book.columns.id') }}</th>
                                    <th is='sortable' :column="'title'">{{ trans('admin.book.columns.title') }}</th>
                                    <th is='sortable' :column="'availability_id'">{{ trans('admin.book.columns.availability_id') }}</th>
                                    <th is='sortable' :column="'image_dir'">{{ trans('admin.book.columns.image_dir') }}</th>
                                    <th is='sortable' :column="'isbn'">{{ trans('admin.book.columns.isbn') }}</th>
                                    <th is='sortable' :column="'publisher_id'">{{ trans('admin.book.columns.publisher_id') }}</th>
                                    <th is='sortable' :column="'issue_date'">{{ trans('admin.book.columns.issue_date') }}</th>
                                    <th is='sortable' :column="'cover'">{{ trans('admin.book.columns.cover') }}</th>
                                    <th is='sortable' :column="'format_id'">{{ trans('admin.book.columns.format_id') }}</th>
                                    <th is='sortable' :column="'pages'">{{ trans('admin.book.columns.pages') }}</th>
                                    <th is='sortable' :column="'weight'">{{ trans('admin.book.columns.weight') }}</th>
                                    <th is='sortable' :column="'price'">{{ trans('admin.book.columns.price') }}</th>
                                    
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in collection">
                                    <td>@{{ item.id }}</td>
                                    <td>@{{ item.title }}</td>
                                    <td>@{{ item.availability_id }}</td>
                                    <td>@{{ item.image_dir }}</td>
                                    <td>@{{ item.isbn }}</td>
                                    <td>@{{ item.publisher_id }}</td>
                                    <td>@{{ item.issue_date }}</td>
                                    <td>@{{ item.cover }}</td>
                                    <td>@{{ item.format_id }}</td>
                                    <td>@{{ item.pages }}</td>
                                    <td>@{{ item.weight }}</td>
                                    <td>@{{ item.price }}</td>
                                    
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
                            <a class="btn btn-primary btn-spinner" href="{{ url('admin/books/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.book.actions.create') }}</a>
	                    </div>
                    </div>
                </div>
            </div>
        </div>
    </book-listing>

@endsection