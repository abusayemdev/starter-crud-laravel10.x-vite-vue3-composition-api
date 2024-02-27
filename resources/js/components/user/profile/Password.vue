<!-- resources/components/user/profile/Password.vue -->
<script setup>

import axios from 'axios';
import { ref } from 'vue';
import { route } from 'routeHelper';

//props
const props = defineProps(['profile']);

//variables
const password = ref('');
const password_confirmation = ref('');
const errorMessages = ref([]);
const successMessage = ref('');
const loading = ref(false);


//methods
const submitForm = async () => {
    try {
        loading.value = true;
        const formData = {};

        if (password.value) {
            formData.password = password.value;
            formData.password_confirmation = password_confirmation.value;
        }

        await axios.post(route('profile-update'), formData);
        successMessage.value = 'Profile data updated!';
        window.location.href = route('profile');

    } catch (error) {
        Helper.handleErrors(error, errorMessages);
    } finally {
        loading.value = false;
    }
};

</script>

<template>
<div class="card">
    <div class="card-body">
        <h6 class="mb-0">{{$t('user.Password Settings')}}</h6>
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
                <div class="col-sm-3">
                    <h6 class="mb-0">{{$t('user.Password')}}</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="password" v-model="password" :placeholder="$t('user.Password')" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">{{$t('user.Confirm Password')}}</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="password" v-model="password_confirmation" :placeholder="$t('user.Confirm Password')" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-9 text-secondary">
                    <button class="btn btn-primary px-4" type="submit">
                        <span v-if="loading">
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