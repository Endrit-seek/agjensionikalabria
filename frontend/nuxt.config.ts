// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  css: ['vuetify/lib/styles/main.sass', '@mdi/font/css/materialdesignicons.min.css'],
  build: {
    transpile: [
      'vuetify'
    ],
  },
  devtools: { enabled: true },

  modules:
  [
    '@pinia/nuxt',
    '@pinia-plugin-persistedstate/nuxt',
    ['@vee-validate/nuxt', {
      // disable or enable auto imports
      autoImports: true,
      // Use different names for components
      componentNames: {
        Form: 'VeeForm',
        Field: 'VeeField',
        FieldArray: 'VeeFieldArray',
        ErrorMessage: 'VeeErrorMessage',
      },
    }]
  ],
  pinia:
  {
    autoImports: [
      // automatically imports `defineStore`
      'defineStore', // import { defineStore } from 'pinia'
      // automatically imports `defineStore` as `definePiniaStore`
      ['defineStore', 'definePiniaStore'], // import { defineStore as definePiniaStore } from 'pinia'
    ]
  },
  imports: {
    dirs: ['./stores'],
  },
  routeRules: {
    // Homepage pre-rendered at build time
    // '/': { prerender: true },
    // '/serviset': { prerender: true },
    // // Product page generated on-demand, revalidates in background
    // '/products/**': { swr: true },
    // // Blog post generated on-demand once until next deploy
    // '/blog/**': { isr: true },
    // // Admin dashboard renders only on client-side
    // '/admin/**': { ssr: false },
    // // Add cors headers on API routes
    // '/api/**': { cors: true },
    // // Redirects legacy urls
    // '/old-page': { redirect: '/new-page' }
  },
  vite: {
    ssr: {
      noExternal: ['moment']
    }
  }
})
