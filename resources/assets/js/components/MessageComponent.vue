<template>
    <div class="messages">
        <div class="card bg-info text-white" v-for="message in messages">
            <div class="card-header">
                <h3>{{ message.user.name }}</h3>
                <p class="text-right">{{ message.user.created_at }}</p>
            </div>
            <div class="card-body">
                <p>{{ message.message }}</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['messages'],

        mounted() {
            console.log('messages: ', this.messages);

        }
    }
</script>

<style>
    .messages {
        margin-top: 20px;
    }
</style>