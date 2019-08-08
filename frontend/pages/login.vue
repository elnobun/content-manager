<template>
    <v-container fluid fill-height>
        <v-layout align-center justify-center>
            <v-flex xs12 sm8 md4>
                <v-card elevation="12">

                    <v-card-title class="grey lighten-4">
                        <h2 class="font-weight-light">
                            Login
                        </h2>
                        <v-spacer></v-spacer>
                        <v-icon large :color="!this.valid ? 'red' : 'primary'" class="fa fa-sign-in-alt"/>
                    </v-card-title>

                    <v-divider/>

                    <v-card-text>
                        <v-form
                            @submit.prevent="login" v-model="valid" ref="form" lazy-validation>
                            <v-text-field
                                label="Email"
                                type="email"
                                append-icon="fal fa-mail-bulk"
                                v-model.trim="form.email"
                                :rules="errors.email"
                                required
                            />
                            <v-text-field
                                label="Password"
                                type="password"
                                append-icon="fal fa-key"
                                v-model.trim="form.password"
                                :rules="errors.password"
                                required
                            />

                            <v-btn 
                                block 
                                :color="!this.valid ? 'red white--text' : 'primary'" 
                                class="mt-2" 
                                type="submit">Login</v-btn>

                        </v-form>
                    </v-card-text>

                    <v-card-actions>
                        <p class="ml-2">Dont have an account?
                            <nuxt-link to="/register">Register</nuxt-link>
                        </p>
                    </v-card-actions>

                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
export default {
    name: "login",
    middleware: ['guest'],
    data() {
        return {
            valid: true,
            form: {
                email: '',
                password: ''
            },
        }
    },

    methods: {
        async login() {
            if (this.valid && this.$refs.form.validate()){
                try {
                    await this.$auth.loginWith("local", {
                        data: this.form
                    });
                    this.$router.push({
                        path: this.$route.query.redirect || '/'
                    })
                } catch (e) {
                    return e.response.data.errors
                }
            }
        }
    }
}
</script>

<style scoped>

</style>
