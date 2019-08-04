<template>
    <v-app>
        <app-header></app-header>
        <v-content>
            <nuxt/>
            <v-btn
                v-scroll="onScroll"
                v-show="fab"
                fab
                dark
                fixed
                bottom
                right
                color="primary"
                @click="toTop"
            >
                <v-icon>keyboard_arrow_up</v-icon>
            </v-btn>
        </v-content>
        <app-footer></app-footer>
    </v-app>
</template>

<script>
import AppHeader from "../components/AppHeader";
import AppFooter from "../components/AppFooter";

export default {
    components: {AppFooter, AppHeader},

    data: () => ({
        fab: false
    }),

    methods: {
        onScroll(e) {
            if (typeof window === 'undefined') return;
            const top = window.pageYOffset || e.target.scrollTop || 0;
            this.fab = top > 20
        },
        async toTop() {
            await this.$vuetify.goTo(0)
        }
    },
}
</script>

<style>
    html {
        /*word-spacing: 1px;*/
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%;
        -moz-osx-font-smoothing: grayscale;
        -webkit-font-smoothing: antialiased;
        box-sizing: border-box;
    }

    *,
    *:before,
    *:after {
        box-sizing: border-box;
        margin: 0;
    }
</style>
