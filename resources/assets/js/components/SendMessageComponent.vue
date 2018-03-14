<template>
    <form class="form-horizontal col align-self-center" @submit.prevent.keyup="sent">
        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" rows="3" id="message" v-model="message.message" placeholder="Enter the message"></textarea>
        </div>
        <button type="submit" class="btn btn-default">Send</button>
    </form>
</template>

<script>
    export default {
        props: ['user'],
        data() {
            return {
                message: {
                    message: '',
                    user: this.user
                }
            }
        },
        methods: {
            sent() {
                this.$emit('messagesent', this.message);
                this.message = {};
            }
        }
    }
</script>