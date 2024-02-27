<!-- resources/js/components/admin/translation/Create.vue -->
<script setup>

import { ref, reactive, onMounted } from 'vue';
import { route } from 'routeHelper';
import useTranslation from '@/composables/admin/translation.js';


//variables
const { loading, getLanguages, languages, storeTranslation, errors } = useTranslation(); 
const  lang = ref([]);
const addmore = ref([]);
const translation = reactive({
    addmore: addmore,
    lang: lang,
});


//methods
const addField = () => {
    addmore.value.push('');
};

const removeField = (index) => {
    addmore.value.splice(index, 1);
};

//hooks
onMounted(() => {
    getLanguages();
});

</script>


<template>
<div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-10">
        <h2>{{$t('Create Translation')}}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a :href="route('admin.dashboard')">{{$t('Home')}}</a>
            </li>
            <li class="breadcrumb-item">
                <a :href="route('admin.translation.index')">{{$t('Translation')}}</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>{{$t('Create Translation')}}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2 align-self-center ">
        <div class="my-auto">
            <a class="btn btn-primary btn-md float-right" :href="route('admin.translation.index')">{{$t('translation List')}}</a>
        </div>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>{{$t('Create Translation')}}</h5>
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
                    <form @submit.prevent="storeTranslation(translation)" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{$t('Text')}} <span class="text-danger">*</span></label>
                            <div class="col table-responsive">
                                <table class="table table-bordered" id="add_text">
                                    <tr class="dynamic-added">
                                        <td>
                                            <button @click="addField()" type="button" name="add" class="btn btn-sm btn-primary add-button">{{$t('Add Text')}}</button>
                                        </td>
                                    </tr>
                                    <tr v-for="(field, index) in addmore" :key="index" class="field-wrapper">
                                        <td>
                                            <label for="text[]">{{ index + 1 }}.</label>
                                            <textarea v-model="addmore[index]" placeholder="Text" class="form-control name_list" rows="3"></textarea>
                                        </td>
                                        <td>
                                            <button @click="removeField(index)" type="button" class="btn btn-sm btn-danger btn_remove">{{$t('Remove')}}</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{$t('Languages')}} <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <label class="mr-3" v-for="language in languages" :key="language.id"> 
                                    <input type="checkbox" v-model="lang" :value="language.code" id="inlineCheckbox1"> {{language.name}} 
                                </label>
                                
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>

                        <div class="form-group row">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button type="submit" class="btn btn-primary btn-md" :disabled="loading">
                                    <span v-if="loading">{{$t('Loading...')}}</span>
                                    <span v-else>{{$t('Create New')}}</span>
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
