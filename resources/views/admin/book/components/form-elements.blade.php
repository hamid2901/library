<div class="form-group row align-items-center" :class="{'has-danger': errors.has('title'), 'has-success': this.fields.title && this.fields.title.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.book.columns.title') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.title" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('title'), 'form-control-success': this.fields.title && this.fields.title.valid}" id="title" name="title" placeholder="{{ trans('admin.book.columns.title') }}">
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('availability_id'), 'has-success': this.fields.availability_id && this.fields.availability_id.valid }">
    <label for="availability_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.book.columns.availability_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.availability_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('availability_id'), 'form-control-success': this.fields.availability_id && this.fields.availability_id.valid}" id="availability_id" name="availability_id" placeholder="{{ trans('admin.book.columns.availability_id') }}">
        <div v-if="errors.has('availability_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('availability_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('image_dir'), 'has-success': this.fields.image_dir && this.fields.image_dir.valid }">
    <label for="image_dir" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.book.columns.image_dir') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.image_dir" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('image_dir'), 'form-control-success': this.fields.image_dir && this.fields.image_dir.valid}" id="image_dir" name="image_dir" placeholder="{{ trans('admin.book.columns.image_dir') }}">
        <div v-if="errors.has('image_dir')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('image_dir') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('isbn'), 'has-success': this.fields.isbn && this.fields.isbn.valid }">
    <label for="isbn" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.book.columns.isbn') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.isbn" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('isbn'), 'form-control-success': this.fields.isbn && this.fields.isbn.valid}" id="isbn" name="isbn" placeholder="{{ trans('admin.book.columns.isbn') }}">
        <div v-if="errors.has('isbn')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('isbn') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('publisher_id'), 'has-success': this.fields.publisher_id && this.fields.publisher_id.valid }">
    <label for="publisher_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.book.columns.publisher_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.publisher_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('publisher_id'), 'form-control-success': this.fields.publisher_id && this.fields.publisher_id.valid}" id="publisher_id" name="publisher_id" placeholder="{{ trans('admin.book.columns.publisher_id') }}">
        <div v-if="errors.has('publisher_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('publisher_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': this.fields.description && this.fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.book.columns.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.description" v-validate="''" id="description" name="description" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('issue_date'), 'has-success': this.fields.issue_date && this.fields.issue_date.valid }">
    <label for="issue_date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.book.columns.issue_date') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.issue_date" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('issue_date'), 'form-control-success': this.fields.issue_date && this.fields.issue_date.valid}" id="issue_date" name="issue_date" placeholder="{{ trans('admin.book.columns.issue_date') }}">
        <div v-if="errors.has('issue_date')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('issue_date') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cover'), 'has-success': this.fields.cover && this.fields.cover.valid }">
    <label for="cover" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.book.columns.cover') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cover" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cover'), 'form-control-success': this.fields.cover && this.fields.cover.valid}" id="cover" name="cover" placeholder="{{ trans('admin.book.columns.cover') }}">
        <div v-if="errors.has('cover')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cover') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('format_id'), 'has-success': this.fields.format_id && this.fields.format_id.valid }">
    <label for="format_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.book.columns.format_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.format_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('format_id'), 'form-control-success': this.fields.format_id && this.fields.format_id.valid}" id="format_id" name="format_id" placeholder="{{ trans('admin.book.columns.format_id') }}">
        <div v-if="errors.has('format_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('format_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('pages'), 'has-success': this.fields.pages && this.fields.pages.valid }">
    <label for="pages" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.book.columns.pages') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.pages" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('pages'), 'form-control-success': this.fields.pages && this.fields.pages.valid}" id="pages" name="pages" placeholder="{{ trans('admin.book.columns.pages') }}">
        <div v-if="errors.has('pages')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('pages') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('weight'), 'has-success': this.fields.weight && this.fields.weight.valid }">
    <label for="weight" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.book.columns.weight') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.weight" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('weight'), 'form-control-success': this.fields.weight && this.fields.weight.valid}" id="weight" name="weight" placeholder="{{ trans('admin.book.columns.weight') }}">
        <div v-if="errors.has('weight')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('weight') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('price'), 'has-success': this.fields.price && this.fields.price.valid }">
    <label for="price" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.book.columns.price') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.price" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('price'), 'form-control-success': this.fields.price && this.fields.price.valid}" id="price" name="price" placeholder="{{ trans('admin.book.columns.price') }}">
        <div v-if="errors.has('price')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('price') }}</div>
    </div>
</div>


