import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
 


// Conditionally import CSS based on page type
const loadPageSpecificCSS = (pageName) => {
    // console.log(pageName);
    if (pageName.startsWith('Admin/')) {
        // console.log('Loading admin CSS');
       import('@/Assets/Css/backend/alt/adminlte.components.css')
      //  import('@/Assets/Css/backend/alt/adminlte.components.css.map')
       import('@/Assets/Css/backend/alt/adminlte.components.min.css') 
      //  import('@/Assets/Css/backend/alt/adminlte.components.min.css.map') 
       import('@/Assets/Css/backend/alt/adminlte.core.css') 
      //  import('@/Assets/Css/backend/alt/adminlte.core.css.map') 
       import('@/Assets/Css/backend/alt/adminlte.core.min.css') 
       import('@/Assets/Css/backend/alt/adminlte.extra-components.css') 
       import('@/Assets/Css/backend/alt/adminlte.extra-components.min.css') 
      //  import('@/Assets/Css/backend/alt/adminlte.extra-components.min.css.map') 
      //  import('@/Assets/Css/backend/alt/adminlte.extra-components.min.css.map') 
       import('@/Assets/Css/backend/alt/adminlte.pages.css') 
      //  import('@/Assets/Css/backend/alt/adminlte.pages.css.map') 
       import('@/Assets/Css/backend/alt/adminlte.pages.min.css') 
       import('@/Assets/Css/backend/alt/adminlte.pages.min.css') 
      //  import('@/Assets/Css/backend/alt/adminlte.pages.min.css.map') 
       import('@/Assets/Css/backend/alt/adminlte.plugins.css') 
      //  import('@/Assets/Css/backend/alt/adminlte.pages.min.css.map') 
       import('@/Assets/Css/backend/alt/adminlte.plugins.css') 
      //  import('@/Assets/Css/backend/alt/adminlte.plugins.css.map') 
       import('@/Assets/Css/backend/alt/adminlte.plugins.min.css') 
      //  import('@/Assets/Css/backend/alt/adminlte.plugins.min.css.map') 
       import('@/Assets/Css/backend/adminlte.css') 
      //  import('@/Assets/Css/backend/adminlte.css.map') 
       import('@/Assets/Css/backend/adminlte.min.css') 
      //  import('@/Assets/Css/backend/adminlte.min.css.map') 
    } else {
        //  console.log('Loading frontend CSS');
        import('@/Assets/Css/fontend/style.css');
        import('@/Assets/Css/fontend/bootstrap.min.css');
        import('@/Assets/Css/fontend/scss/bootstrap.scss');
        // import('@/Assets/Css/fontend/scss/bootstrap/scss/forms/_floating-labels.scss');
        // import('@/Assets/Css/fontend/scss/bootstrap/scss/forms/_form-check.scss');
        // import('@/Assets/Css/fontend/scss/bootstrap/scss/forms/_form-control.scss');
        // import('@/Assets/Css/fontend/scss/bootstrap/scss/forms/_form-range.scss');
        // import('@/Assets/Css/fontend/scss/bootstrap/scss/forms/_form-select.scss');
        // import('@/Assets/Css/fontend/scss/bootstrap/scss/forms/_form-text.scss');
        // import('@/Assets/Css/fontend/scss/bootstrap/scss/forms/_input-group.scss');
        // import('@/Assets/Css/fontend/scss/bootstrap/scss/forms/_labels.scss');
        // import('@/Assets/Css/fontend/scss/bootstrap/scss/forms/_validation.scss');
    }
}


createInertiaApp({
  resolve: name => {

    loadPageSpecificCSS(name);

    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    const page = pages[`./Pages/${name}.vue`]

    if (!page) {
      console.error(`❌ Page not found: ./Pages/${name}.vue`)
    }

    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
})

 
