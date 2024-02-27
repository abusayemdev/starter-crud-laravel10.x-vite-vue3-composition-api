<!-- resources/js/components/admin/language/Edit.vue -->
<script setup>

import { onMounted } from 'vue';
import { route } from 'routeHelper';
import useLanguage from '@/composables/admin/language.js';

//variables
const { loading, errors, language, getLanguage, updateLanguage } = useLanguage(); 
const props = defineProps(['id']);

//hooks
onMounted(() => {
    getLanguage(props.id);
});

</script>

<template>
<div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-10">
        <h2>{{$t('admin.Edit Language')}}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a :href="route('admin.dashboard')">{{$t('admin.Home')}}</a>
            </li>
            <li class="breadcrumb-item">
                <a :href="route('admin.language.index')">{{$t('admin.Language')}}</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>{{$t('admin.Edit Language')}}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2 align-self-center ">
        <div class="my-auto">
            <a class="btn btn-primary btn-md float-right"
                :href="route('admin.language.index')">{{$t('admin.Language List')}}</a>
        </div>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>{{$t('admin.Edit Language')}}</h5>

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
                    <form @submit.prevent="updateLanguage(props.id)">
                        <div class="form-group  row">
                            <label class="col-sm-2 col-form-label">{{$t('admin.Name')}} <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" v-model="language.name" :placeholder="$t('admin.Name')" class="form-control">
                            </div>
                        </div>

                        <div class="form-group  row">
                            <label class="col-sm-2 col-form-label">{{$t('admin.Code')}} <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" v-model="language.code" :placeholder="$t('admin.Code')" class="form-control">
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