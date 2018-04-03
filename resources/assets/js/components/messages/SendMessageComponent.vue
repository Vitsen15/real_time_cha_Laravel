<template>
    <form @submit.prevent.keyup="sent" class="form-horizontal col align-self-center">
        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" rows="3" id="message" v-model="newMessage"> placeholder="Enter the message"></textarea>
        </div>
        <button type="submit" class="btn btn-default">Send</button>
    </form>
</template>

<script>
    export default {
        props: ['user'],

        data() {
            return {
                newMessage: ''
            }
        },

        methods: {
            sent () {
                this.$emit('messagesent', {
                    user: this.user,
                    message: this.newMessage
                });
                this.newMessage = '';
            }
        }
    }
</script>