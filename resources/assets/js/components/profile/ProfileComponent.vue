<template>
    <div class="container">
        <div id="profile" class="row profile">
            <profile-sidebar :avatar="avatar" :name="name"></profile-sidebar>
            <div class="col-md-9">
                <div class="profile-content">
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ProfileSidebarComponent from './ProfileSidebarComponent';

    export default {
        name: "ProfileComponent",

        components: {
            'profile-sidebar': ProfileSidebarComponent
        },

        data() {
            return {
                avatar: window.avatarUrl,
                name: window.name
            }
        }
    }
</script>

<style scoped>

</style>