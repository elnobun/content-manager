<template>
    <v-container fluid fill-height>
        <v-layout align-center justify-center>
            <v-flex xs12 sm8 md4>
                <v-card elevation="12">

                    <v-card-title class="grey lighten-4">
                        <h2 class="font-weight-light">
                            Register
                        </h2>
                        <v-spacer></v-spacer>
                        <v-icon large :color="!this.valid ? 'red' : 'primary'" class="fa fa-users-medical"/>
                    </v-card-title>

                    <v-divider/>

                    <v-card-text>
                        <v-form @submit.prevent="register" v-model="valid" ref="form" lazy-validation>
                            <v-text-field
                                label="Name"
                                type="text"
                                append-icon="fal fa-user-alt"
                                v-model.trim="form.name"
                                :rules="errors.name"
                                required
                            />
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

                            <v-btn block :color="!this.valid ? 'red white--text' : 'primary'" class="mt-2" type="submit">Register</v-btn>

                        </v-form>
                    </v-card-text>

                    <v-card-actions>
                        <p class="ml-2">Have an account already?
                            <nuxt-link to="/login">Login</nuxt-link>
                        </p>
                    </v-card-actions>

                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
export default {
    name: "register",
    data() {
        return {
            valid: true,
            middleware: ['guest'],
            form: {
                name: '',
                email: '',
                password: ''
            }
        }
    },

    methods: {
        async register() {
            if (this.valid && this.$refs.form.validate()) {
                try {
                    // register user
                    await this.$axios.$post('register', this.form);
                    // login the registered user
                    await this.$auth.loginWith('local', {
                        data: {
                            email: this.form.email,
                            password: this.form.password
                        }
                    });
                    // redirect to the home page
                    this.$router.push({
                        path: this.$route.query.redirect || '/profile'
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
