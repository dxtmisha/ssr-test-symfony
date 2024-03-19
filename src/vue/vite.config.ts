import {defineConfig} from 'vite'
import vue from '@vitejs/plugin-vue'

import uiVitePlugin from 'ui/vite-plugin-vue-ui'

// https://vitejs.dev/config/
export default defineConfig({
    plugins: [
        uiVitePlugin({
            importComponents: true,
            icon: true,
            flag: false,
            style: 'c2'
        }),
        vue()
    ]
})
