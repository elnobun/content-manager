<template>
    <v-container fluid fill-height>
        <v-layout align-center justify-center>
            <v-flex xs12 sm8 md6>
                <v-card elevation="12">

                    <v-card-title class="grey lighten-4">
                        <h3 class="font-weight-light">
                            Create A New Topic
                        </h3>
                        <v-spacer></v-spacer>
                        <v-icon large :color="!this.valid ? 'red' : 'primary'" class="fad fa-clipboard-list"/>
                    </v-card-title>

                    <v-divider/>

                    <v-card-text>
                        <v-form
                            @submit.prevent="createTopic" v-model="valid" ref="form" lazy-validation>
                            <v-text-field
                                label="Title"
                                type="text"
                                v-model="form.title"
                                :rules="errors.title"
                            />
                            <v-textarea
                                label="Body"
                                type="text"
                                v-model="form.body"
                                :rules="errors.body"
                            />

                            <v-btn
                                :color="!this.valid ? 'red white--text' : 'primary'"
                                class="mt-2"
                                type="submit">
                                Create
                            </v-btn>

                        </v-form>
                    </v-card-text>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
    export default {
        name: "dashboard",
        middleware: ['auth'],
        data() {
            return {
                valid: true,
                form: {
                    title: '',
                    body: ''
                }
            }
        },

        methods: {
            async createTopic() {
                if (this.valid && this.$refs.form.validate()) {
                    try {
                        await this.$axios.$post('/topics', this.form);
                        this.$router.push('/topics')
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
