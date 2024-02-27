<!-- resources/components/user/profile/socialMedia.vue -->
<script setup>

import axios from 'axios';
import { ref, onMounted } from 'vue';
import { route } from 'routeHelper';

//props
const props = defineProps(['profile']);

//variables
const user_id = ref(props.profile.id);
const website_url = ref('');
const github_url = ref('');
const twitter_url = ref('');
const instagram_url = ref('');
const facebook_url = ref('');
const errorMessages = ref([]);
const successMessage = ref('');
const loading = ref(false);

//methods
const submitForm = async () => {
    try {
        loading.value = true;
        const formData = {
            user_id: user_id.value,
            website_url: website_url.value,
            github_url: github_url.value,
            twitter_url: twitter_url.value,
            instagram_url: instagram_url.value,
            facebook_url: facebook_url.value,
        };

        await axios.patch(route('social-media', {id: user_id.value}), formData);
        successMessage.value = 'Social Media updated!';
        window.location.href = route('profile');

    } catch (error) {
        Helper.handleErrors(error, errorMessages);
    } finally {
        loading.value = false;
    }
};

//hooks
onMounted(() => {
    axios(route('social-media', {id: user_id.value}))
        .then((response) => {
            user_id.value = response.data.social_media.user_id;
            website_url.value = response.data.social_media.website_url;
            github_url.value = response.data.social_media.github_url;
            twitter_url.value = response.data.social_media.twitter_url;
            instagram_url.value = response.data.social_media.instagram_url;
            facebook_url.value = response.data.social_media.facebook_url;
        })
        .catch((error) => {
            console.log(error.response.data)
        });
});
</script>

<template>
<div class="card">
    <div class="card-body">
        <h6 class="mb-0">{{$t('user.Social Media')}}</h6>
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
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="2" y1="12" x2="22" y2="12"></line>
                            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                        </svg>{{$t('user.Website')}}</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" v-model="website_url" class="form-control" :placeholder="$t('user.Website')" />
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github me-2 icon-inline">
                            <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                        </svg>{{$t('user.Github')}}</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" v-model="github_url" :placeholder="$t('user.Github')" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter me-2 icon-inline text-info">
                            <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                        </svg>{{$t('user.Twitter')}}</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" v-model="twitter_url" :placeholder="$t('user.Twitter')" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram me-2 icon-inline text-danger">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                        </svg>{{$t('user.Instagram')}}</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" v-model="instagram_url" :placeholder="$t('user.Instagram')" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                        </svg>{{$t('user.Facebook')}}</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" v-model="facebook_url" :placeholder="$t('user.Facebook')" class="form-control">
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
