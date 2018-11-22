import AppForm from '../app-components/Form/AppForm';

Vue.component('book-comment-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                
            }
        }
    }

});