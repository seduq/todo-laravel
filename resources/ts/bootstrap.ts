/**
 * Bootstrap file for setting up Axios, CSRF tokens, and other global configs
 */

// Example: Setup Axios (if you install it)
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Example: Setup Echo for Laravel Broadcasting (if needed)
// import Echo from 'laravel-echo';
// import Pusher from 'pusher-js';
// window.Pusher = Pusher;
// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });

console.log('Bootstrap TS loaded');
