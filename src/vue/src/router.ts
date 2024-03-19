import { createWebHistory, type RouterOptions } from 'vue-router'
import { Translate } from 'ui'

import TDescription from './pages/TDescription.vue'
import TIndex from './pages/TIndex.vue'

const routes: RouterOptions['routes'] = [
  {
    name: Translate.getSync('main'),
    component: TDescription,
    path: '/description'
  },
  {
    name: Translate.getSync('shop'),
    component: TIndex,
    path: '/'
  }
]

export const router: RouterOptions = {
  history: createWebHistory(import.meta.env.BASE_URL),
  routes
}
