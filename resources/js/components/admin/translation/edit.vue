<!-- resources/js/components/admin/translation/Edit.vue -->
<script setup>

import { onMounted } from 'vue';
import { route } from 'routeHelper';
import useTranslation from '@/composables/admin/translation.js';

//variables
const { loading, errors, translation, getTranslation, updateTranslation } = useTranslation(); 
const props = defineProps(['id']);

//hooks
onMounted(() => {
    getTranslation(props.id);
});

</script>

<template>
<div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-10">
        <h2>{{$t('admin.Edit Translation')}}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a :href="route('admin.dashboard')">{{$t('admin.Home')}}</a>
            </li>
            <li class="breadcrumb-item">
                <a :href="route('admin.translation.index')">{{$t('admin.Translation')}}</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>{{$t('admin.Edit Translation')}}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2 align-self-center ">
        <div class="my-auto">
            <a class="btn btn-primary btn-md float-right"
                :href="route('admin.translation.index')">{{$t('admin.Translation List')}}</a>
        </div>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>{{$t('admin.Edit Translation')}}</h5>
                    <div v-if="errors.length !== 0">
                        <div class="font-medium text-red-600">
                            Error!
                        </div>
                        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                            <li v-for="(error, index) in errors" :key="index">{{ error }}</li>
                        </ul>
                    </div>
                </div>
                <div class="ibox-content">
                    <form @submit.prevent="updateTranslation(props.id)">

                        <div class="form-group  row">
                            <label class="col-sm-2 col-form-label">{{$t('admin.Text')}} <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <textarea type="text" v-model="translation.text" :placeholder="$t('admin.Text')"
                                    class="form-control" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group  row">
                            <label class="col-sm-2 col-form-label">{{$t('admin.Language')}}<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="lang" readonly v-model="translation.lang"  :placeholder="$t('admin.Language')"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="form-group  row">
                            <label class="col-sm-2 col-form-label">{{$t('admin.Translation')}}<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <textarea type="text" v-model="translation.translation" readonly  :placeholder="$t('admin.Translation')"
                                    class="form-control" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>

                        <div class="form-group row">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button type="submit" class="btn btn-primary btn-md" :disabled="loading">
                                    <span v-if="loading">{{$t('admin.Loading...')}}</span>
                                    <span v-else>{{$t('admin.Update')}}</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</template>