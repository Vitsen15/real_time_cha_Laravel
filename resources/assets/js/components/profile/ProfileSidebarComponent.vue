<template>
    <div class="col-md-3 profile-sidebar">
        <div class="profile-userpic">
            <img :src="avatar" class="img-responsive" :alt="name">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">
                {{ name }}
            </div>
        </div>
        <user-menu></user-menu>
    </div>
</template>

<script>
    import UserMenu from './ProfileMenuComponent';

    export default {
        name: "ProfileSidebar",

        props: ['avatar', 'name'],

        components: {
            'user-menu': UserMenu
        }
    }
</script>

<style scoped>

</style>