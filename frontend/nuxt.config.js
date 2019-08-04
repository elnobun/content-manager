import pkg from "./package";

export default {
    mode: 'universal',

    /*
    ** Headers of the page
    */
    head: {
        title: pkg.name,
        meta: [
            {charset: 'utf-8'},
            {name: 'viewport', content: 'width=device-width, initial-scale=1'},
            {hid: 'description', name: 'description', content: pkg.description}
        ],
        link: [
            {rel: 'icon', type: 'image/x-icon', href: '/favicon.ico'},
            {
                rel: 'stylesheet',
                href: 'https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons'
            },
            {rel: 'stylesheet', href: 'https://pro.fontawesome.com/releases/v5.10.1/css/all.css'}
        ]
    },

    /*
    ** Customize the progress-bar color
    */
    loading: {color: '#fff'},

    /*
    ** Global CSS
    */
    css: [],

    /*
    ** Plugins to load before mounting the App
    */
    plugins: [
        '@plugins/vuetify',
        '@plugins/mixins/user'
    ],

    /*
    ** Nuxt.js modules
    */
    modules: [
        // Doc: https://axios.nuxtjs.org/usage
        '@nuxtjs/axios',
        '@nuxtjs/auth'
    ],
    /*
    ** Axios module configuration
    */
    axios: {
        // See https://github.com/nuxt-community/axios-module#options
        baseURL: "http://backend.test/api"
    },

    auth: {
        endpoints: {
            login: {
                url: 'login',
                method: 'post',
                propertyName: "meta.token"
            },

            user: {
                url: 'user',
                method: 'get',
                propertyName: 'data'
            },

            logout: {
                url: 'logout',
                method: 'post'
            }
        }
    },

    /*
    ** Build configuration
    */
    build: {
        /*
        ** You can extend webpack config here
        */
        extend(config, ctx) {

        }
    }
};
