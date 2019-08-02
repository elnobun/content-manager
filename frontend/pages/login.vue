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
                        <v-icon large color="primary" class="fa fa-sign-in-alt" />
                    </v-card-title>

                    <v-divider/>

                    <v-card-text>
                        <v-form>
                            <v-text-field
                                label="Email"
                                type="email"
                                append-icon="fal fa-mail-bulk"
                                v-model="form.email"
                            />
                            <v-text-field
                                label="Password"
                                type="password"
                                append-icon="fal fa-key"
                                v-model="form.password"
                            />

                            <v-btn block color="primary" class="mt-2">Login</v-btn>

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
    data() {
        return {
            form: {
                email: '',
                password: ''
            }
        }
    },
}
</script>

<style scoped>

</style>
