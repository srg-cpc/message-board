<template>
    <div>
        <div v-if="!editing">
            <p v-text="body"></p>

            <div class="d-flex justify-content-between" >
                <div v-if="signedIn">
                    <button type="button" class="btn btn-light btn-sm ">Reply</button>

                    <button v-if="authorize('modify', answer)" type="button" class="btn btn-light btn-sm "
                            @click="editing = true">
                        Edit
                    </button>

                    <button v-if="authorize('modify', answer)" type="button" class="btn btn-light btn-sm "
                            @click="deleteAnswer">
                        Delete
                    </button>
                </div>

                <p class="" style="margin-left: auto"
                   v-text="`${answer.author.name} posted ${formattedDate}`"></p>
            </div>
        </div>

        <div v-else>
            <form>
                <div class="form-group">
                    <label for="message-textarea">Message</label>
                    <textarea class="form-control" id="message-textarea" rows="5"
                              v-model="bodyUpdated"></textarea>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-light btn-sm " @click="update">
                        Update
                    </button>
                </div>
            </form>
        </div>

        <hr>
    </div>
</template>
<script>
    import {diffForHumans} from '../util';

    export default {

        props: ['answer', 'index'],

        computed: {
            formattedDate: function () {
                return diffForHumans(this.answer.created_at)
            }
        },

        data() {
            return {
                body: '',
                bodyUpdated: '',
                endpoint: '',
                editing: false,
                signedIn: window.Auth.signedIn,
            }
        },
        created() {
            this.body = this.answer.body;
            this.bodyUpdated = this.answer.body;
            this.endpoint = `/answers/${this.answer.id}`
        },

        methods: {
            update() {
                this.editing = false;

                axios.patch(this.endpoint, {body: this.bodyUpdated, id: this.answer.id})
                    .then(this.body = this.bodyUpdated)
                    .catch();
            },
            deleteAnswer() {
                axios.delete(this.endpoint, {id: this.answer.id})
                    .then(this.$emit('answer-deleted', this.index))
                    .catch();
            }
        }
    }
</script>
