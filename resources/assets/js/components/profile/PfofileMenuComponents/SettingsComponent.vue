<template>
    <div class="settings">
        <h2>Settings</h2>

        <div class="profile-avatar-change">
            <label for="avatar">Change avatar
                <input type="file" id="avatar" ref="avatar" accept="image/*" v-on:change="handleFileUpload()">
            </label>

            <button v-on:click="submitFile()">Change avatar</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SettingsComponent",

        data() {
            return {
                avatar: ''
            }
        },

        methods: {
            handleFileUpload() {
                this.avatar = this.$refs.avatar.files[0];
                console.log(this.avatar);
            },

            submitFile() {
                let formData = new FormData();

                formData.append('avatar', this.avatar);

                axios.post('/change-avatar',
                    formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(function () {
                    console.log('SUCCESS!!');
                }).catch(function () {
                    console.log('FAILURE!!');
                });
            }
        }
    }
</script>

<style scoped>

</style>