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
    // import AvatarComponent from './AvatarComponent';
    import ProfileSidebarComponent from './ProfileSidebarComponent';

    export default {
        name: "ProfileComponent",

        props: ['avatar', 'name'],

        components: {
            'profile-sidebar': ProfileSidebarComponent
        },

        mounted() {
            console.log('hui');
        }
    }
</script>

<style scoped>

</style>