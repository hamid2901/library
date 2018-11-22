import AppForm from '../app-components/Form/AppForm';

Vue.component('article-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  '' ,
                publish_date:  '' ,
                description:  '' ,
                article_filename:  '' ,
                confirm:  '' ,
                
            }
        }
    }

});