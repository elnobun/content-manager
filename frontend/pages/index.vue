<template>
    <v-container>
        <h2>Welcome {{ user ? user.name : 'To Laravel Nuxt Application' }}</h2>
    </v-container>
</template>

<script>

export default {
    // middleware: ['auth']
}
</script>

<style>

</style>
