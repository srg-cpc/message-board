<template>
    <div>
        <vue-thread v-for="thread in threadsArray" :key="thread.id" :thread="thread"></vue-thread>

        <div class="d-flex justify-content-center" v-if="nextPageUrl">
            <button type="button" class="btn btn-light btn-outline-secondary text-center mb-3"
                    @click="fetch(nextPageUrl)">Load more</button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                endpoint: '',
                threadsArray: [],
                nextPageUrl: null,
            }
        },

        methods: {
            fetch(endpoint) {
                axios.get(endpoint)
                    .then(({data}) => {
                        console.log(data);
                        this.threadsArray.push(...data.data);
                        this.nextPageUrl = data.next_page_url;
                    })
            }
        },

        created() {
            console.log('vue threads created');
            this.fetch(`/threads/fetch`);
        }
    }
</script>


