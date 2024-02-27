<!-- resources/components/user/profile/UserProfile.vue -->
<script setup>

import axios from 'axios';
import { ref, onMounted } from 'vue';
import { route, asset } from 'routeHelper';
import ProfilePicture from './profilePicture.vue'
import ProfileSettings from './profileSettings.vue';
import Password from './password.vue';
import SocialMedia from './socialMedia.vue';

//props
const props = defineProps(['profile']);

//variables
const profile = props.profile;
const social_media = ref([]);

//methods
const capitalize = (value) => {
    return Helper.capitalize(value);
};

const trans = (text) => {
 return HelperFunction.trans(text);
};

//hooks
onMounted(() => {
    axios(route('social-media', {id: profile.id}))
        .then((response) => {
            social_media.value = response.data.social_media;
        })
        .catch((error) => {
            console.log(error.response.data)
        });

});

</script>

<template>
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a :href="route('dashboard')"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{$t('user.User Profile')}}</li>
                    </ol>
                </nav>
            </div>

            <div class="ms-auto">
                <div class="btn-group" >
                    <button type="button" class="btn btn-primary button-text ">{{$t('user.Settings')}}</button>
                    <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" role="tablist">
                    </button>

                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end" style="min-width: 100%;">
                        <ul class="nav nav-pills mb-3" role="tablist" style="display: inline-block;">
                            <li role="presentation">
                                <a class="dropdown-item  active " data-bs-toggle="pill" href="#primary-pills-profile" aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <i class='bx bx-user-pin font-18 me-1'></i>{{$t('user.Profile')}}
                                    </div>
                                </a>
                            </li>
                            <li role="presentation">
                                <a class="dropdown-item" data-bs-toggle="pill" href="#primary-pills-settings" aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <i class='bx bx-cog font-18 me-1'></i>{{$t('user.Primary Settings')}}
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="dropdown-item" data-bs-toggle="pill" href="#primary-pills-profile-picture" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <i class='bx bx-image font-18 me-1'></i>{{$t('user.Profile Picture')}}
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="dropdown-item" data-bs-toggle="pill" href="#primary-pills-password" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <i class='bx bx-rename font-18 me-1'></i>{{$t('user.Password')}}
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="dropdown-item" data-bs-toggle="pill" href="#primary-pills-social-media" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <i class='bx bx-add-to-queue font-18 me-1'></i>{{$t('user.Social Media')}}
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">

                                    <img v-if="profile.avatar" :src="asset(profile.avatar)" alt="Admin" class="rounded-circle p-1" width="110">
                                    <div class="mt-3">
                                        <h4>
                                            {{ capitalize(trans(profile.first_name)) }}
                                            {{ capitalize(trans(profile.last_name)) }}
                                        </h4>
                                        <p class="text-secondary mb-1"> <b>{{ capitalize(trans(profile.account_type)) }}</b>&nbsp; 
                                            <span v-if="profile.status == 1"  class="badge bg-success">{{$t('user.Active')}}</span>
                                            <span v-else class="badge bg-secondary"> {{$t('user.Inactive')}}</span>
                                        </p>
                                        <p class="text-muted font-size-sm">
                                            {{ profile.address ? capitalize(trans(profile.address)) + ',' : '' }}
                                            {{ profile.city ? capitalize(trans(profile.city)) + ',' : '' }}
                                            {{ profile.state ? capitalize(trans(profile.state)) + ',' : ''  }}
                                            {{ capitalize(trans(profile.country)) }}</p>
                                    </div>
                                </div>
                                <hr class="my-4" />
                                <ul class="list-group list-group-flush">
                                    <li v-if="social_media.website_url" class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                            </svg>
                                        </h6>
                                        <span class="text-secondary direction-ltr-important">{{ trans(social_media.website_url) }}</span>
                                    </li>
                                    <li v-if="social_media.github_url" class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github me-2 icon-inline">
                                                <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                            </svg>
                                        </h6>
                                        <span class="text-secondary direction-ltr-important">{{ trans(social_media.github_url) }}</span>
                                    </li>
                                    <li v-if="social_media.twitter_url" class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter me-2 icon-inline text-info">
                                                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                            </svg>
                                        </h6>
                                        <span class="text-secondary direction-ltr-important" >{{ trans(social_media.twitter_url) }}</span>
                                    </li>
                                    <li v-if="social_media.instagram_url" class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram me-2 icon-inline text-danger">
                                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                            </svg>
                                        </h6>
                                        <span class="text-secondary direction-ltr-important">{{ trans(social_media.instagram_url) }}</span>
                                    </li>
                                    <li v-if="social_media.facebook_url" class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary">
                                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                            </svg></h6>
                                        <span class="text-secondary direction-ltr-important">{{ trans(social_media.facebook_url) }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="primary-pills-profile" role="tabpanel">
                                        <div class="card">
                                            <div class="card-body">

                                                <h6 class="mb-0">{{$t('user.Profile')}}</h6>
                                                <hr>
                                                <div class="mb-3"></div>
                                                <div v-if="profile.first_name" class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">{{$t('user.Full Name')}}</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ trans(profile.first_name) }} {{ trans(profile.last_name) }}
                                                    </div>
                                                </div>
                                                <div v-if="profile.email" class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">{{$t('user.Email')}}</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ trans(profile.email) }}
                                                    </div>
                                                </div>
                                                <div v-if="profile.phone" class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">{{$t('user.Phone')}}</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ trans(profile.phone) }}
                                                    </div>
                                                </div>
                                                <div v-if="profile.mobile" class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">{{$t('user.Mobile')}}</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ trans(profile.mobile) }}
                                                    </div>
                                                </div>
                                                <div v-if="profile.address" class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">{{$t('user.Address')}}</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ trans(profile.address) }}
                                                    </div>
                                                </div>
                                                <div v-if="profile.city" class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">{{$t('user.City')}}</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ trans(profile.city) }}
                                                    </div>
                                                </div>

                                                <div v-if="profile.state" class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">{{$t('user.State')}}</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ trans(profile.state) }}
                                                    </div>
                                                </div>
                                                <div v-if="profile.zip" class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">{{$t('user.Zip Code')}}</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ trans(profile.zip) }}
                                                    </div>
                                                </div>
                                                <div v-if="profile.country" class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">{{$t('user.Country')}}</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ trans(profile.country) }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="primary-pills-settings" role="tabpanel">
                                        <ProfileSettings :profile="profile"></ProfileSettings>
                                    </div>
                                    <div class="tab-pane fade" id="primary-pills-profile-picture" role="tabpanel">
                                        <ProfilePicture :profile="profile"></ProfilePicture>
                                    </div>
                                    <div class="tab-pane fade" id="primary-pills-password" role="tabpanel">
                                        <Password :profile="profile"></Password>
                                    </div>
                                    <div class="tab-pane fade" id="primary-pills-social-media" role="tabpanel">
                                        <SocialMedia :profile="profile"></SocialMedia>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->
</template>