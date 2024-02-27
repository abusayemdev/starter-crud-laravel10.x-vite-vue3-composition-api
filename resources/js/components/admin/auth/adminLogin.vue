<!-- resources/js/components/admin/auth/AdminLogin.vue -->
<script setup>

import { ref, onMounted } from 'vue';
import axios from 'axios';
import { route, asset } from 'routeHelper';

//variables
const site_settings = ref([]);
const email = ref('');
const password = ref('');
const account_type = ref('admin');
const errors = ref([]);
const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
const isLoading = ref(false);
const successMessage = ref('');


//methods
const resetForm = () => {
    email.value = '';
    password.value = '';
};

const submitForm = async ()=> {
    try {
        isLoading.value = true;
        const response = await axios.post(route('admin.admin-login'), {
                email: email.value,
                password: password.value,
                account_type: account_type.value,
            }, {
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                },
            });

            successMessage.value = 'Login successful! Redirecting to the dashboard...';
            resetForm();

            //Redirect to
            setTimeout(() => {
                window.location.href = route('admin.dashboard');
            }, 1000);

    } catch (error) {
        Helper.handleErrors(error, errors);
    } finally {
        isLoading.value = false;
    }
};

//hooks
onMounted(() => {
    axios(route('site-settings'))
        .then((response) => {
            site_settings.value = response.data.site_settings;
        })
        .catch((error) => {
            console.log(error.response.data)
        });

});

</script>



<template>
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div class="middle-box-div">
        <div>
            <img :src="asset(site_settings.Logo)" class="img-fluid d-flex mx-auto mb-4" style="max-width: 150px;"> 
        </div>
        <h3>{{$t('admin.Admin Login') }}</h3>

        <div v-if="errors.length > 0" class="alert alert-danger">
            <div class="font-medium text-red-600">
                Error!
            </div>
            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                <li v-for="(error, index) in errors" :key="index">{{ error }}</li>
            </ul>
            
        </div>

        <div v-if="errors.length == 0" class="mb-4"></div>

        <form @submit.prevent="submitForm" class="m-t">

            <div class="form-group">
                <input v-model="email" class="form-control" type="email" name="email" placeholder="admin@example.com" autofocus />
            </div>

            <div class="form-group">
                <input v-model="password" class="form-control" type="password" name="password" placeholder="123456789" autocomplete="current-password" />
            </div>
    
            <button type="submit" class="btn btn-primary block full-width m-b sk-loading" :disabled="isLoading">
                <span v-if="isLoading">{{$t('admin.Logging in...')}}</span>
                <span v-else>{{$t('admin.Login')}}</span>
            </button>

            <div v-if="successMessage" class="alert alert-success">
                {{ successMessage }}
            </div>
            
            <a class="btn btn-sm btn-white btn-block" :href="route('/')">{{$t('admin.Back to site')}}</a>
           
        </form>
    </div>
</div>
</template>