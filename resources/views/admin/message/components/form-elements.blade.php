<div class="form-group row align-items-center" :class="{'has-danger': errors.has('user_id'), 'has-success': this.fields.user_id && this.fields.user_id.valid }">
    <label for="user_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.message.columns.user_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.user_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('user_id'), 'form-control-success': this.fields.user_id && this.fields.user_id.valid}" id="user_id" name="user_id" placeholder="{{ trans('admin.message.columns.user_id') }}">
        <div v-if="errors.has('user_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('user_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('content'), 'has-success': this.fields.content && this.fields.content.valid }">
    <label for="content" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.message.columns.content') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.content" v-validate="''" id="content" name="content" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('content')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('content') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('email'), 'has-success': this.fields.email && this.fields.email.valid }">
    <label for="email" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.message.columns.email') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email" v-validate="'email'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('email'), 'form-control-success': this.fields.email && this.fields.email.valid}" id="email" name="email" placeholder="{{ trans('admin.message.columns.email') }}">
        <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('admin_id'), 'has-success': this.fields.admin_id && this.fields.admin_id.valid }">
    <label for="admin_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.message.columns.admin_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.admin_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('admin_id'), 'form-control-success': this.fields.admin_id && this.fields.admin_id.valid}" id="admin_id" name="admin_id" placeholder="{{ trans('admin.message.columns.admin_id') }}">
        <div v-if="errors.has('admin_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('admin_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('create_at'), 'has-success': this.fields.create_at && this.fields.create_at.valid }">
    <label for="create_at" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.message.columns.create_at') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.create_at" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('create_at'), 'form-control-success': this.fields.create_at && this.fields.create_at.valid}" id="create_at" name="create_at" placeholder="{{ trans('admin.message.columns.create_at') }}">
        <div v-if="errors.has('create_at')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('create_at') }}</div>
    </div>
</div>


