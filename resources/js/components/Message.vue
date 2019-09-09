<template>
    <form>
        <div class="form-group">
            <label for="message-textarea">Message</label>
            <textarea class="form-control" id="message-textarea" rows="5" v-model="body"></textarea>
        </div>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-light" @click="store">Reply</button>
        </div>
    </form>
</template>

<script>
    export default {
        props: ['threadId'],
        data () {
          return {
              body: '',
          }
        },
        methods:{
            store () {

                axios.post('/answers', {body: this.body, thread_id: this.threadId})
                   .then(response => {
                        this.$emit('answer-added', response.data);
                        this.body = '';
                   })
                   .catch(error => {
                       console.log('errors')
                   })
            },
        }
    }
</script>
