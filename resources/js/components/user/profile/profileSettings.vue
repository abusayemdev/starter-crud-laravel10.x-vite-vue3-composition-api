<!-- resources/components/user/profile/ProfileSettings.vue -->
<script setup>

import axios from 'axios';
import { ref, onMounted } from 'vue';
import { route } from 'routeHelper';

//props
const props = defineProps(['profile']);

//variables
const first_name = ref(props.profile.first_name);
const last_name = ref(props.profile.last_name);
const email = ref(props.profile.email);
const phone = ref(props.profile.phone);
const mobile = ref(props.profile.mobile);
const address = ref(props.profile.address);
const city = ref(props.profile.city);
const state = ref(props.profile.state);
const zip = ref(props.profile.zip);
const country = ref(props.profile.country);
const errorMessages = ref([]);
const successMessage = ref('');
const isLoading = ref(false);

//methods
const submitForm = async () => {
    try {
        isLoading.value = true;
        const formData = {
            first_name: first_name.value,
            last_name: last_name.value,
            email: email.value,
            phone: phone.value,
            mobile: mobile.value,
            address: address.value,
            city: city.value,
            state: state.value,
            zip: zip.value,
            country: country.value,
        };

        await axios.post(route('profile-update'), formData);
        successMessage.value = 'Profile data updated!';
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
        <h6 class="mb-0">{{$t('user.Primary Settings')}}</h6>
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
                    <h6 class="mb-0">{{$t('user.First Name')}}</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" v-model="first_name" :placeholder="$t('user.First Name')" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">{{$t('user.Last Name')}}</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" v-model="last_name" :placeholder="$t('user.Last Name')" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">{{$t('user.Email')}}</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="email" v-model="email" :placeholder="$t('user.Email')" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">{{$t('user.Phone')}}</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" v-model="phone" :placeholder="$t('user.Phone')" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">{{$t('user.Mobile')}}</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" v-model="mobile" :placeholder="$t('user.Mobile')" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">{{$t('user.Address')}}</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" v-model="address" :placeholder="$t('user.Address')" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">{{$t('user.City')}}</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" v-model="city" :placeholder="$t('user.City')" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">{{$t('user.State')}}</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" v-model="state" :placeholder="$t('user.State')" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">{{$t('user.Zip Code')}}</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" v-model="zip" :placeholder="$t('user.Zip Code')" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">{{$t('user.Country')}}</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" v-model="country" :placeholder="$t('user.Country')" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-9 text-secondary">
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