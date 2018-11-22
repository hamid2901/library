import AppForm from '../app-components/Form/AppForm';

Vue.component('news-comment-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                
            }
        }
    }

});