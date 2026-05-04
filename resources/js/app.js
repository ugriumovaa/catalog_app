import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'

import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue')
        return pages[`./Pages/${name}.vue`]()
    },

    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) })

        app.use(plugin)
        app.use(ElementPlus)

        app.mount(el)
    },
})
