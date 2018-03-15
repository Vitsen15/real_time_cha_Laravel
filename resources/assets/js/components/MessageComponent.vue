<template>
    <div class="card bg-info text-white" v-for="message in messages">
        <div class="card-header">
            <h3>{{ message.user.name }}</h3>
            <p class="text-right">{{ message.created_at }}</p>
        </div>
        <div class="card-body">
            <p>{{ message.message }}</p>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['messages'],
        mounted() {
            console.log(this.messages)
        }
    }
</script>