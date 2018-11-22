import AppForm from '../app-components/Form/AppForm';

Vue.component('book-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  '' ,
                availability_id:  '' ,
                image_dir:  '' ,
                isbn:  '' ,
                publisher_id:  '' ,
                description:  '' ,
                issue_date:  '' ,
                cover:  '' ,
                format_id:  '' ,
                pages:  '' ,
                weight:  '' ,
                price:  '' ,
                
            }
        }
    }

});