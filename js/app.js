/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import BootstrapVue from 'bootstrap-vue' //Importing

import moment from 'moment';
import 'moment/locale/vi'  // without this line it didn't work
moment.locale('vi')

Vue.filter('formatDate', function(value) {
    if (value) {
        return moment(value).fromNow()
    }
});

Vue.use(BootstrapVue) // Telling Vue to use this in whole application

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('img-uploader', require('./components/ImgUploader.vue').default);
Vue.component('new-comic', require('./components/NewComic.vue').default);
Vue.component('rec-comic', require('./components/RecommendComic.vue').default);
Vue.component('cat-menu', require('./components/CatMenu.vue').default);
Vue.component('author-menu', require('./components/AuthorMenu.vue').default);
Vue.component('nav-search', require('./components/Search.vue').default);
Vue.component('rating-form', require('./components/RatingForm.vue').default);
Vue.component('rating-cmt', require('./components/RatingCmt.vue').default);
Vue.component('rating-table', require('./components/RatingTable.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
