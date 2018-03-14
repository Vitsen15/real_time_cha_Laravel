<template>
    <div class="card bg-info text-white">
        <div class="card-header">
            <h3>{{ messages.user.name }}</h3>
            <p class="text-right">{{ messages.created_at }}</p>
        </div>
        <div class="card-body">
            <p>{{ messages.message }}</p>
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