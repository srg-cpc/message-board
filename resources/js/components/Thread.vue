<template>
    <div class="container">
        <a class="text-dark text-decoration-none" :href="threadUrl">
            <div class="container mt-4 overflow-hidden" style="max-height: 150px;">
                <h4>{{thread.name}}</h4>
                <p>{{body.substr(0, 500)}}</p>
            </div>
        </a>
        <div class="d-flex justify-content-between">
            <p class="" style="margin-left: auto" v-text="`${thread.author.name} posted ${formattedDate}`"></p>
        </div>
    </div>
</template>

<script>
    import {diffForHumans} from '../util';

    export default {
        props: ['thread'],

        computed: {
            formattedDate: function () {
                return diffForHumans(this.thread.created_at)
            }
        },

        data(){
            return {
                threadUrl: `/threads/${this.thread.id}`,
                body: this.thread.body
            }
        }
    }
</script>

