require('./adminlte');
window.Vue = require('vue');

Vue.component('light-box', require('./components/LightBox.vue').default);

// Sweetalert2
import Swal from 'sweetalert2';
const Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000
});
window.$swal = Swal;
window.$toast = Toast;

import Confirm from "./confirm";
window.$confirm = new Confirm;

// const app = new Vue({
//     el: '#app',
// });
