<div class="form-group row align-items-center" :class="{'has-danger': errors.has('title'), 'has-success': this.fields.title && this.fields.title.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.article.columns.title') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.title" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('title'), 'form-control-success': this.fields.title && this.fields.title.valid}" id="title" name="title" placeholder="{{ trans('admin.article.columns.title') }}">
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('publish_date'), 'has-success': this.fields.publish_date && this.fields.publish_date.valid }">
    <label for="publish_date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.article.columns.publish_date') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.publish_date" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('publish_date'), 'form-control-success': this.fields.publish_date && this.fields.publish_date.valid}" id="publish_date" name="publish_date" placeholder="{{ trans('admin.article.columns.publish_date') }}">
        <div v-if="errors.has('publish_date')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('publish_date') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': this.fields.description && this.fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.article.columns.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.description" v-validate="''" id="description" name="description" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('article_filename'), 'has-success': this.fields.article_filename && this.fields.article_filename.valid }">
    <label for="article_filename" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.article.columns.article_filename') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.article_filename" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('article_filename'), 'form-control-success': this.fields.article_filename && this.fields.article_filename.valid}" id="article_filename" name="article_filename" placeholder="{{ trans('admin.article.columns.article_filename') }}">
        <div v-if="errors.has('article_filename')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('article_filename') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('confirm'), 'has-success': this.fields.confirm && this.fields.confirm.valid }">
    <label for="confirm" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.article.columns.confirm') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.confirm" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('confirm'), 'form-control-success': this.fields.confirm && this.fields.confirm.valid}" id="confirm" name="confirm" placeholder="{{ trans('admin.article.columns.confirm') }}">
        <div v-if="errors.has('confirm')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('confirm') }}</div>
    </div>
</div>


