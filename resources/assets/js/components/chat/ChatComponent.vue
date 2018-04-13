<template>
    <div class="container">
        <sent-message v-on:messagesent="addMessage"></sent-message>
        <message :messages="messages"></message>
    </div>
</template>

<script>
    import MessageComponent from './MessageComponent';
    import SendMessageComponent from './SendMessageComponent';


    export default {
        name: "ChatComponent",

        components: {
            'sent-message': SendMessageComponent,
            'message': MessageComponent
        },

        data() {
            return {
                messages: [],
                user: this.user
            }
        },

        mounted() {
            this.fetchMessages();

            window.Echo.private('chat')
                .listen("MessageSentEvent", (e) => {
                    this.messages.push({
                        message: e.message.message,
                        user: e.user
                    });
                });
        },

        methods: {
            addMessage(message) {
                axios.post('/messages', message);
            },

            fetchMessages() {
                axios.get('/messages').then(response => {
                    this.messages = response.data;
                });
            }
        }
    }
</script>

<style scoped>

</style>