<template>
    <div>
        <vue-answer :answer="answer" :index="index"
                    v-for="(answer, index) in answersArray" :key="answer.id" @answer-deleted="deleteAnswer">
        </vue-answer>

        <div class="d-flex justify-content-center" v-if="nextPageUrl">
            <button type="button" class="btn btn-light btn-outline-secondary text-center mb-3"
                    @click="fetch(nextPageUrl)" >Load more</button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                answersArray: [],
                threadId: '',
                nextPageUrl: null,
            }
        },

        props: ['thread', 'newAnswer'],

        watch: {
            newAnswer: function (val) {
                this.answersArray.push(val);
            }
        },

        methods:{
            deleteAnswer(index){
                this.answersArray.splice(index, 1);
            },
            fetch(endpoint){

                axios.get(endpoint, {params: {id: this.threadId}})
                    .then( response => {
                     this.answersArray.push(...response.data.data);
                     this.nextPageUrl = response.data.next_page_url;
                    })
            }
        },

        created() {

            this.threadId = this.thread.id;
            this.fetch(`/answers`);
        }
    }
</script>
