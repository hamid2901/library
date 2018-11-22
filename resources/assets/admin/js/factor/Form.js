import AppForm from '../app-components/Form/AppForm';

Vue.component('factor-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                borrow_status:  '' ,
                quantity:  '' ,
                borrow_date:  '' ,
                reserve_date:  '' ,
                duration:  '' ,
                
            }
        }
    }

});