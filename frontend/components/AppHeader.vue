<template>
    <v-app-bar app :dark="authBar" :color="authColor">

        <v-toolbar-title>Content Manager</v-toolbar-title>
        <v-btn text fab small nuxt to="/" class="ml-3">
            <v-icon class="fad fa-home-lg-alt"/>
        </v-btn>

        <v-spacer></v-spacer>

        <v-toolbar-items>
            <template v-if="!authenticated">
                <v-btn text nuxt to="/login">
                    <v-icon class="fal fa-sign-in-alt mr-4" left/>
                    Login
                </v-btn>
                <v-btn text nuxt to="/register">
                    <v-icon class="fal fa-user-plus mr-4" left/>
                    Register
                </v-btn>
            </template>
            <template v-else>
                <v-btn text nuxt to="/dashboard" >
                    <v-icon class="fad fa-file-plus" left/>
                    Create
                </v-btn>

                <v-btn text nuxt to="/topics">
                    <v-icon class="fad fa-list-ul" left/>
                    Topics
                </v-btn>

                <v-btn text>
                    <v-icon class="fad fa-clipboard-list" left/>
                    Posts
                </v-btn>

                <v-btn text @click="logout">
                    <v-icon class="fad fa-sign-out mr-4" left/>
                    Logout
                </v-btn>
            </template>

        </v-toolbar-items>

    </v-app-bar>
</template>

<script>

export default {
    name: "AppHeader",
    data() {
        return {
            dark: false
        }
    },
    computed: {
        authBar() {
            return !this.authenticated ? this.dark = false : this.dark = true
        },

        authColor() {
            return !this.authenticated ? '' : 'primary'
        }
    },

    methods: {
        logout() {
            this.$auth.logout()
        }
    }
}
</script>

<style scoped>

</style>
