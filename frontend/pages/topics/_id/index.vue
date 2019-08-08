<template>
    <v-container>
        <v-card>
            <div>
                <v-card-title>
                    <h2 class="headline text-capitalize">{{ topic.title }}</h2>
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
    </v-container>
</template>

<script>
    export default {
        name: "index",
        data() {
            return {
                topic: '',
            }
        },

        async asyncData({$axios, params}) {
            const {data} = await $axios.$get(`/topics/${params.id}`);
            return {
                topic: data
            }
        }
    }
</script>

<style scoped>

</style>
