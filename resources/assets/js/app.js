
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
      
      console.log('AjaxForm submission: ERROR');
    
      if (error.response) {
        // The request was made and the server responded with a status code
        // that falls out of the range of 2xx
        console.log(error.response.data);
        console.log(error.response.status);
      } else if (error.request) {
        // The request was made but no response was received
        // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
        // http.ClientRequest in node.js
        console.log(error.request);
      } else {
        // Something happened in setting up the request that triggered an Error
        console.log('Error', error.message);
      }
      console.log(error.config);
    }
  }
});
