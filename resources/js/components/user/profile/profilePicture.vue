<!-- resources/components/user/profile/profilePicture.vue -->
<script setup>

import axios from 'axios';
import { ref } from 'vue';
import { route, asset } from 'routeHelper';

//props
const props = defineProps(['profile']);

//variables
const avatar = ref('');
const errorMessages = ref([]);
const successMessage = ref('');
const isLoading = ref(false);
const fileInput = ref('');
const imageUrl = ref('');

//methods
const readFile = () => {
    const file = fileInput.value.files[0];
    avatar.value = file;
    const fileReader = new FileReader();
    fileReader.onload = function (e) {
        imageUrl.value = e.target.result;
    };
    fileReader.readAsDataURL(file);
};

const submitForm = async () => {
    const formData = {};

    if (avatar.value) {
        formData.avatar = avatar.value;
    }

    try {
        isLoading.value = true;
        await axios.post(route('profile-update'), formData, {
            headers: {
                'Content-Type': "multipart/form-data",
            },
        });

        successMessage.value = 'Profile Picture updated!';
        window.location.href = route('profile');

    } catch (error) {
        Helper.handleErrors(error, errorMessages);
    } finally {
        isLoading.value = false;
    }
};

</script>

<template>
<div class="card">
    <div class="card-body">
        <h6 class="mb-0">{{$t('user.Change Profile Picture')}}</h6>
        <hr />
        <div v-if="errorMessages.length > 0" class="error-container p-3">
            <div class="font-medium text-red-600">
                {{$t('Error! ') }}
            </div>
            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                <li v-for="error in errorMessages" :key="error">{{ error }}</li>
            </ul>
        </div>
        <div class="mb-5"></div>

        <form class="row g-3" @submit.prevent="submitForm">
            <div class="row mb-3">
                <div class="col-sm-12 text-secondary">
                    <label for="fileToUpload">
                        <div v-if="profile.avatar" class="profile-pic">
                            <img :src="imageUrl ? imageUrl : asset(profile.avatar)">
                            <span>{{$t('user.Change Image')}}</span>
                        </div>
                        <div v-else class="profile-pic">
                            <img :src="imageUrl ? imageUrl : ''">
                            <span>{{$t('user.Change Image')}}</span>
                        </div>
                    </label>
                    <input type="file" ref="fileInput"  @change="readFile" name="fileToUpload" id="fileToUpload">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 text-secondary">
                    <button class="btn btn-primary px-4" type="submit">
                        <span v-if="isLoading">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            {{$t('user.Loading...')}}
                        </span>
                        <span v-else> {{$t('user.Save Changes')}}</span>
                    </button>
                </div>
                <div v-if="successMessage" class="alert alert-success mt-3">{{ successMessage }} </div>
            </div>
        </form>
    </div>
</div>
</template>

<style scoped>
    .profile-pic {
        border-radius: 50%;
        height: 150px;
        width: 150px;
        background: lightgray;
        background-size: cover;
        background-position: center;
        background-blend-mode: multiply;
        vertical-align: middle;
        text-align: center;
        color: transparent;
        transition: all .3s ease;
        text-decoration: none;
        cursor: pointer;
        position: relative
    }
    .profile-pic img{
        height: 150px;
        width: 150px;
        border-radius: 50%;
    }
    .profile-pic::before{
        content: '';
        height: 75px;
        width: 150px;
        position: absolute;
        bottom: 0px;
        left: 0px;
        border-radius: 0 0 75px 75px;
        background-color: rgba(0, 0, 0, .5);        
    }
    .profile-pic span {
        display: inline-block;
        position: absolute;
        bottom: 25%;
        left: 25px;
        color: #fff;
    }
    
    form input[type="file"] {
        display: none;
        cursor: pointer;
    }

</style>
