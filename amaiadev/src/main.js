import Vue from 'vue'
import App from './App.vue'
import { store } from './stores/store'

import PrevNext from './components/PrevNext.vue'



import './assets/css/styles.css'
import './assets/css/responsive.css'
import './custom-select.js'
Vue.config.productionTip = false


new Vue({
  store,
  render: h => h(App)
}).$mount('#app')
