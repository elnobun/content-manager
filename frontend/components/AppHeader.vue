<template>
    <v-app-bar app>

        <v-toolbar-title>Content Manager</v-toolbar-title>
        <v-btn text fab small nuxt to="/" class="ml-3"><v-icon class="fas fa-home" /></v-btn>

        <v-spacer></v-spacer>

        <v-toolbar-items>
            <v-btn text nuxt to="/login"><v-icon class="fal fa-sign-in-alt mr-4" left />Login</v-btn>
            <v-btn text nuxt to="/register"><v-icon class="fal fa-user-plus mr-4" left />Register</v-btn>
        </v-toolbar-items>

    </v-app-bar>
</template>

<script>
export default {
    name: "AppHeader"
}
</script>

<style scoped>

</style>
