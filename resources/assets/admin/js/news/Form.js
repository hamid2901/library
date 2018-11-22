import AppForm from '../app-components/Form/AppForm';

Vue.component('news-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  '' ,
                content:  '' ,
                image_dir:  '' ,
                user_id:  '' ,
                confirm:  '' ,
                
            }
        }
    }

});