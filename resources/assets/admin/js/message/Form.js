import AppForm from '../app-components/Form/AppForm';

Vue.component('message-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                user_id:  '' ,
                content:  '' ,
                email:  '' ,
                admin_id:  '' ,
                create_at:  '' ,
                
            }
        }
    }

});