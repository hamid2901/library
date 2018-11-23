import AppForm from '../app-components/Form/AppForm';

Vue.component('profile-edit-profile-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                email:  '' ,
                email_verified_at:  '' ,
                password:  '' ,
                image_name:  '' ,
                role_id:  '' ,
                status_id:  '' ,
                confirm:  '' ,
                first_name:  '' ,
                last_name:  '' ,
                phone:  '' ,
                profession:  '' ,
                university:  '' ,
                birthdate:  '' ,
                sex:  '' ,
                city:  '' ,
                street:  '' ,
                plate:  '' ,
                alley:  '' ,
                postal_code:  '' ,
                activated:  false ,
                forbidden:  false ,
                language:  '' ,
                
            }
        }
    },
    methods: {
        onSuccess(data) {
            if(data.notify) {
                this.$notify({ type: data.notify.type, title: data.notify.title, text: data.notify.message});
            } else if (data.redirect) {
                window.location.replace(data.redirect);
            }
        }
    }
});