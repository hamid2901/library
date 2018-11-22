<div class="form-group row align-items-center" :class="{'has-danger': errors.has('email'), 'has-success': this.fields.email && this.fields.email.valid }">
    <label for="email" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.email') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email" v-validate="'required|email'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('email'), 'form-control-success': this.fields.email && this.fields.email.valid}" id="email" name="email" placeholder="{{ trans('admin.user.columns.email') }}">
        <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('birthdate'), 'has-success': this.fields.birthdate && this.fields.birthdate.valid }">
    <label for="birthdate" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.birthdate') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.birthdate" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('birthdate'), 'form-control-success': this.fields.birthdate && this.fields.birthdate.valid}" id="birthdate" name="birthdate" placeholder="{{ trans('admin.user.columns.birthdate') }}">
        <div v-if="errors.has('birthdate')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('birthdate') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('forbidden'), 'has-success': this.fields.forbidden && this.fields.forbidden.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="forbidden" type="checkbox" v-model="form.forbidden" v-validate="''" data-vv-name="forbidden"  name="forbidden_fake_element">
        <label class="form-check-label" for="forbidden">
            {{ trans('admin.user.columns.forbidden') }}
        </label>
        <input type="hidden" name="forbidden" :value="form.forbidden">
        <div v-if="errors.has('forbidden')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('forbidden') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('activated'), 'has-success': this.fields.activated && this.fields.activated.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="activated" type="checkbox" v-model="form.activated" v-validate="''" data-vv-name="activated"  name="activated_fake_element">
        <label class="form-check-label" for="activated">
            {{ trans('admin.user.columns.activated') }}
        </label>
        <input type="hidden" name="activated" :value="form.activated">
        <div v-if="errors.has('activated')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('activated') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('postal_code'), 'has-success': this.fields.postal_code && this.fields.postal_code.valid }">
    <label for="postal_code" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.postal_code') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.postal_code" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('postal_code'), 'form-control-success': this.fields.postal_code && this.fields.postal_code.valid}" id="postal_code" name="postal_code" placeholder="{{ trans('admin.user.columns.postal_code') }}">
        <div v-if="errors.has('postal_code')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('postal_code') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('alley'), 'has-success': this.fields.alley && this.fields.alley.valid }">
    <label for="alley" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.alley') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.alley" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('alley'), 'form-control-success': this.fields.alley && this.fields.alley.valid}" id="alley" name="alley" placeholder="{{ trans('admin.user.columns.alley') }}">
        <div v-if="errors.has('alley')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('alley') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('plate'), 'has-success': this.fields.plate && this.fields.plate.valid }">
    <label for="plate" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.plate') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.plate" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('plate'), 'form-control-success': this.fields.plate && this.fields.plate.valid}" id="plate" name="plate" placeholder="{{ trans('admin.user.columns.plate') }}">
        <div v-if="errors.has('plate')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('plate') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('street'), 'has-success': this.fields.street && this.fields.street.valid }">
    <label for="street" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.street') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.street" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('street'), 'form-control-success': this.fields.street && this.fields.street.valid}" id="street" name="street" placeholder="{{ trans('admin.user.columns.street') }}">
        <div v-if="errors.has('street')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('street') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('city'), 'has-success': this.fields.city && this.fields.city.valid }">
    <label for="city" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.city') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.city" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('city'), 'form-control-success': this.fields.city && this.fields.city.valid}" id="city" name="city" placeholder="{{ trans('admin.user.columns.city') }}">
        <div v-if="errors.has('city')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('city') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sex'), 'has-success': this.fields.sex && this.fields.sex.valid }">
    <label for="sex" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.sex') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.sex" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('sex'), 'form-control-success': this.fields.sex && this.fields.sex.valid}" id="sex" name="sex" placeholder="{{ trans('admin.user.columns.sex') }}">
        <div v-if="errors.has('sex')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sex') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('university'), 'has-success': this.fields.university && this.fields.university.valid }">
    <label for="university" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.university') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.university" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('university'), 'form-control-success': this.fields.university && this.fields.university.valid}" id="university" name="university" placeholder="{{ trans('admin.user.columns.university') }}">
        <div v-if="errors.has('university')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('university') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('email_verified_at'), 'has-success': this.fields.email_verified_at && this.fields.email_verified_at.valid }">
    <label for="email_verified_at" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.email_verified_at') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.email_verified_at" :config="datetimePickerConfig" v-validate="'date_format:YYYY-MM-DD HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('email_verified_at'), 'form-control-success': this.fields.email_verified_at && this.fields.email_verified_at.valid}" id="email_verified_at" name="email_verified_at" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('email_verified_at')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email_verified_at') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('profession'), 'has-success': this.fields.profession && this.fields.profession.valid }">
    <label for="profession" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.profession') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.profession" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('profession'), 'form-control-success': this.fields.profession && this.fields.profession.valid}" id="profession" name="profession" placeholder="{{ trans('admin.user.columns.profession') }}">
        <div v-if="errors.has('profession')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('profession') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('phone'), 'has-success': this.fields.phone && this.fields.phone.valid }">
    <label for="phone" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.phone') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.phone" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('phone'), 'form-control-success': this.fields.phone && this.fields.phone.valid}" id="phone" name="phone" placeholder="{{ trans('admin.user.columns.phone') }}">
        <div v-if="errors.has('phone')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('phone') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('last_name'), 'has-success': this.fields.last_name && this.fields.last_name.valid }">
    <label for="last_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.last_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.last_name" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('last_name'), 'form-control-success': this.fields.last_name && this.fields.last_name.valid}" id="last_name" name="last_name" placeholder="{{ trans('admin.user.columns.last_name') }}">
        <div v-if="errors.has('last_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('last_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('first_name'), 'has-success': this.fields.first_name && this.fields.first_name.valid }">
    <label for="first_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.first_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.first_name" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('first_name'), 'form-control-success': this.fields.first_name && this.fields.first_name.valid}" id="first_name" name="first_name" placeholder="{{ trans('admin.user.columns.first_name') }}">
        <div v-if="errors.has('first_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('first_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('confirm'), 'has-success': this.fields.confirm && this.fields.confirm.valid }">
    <label for="confirm" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.confirm') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.confirm" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('confirm'), 'form-control-success': this.fields.confirm && this.fields.confirm.valid}" id="confirm" name="confirm" placeholder="{{ trans('admin.user.columns.confirm') }}">
        <div v-if="errors.has('confirm')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('confirm') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('status_id'), 'has-success': this.fields.status_id && this.fields.status_id.valid }">
    <label for="status_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.status_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.status_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('status_id'), 'form-control-success': this.fields.status_id && this.fields.status_id.valid}" id="status_id" name="status_id" placeholder="{{ trans('admin.user.columns.status_id') }}">
        <div v-if="errors.has('status_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('status_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('role_id'), 'has-success': this.fields.role_id && this.fields.role_id.valid }">
    <label for="role_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.role_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.role_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('role_id'), 'form-control-success': this.fields.role_id && this.fields.role_id.valid}" id="role_id" name="role_id" placeholder="{{ trans('admin.user.columns.role_id') }}">
        <div v-if="errors.has('role_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('role_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('image_name'), 'has-success': this.fields.image_name && this.fields.image_name.valid }">
    <label for="image_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.image_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.image_name" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('image_name'), 'form-control-success': this.fields.image_name && this.fields.image_name.valid}" id="image_name" name="image_name" placeholder="{{ trans('admin.user.columns.image_name') }}">
        <div v-if="errors.has('image_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('image_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('password'), 'has-success': this.fields.password && this.fields.password.valid }">
    <label for="password" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.password') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="password" v-model="form.password" v-validate="'confirmed:password_confirmation|min:7'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('password'), 'form-control-success': this.fields.password && this.fields.password.valid}" id="password" name="password" placeholder="{{ trans('admin.user.columns.password') }}">
        <div v-if="errors.has('password')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('password') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('password_confirmation'), 'has-success': this.fields.password_confirmation && this.fields.password_confirmation.valid }">
    <label for="password_confirmation" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.password_repeat') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="password" v-model="form.password_confirmation" v-validate="'confirmed:password_confirmation|min:7'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('password_confirmation'), 'form-control-success': this.fields.password_confirmation && this.fields.password_confirmation.valid}" id="password_confirmation" name="password_confirmation" placeholder="{{ trans('admin.user.columns.password') }}">
        <div v-if="errors.has('password_confirmation')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('password') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('language'), 'has-success': this.fields.language && this.fields.language.valid }">
    <label for="language" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.language') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.language" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('language'), 'form-control-success': this.fields.language && this.fields.language.valid}" id="language" name="language" placeholder="{{ trans('admin.user.columns.language') }}">
        <div v-if="errors.has('language')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('language') }}</div>
    </div>
</div>


