<template>
    <v-container grid-list-md>
        <v-layout wrap justify-center align-center>

            <v-flex v-for="(topic, index) in topics" :key="index" xs6>
                <v-card>
                    <div>
                        <v-card-title>
                            <v-btn 
                                text 
                                nuxt :to="{name: 'topics-id', params: {id: topic.id}}" 
                                class="pl-0 headline text-capitalize">
                                <v-icon small class="fad fa-link" left/>
                                {{ topic.title }}
                            </v-btn>
                        </v-card-title>
                        <v-card-text class="caption pb-2">By {{ topic.user.name }} | {{ topic.created_at }}
                        </v-card-text>
                    </div>

                    <v-divider/>

                    <v-card-text v-for="(content, index) in topic.posts" :key="index" class="ml-5">
                        <div class="content">
                            <p class="mb-0 ">{{ content.body }}</p>
                            <p class="caption grey--text">By {{ topic.user.name }} | {{ topic.created_at }}</p>
                        </div>
                    </v-card-text>

                </v-card>
            </v-flex>

        </v-layout>

        <div class="text-center mt-2">
            <v-pagination
                v-model="pagination.current"
                :length="pagination.total"
                prev-icon="arrow_left"
                next-icon="arrow_right"
                circle
                @input="onPageChange(pagination.current)"
            />
        </div>

    </v-container>
</template>

<script>
    export default {
        name: "index",
        middleware: ['auth'],
        data() {
            return {
                topics: [],
                pagination: {}
            }
        },

        async asyncData({$axios}) {
            let {data, meta} = await $axios.$get('/topics');
            return {
                topics: data,
                pagination: {
                    current: meta.current_page,
                    total: meta.last_page,
                }
            }
        },

        methods: {
            async getPage(key) {
                let {data} = await this.$axios.$get(`/topics?page=${key}`);
                return this.topics = {...this.topics, ...data}
            },

            async onPageChange(key) {
                await this.getPage(key)
            }
        }
    }
</script>

<style scoped>
    .content {
        border-left: 5px solid #00C48D;
        padding: 0 10px;
    }
</style>
