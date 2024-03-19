import {createApp} from 'vue'
import {Api} from 'ui'

import './style.css'

import App from './App.vue'

import {createRouter} from "vue-router"
import {router} from './router'


Api.setUrl('/')

const data = document.body.dataset?.api

if (data) {
    Api.addResponse(JSON.parse(data) || [])
}

createApp(App)
    .use(createRouter(router))
    .mount('#app')
