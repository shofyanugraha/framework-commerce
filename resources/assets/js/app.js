/*
 |--------------------------------------------------------------------------
 | Laravel Spark Bootstrap
 |--------------------------------------------------------------------------
 |
 | First, we will load all of the "core" dependencies for Spark which are
 | libraries such as Vue and jQuery. This also loads the Spark helpers
 | for things such as HTTP calls, forms, and form validation errors.
 |
 | Next, we'll create the root Vue application for Spark. This will start
 | the entire application and attach it to the DOM. Of course, you may
 | customize this script as you desire and load your own components.
 |
 */
require('spark-bootstrap');

// Load JS Storage
require('../../../node_modules/js-cookie/src/js.cookie');
require('../../../node_modules/js-storage/js.storage.min');

// Load Jquery Priceformat
require('../../../node_modules/jquery-price-format/jquery.priceformat.min.js');

// Load Jquery downCount
require('../../../public/plugins/downcount/jquery.downCount.js');

// Load Jquery downCount
require('../../../public/plugins/downcount/jquery.downCount.js');

// Load Jquery magnify
require('../../../node_modules/magnify/dist/js/jquery.magnify.js');

// Global Vars
window.app = {
    host: "",
    methods: {
        priceFormat: function(){
            $('.priceformat').priceFormat({
                prefix: 'Rp. ',
                centsSeparator: ',',
                centsLimit: 0,
                thousandsSeparator: '.'
            })
        }
    }
};


require('./components/bootstrap');

var app = new Vue({
    mixins: [require('spark')],
    data: {
        showModal: true
    }
});
