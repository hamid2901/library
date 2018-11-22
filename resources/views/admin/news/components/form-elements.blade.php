<div class="form-group row align-items-center" :class="{'has-danger': errors.has('title'), 'has-success': this.fields.title && this.fields.title.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.news.columns.title') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.title" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('title'), 'form-control-success': this.fields.title && this.fields.title.valid}" id="title" name="title" placeholder="{{ trans('admin.news.columns.title') }}">
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('content'), 'has-success': this.fields.content && this.fields.content.valid }">
    <label for="content" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.news.columns.content') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.content" v-validate="''" id="content" name="content" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('content')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('content') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('image_dir'), 'has-success': this.fields.image_dir && this.fields.image_dir.valid }">
    <label for="image_dir" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.news.columns.image_dir') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.image_dir" v-validate="''" id="image_dir" name="image_dir" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('image_dir')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('image_dir') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('user_id'), 'has-success': this.fields.user_id && this.fields.user_id.valid }">
    <label for="user_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.news.columns.user_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.user_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('user_id'), 'form-control-success': this.fields.user_id && this.fields.user_id.valid}" id="user_id" name="user_id" placeholder="{{ trans('admin.news.columns.user_id') }}">
        <div v-if="errors.has('user_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('user_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('confirm'), 'has-success': this.fields.confirm && this.fields.confirm.valid }">
    <label for="confirm" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.news.columns.confirm') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.confirm" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('confirm'), 'form-control-success': this.fields.confirm && this.fields.confirm.valid}" id="confirm" name="confirm" placeholder="{{ trans('admin.news.columns.confirm') }}">
        <div v-if="errors.has('confirm')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('confirm') }}</div>
    </div>
</div>


