import AppForm from '../app-components/Form/AppForm';

Vue.component('author-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                first_name:  '' ,
                last_name:  '' ,
                role_id:  '' ,
                
            }
        }
    }

});