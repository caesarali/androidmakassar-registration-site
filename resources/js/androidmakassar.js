require('./adminlte');
window.Vue = require('vue');

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

// const app = new Vue({
//     el: '#app',
// });
