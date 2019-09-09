<template>
    <div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document" @keyup.enter="register">
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
                            <label for="name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" v-model="name"
                                   :class="{'is-invalid': errors.name}" @input="delete errors.name">
                            <span v-if="errors.name" :class="['label label-danger']">{{ errors.name[0] }}</span>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="text" class="form-control" id="email" name="email" v-model="email"
                                   :class="{'is-invalid': errors.email}" @input="delete errors.email">
                            <span v-if="errors.email" :class="['label label-danger']">{{ errors.email[0] }}</span>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" v-model="password"
                                   :class="{'is-invalid': errors.password}" @input="delete errors.password">
                            <span v-if="errors.password" :class="['label label-danger']">{{ errors.password[0] }}</span>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation" class="col-form-label">Password confirmation:</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                   name="password_confirmation" v-model="password_confirmation">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="clearErrors">Close
                    </button>
                    <button type="button" class="btn btn-primary" @click="register">Register</button>
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
                name: '',
                password: '',
                password_confirmation: '',
                errors: [],
            }
        },

        methods: {
            register() {
                this.errors = [];
                axios.post('/register', this.$data)
                    .then(response => {
                        location.reload();
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    })
            },
            clearErrors() {
                this.errors = [];
            }
        }
    }
</script>
