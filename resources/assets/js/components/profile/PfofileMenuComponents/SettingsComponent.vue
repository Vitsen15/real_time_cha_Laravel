<template>
    <div class="settings">
        <h2>Settings</h2>

        <div class="profile-avatar-change">
            <label for="avatar">Change avatar
                <input type="file" id="avatar" ref="avatar" accept="image/*" v-on:change="handleFileUpload()">
            </label>

            <button v-on:click="submitFile()">Change avatar</button>
            <div v-if="responseErrors" v-for="error in responseErrorMessages">
                <p>{{ error }}</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SettingsComponent",

        data() {
            return {
                avatar: '',
                responseErrors: false,
                responseErrorMessages: []

            }
        },

        methods: {
            handleFileUpload() {
                this.avatar = this.$refs.avatar.files[0];
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
                ).then((response) => {
                    this.responseErrors = false;
                    //handle success uploading
                }).catch((data) => {
                    let response = data.response.data;

                    switch (response.status) {
                        case 'saving_error':
                            this.responseErrorMessages.push('Error while saving!');
                            break;
                        case 'validation_error':
                            this.responseErrorMessages = response.errors.avatar;
                            break;
                    }

                    this.responseErrors = true;
                });
            }
        }
    }
</script>

<style scoped>

</style>