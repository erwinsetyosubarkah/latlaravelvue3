import './bootstrap';
import { createApp } from 'vue'
import {createBootstrap} from 'bootstrap-vue-next'

import App from '@/App.vue'

//import config router
import router from '@/router'

// Add the necessary CSS
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue-next/dist/bootstrap-vue-next.css'

const app = createApp(App)

//gunakan "router" di Vue dengan plugin "use"
app.use(router);
app.use(createBootstrap()) // Important
app.mount('#app')
