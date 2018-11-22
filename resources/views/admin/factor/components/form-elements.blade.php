<div class="form-group row align-items-center" :class="{'has-danger': errors.has('borrow_status'), 'has-success': this.fields.borrow_status && this.fields.borrow_status.valid }">
    <label for="borrow_status" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.factor.columns.borrow_status') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.borrow_status" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('borrow_status'), 'form-control-success': this.fields.borrow_status && this.fields.borrow_status.valid}" id="borrow_status" name="borrow_status" placeholder="{{ trans('admin.factor.columns.borrow_status') }}">
        <div v-if="errors.has('borrow_status')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('borrow_status') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('quantity'), 'has-success': this.fields.quantity && this.fields.quantity.valid }">
    <label for="quantity" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.factor.columns.quantity') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.quantity" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('quantity'), 'form-control-success': this.fields.quantity && this.fields.quantity.valid}" id="quantity" name="quantity" placeholder="{{ trans('admin.factor.columns.quantity') }}">
        <div v-if="errors.has('quantity')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('quantity') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('borrow_date'), 'has-success': this.fields.borrow_date && this.fields.borrow_date.valid }">
    <label for="borrow_date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.factor.columns.borrow_date') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.borrow_date" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('borrow_date'), 'form-control-success': this.fields.borrow_date && this.fields.borrow_date.valid}" id="borrow_date" name="borrow_date" placeholder="{{ trans('admin.factor.columns.borrow_date') }}">
        <div v-if="errors.has('borrow_date')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('borrow_date') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('reserve_date'), 'has-success': this.fields.reserve_date && this.fields.reserve_date.valid }">
    <label for="reserve_date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.factor.columns.reserve_date') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.reserve_date" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('reserve_date'), 'form-control-success': this.fields.reserve_date && this.fields.reserve_date.valid}" id="reserve_date" name="reserve_date" placeholder="{{ trans('admin.factor.columns.reserve_date') }}">
        <div v-if="errors.has('reserve_date')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('reserve_date') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('duration'), 'has-success': this.fields.duration && this.fields.duration.valid }">
    <label for="duration" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.factor.columns.duration') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.duration" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('duration'), 'form-control-success': this.fields.duration && this.fields.duration.valid}" id="duration" name="duration" placeholder="{{ trans('admin.factor.columns.duration') }}">
        <div v-if="errors.has('duration')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('duration') }}</div>
    </div>
</div>


