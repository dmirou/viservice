
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
  el: '#app',
  data: {
    sourceCode : 'https://www.youtube.com/watch?v=n9pyOzfPnc4 ',
    videoInfo: ''
  },
  computed: {
    form_method: function () {
      return this.method.toLowerCase();
    },
    form_action: function () {
      return this.$el.action.toLowerCase();
    }
  },
  methods: {
    
    onSubmit: function (event) {
      
      var form = event.target;
      
      this.videoInfo = '';
    
      axios({
        method: form.method,
        url: form.action,
        params: {
          sourceCode: this.sourceCode
        }
      }).then(this.successCallBack)
        .catch(this.errorCallBack);
    },

    successCallBack: function (response) {
      this.videoInfo = JSON.stringify(response.data);
    },

    errorCallBack: function (error) {
      this.videoInfo = JSON.stringify(error.response.data);
    }
  }
});
