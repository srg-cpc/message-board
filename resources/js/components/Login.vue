<template>
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document" @keyup.enter="login">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="clearErrors">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="text" class="form-control " id="email" name="email" v-model="email"
                                   :class="{'is-invalid': errors.email}" @input="delete errors.email">
                            <span v-if="errors.email" :class="['label label-danger']">{{ errors.email[0] }}</span>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" v-model="password"
                                   :class="{'is-invalid': errors.password}" @input="delete errors.password">
                            <span v-if="errors.password" :class="['label label-danger']">{{ errors.password[0] }}</span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="clearErrors">Close</button>
                    <button type="button" class="btn btn-primary" @click="login">Login</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                email: '',
                password: '',
                errors: [],
            }
        },

        methods: {
            login() {
                this.errors = [];
                axios.post('/login', this.$data)
                    .then(response => {
                        location.reload();
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    })
            },
            clearErrors () {
                this.errors = [];
            }
        }
    }
</script>
