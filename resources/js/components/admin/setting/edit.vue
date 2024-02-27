<!-- resources/js/components/admin/setting/edit.vue -->
<script setup>

import { ref, onMounted } from 'vue';
import { route, asset } from 'routeHelper';
import useSetting from '@/composables/admin/setting.js';


//variables
const { loading, errors, setting, updateSetting, getSetting } = useSetting(); 
const props = defineProps(['id']);
const fileInput = ref('');
const image = ref('');
const imageName = ref('');
const imageUrl = ref('');

//methods
const readFile = () => {
    const file = fileInput.value.files[0];
    image.value = file;
    imageName.value = file.name;
    setting.value.Logo = file;

    const fileReader = new FileReader();
    fileReader.onload = function (e) {
        imageUrl.value = e.target.result;
    };
    fileReader.readAsDataURL(file);
};

onMounted(() => {
    getSetting(props.id);
});


</script>

<template>
    <div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-10">
        <h2>{{$t('admin.Edit Settings')}}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a :href="route('admin.dashboard')">{{$t('admin.Home')}}</a>
            </li>
            <li class="breadcrumb-item">
                <a :href="route('admin.setting.index')">{{$t('admin.Settings')}}</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>{{$t('admin.Edit Settings')}}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2 align-self-center ">
        <div class="my-auto">
            <a class="btn btn-primary btn-md float-right"
                :href="route('admin.setting.index')">{{$t('admin.Settings List')}}</a>
        </div>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>{{$t('admin.Edit Settings')}}</h5>
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
                    <form @submit.prevent="updateSetting(props.id)">
                       
                        <div class="form-group  row">
                            <label class="col-sm-2 col-form-label">{{$t('admin.Site Name')}} <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text"  v-model="setting.Name"  :placeholder="$t('admin.Site Name')"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="form-group  row">
                            <label class="col-sm-2 col-form-label">{{$t('admin.Email')}} <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="email" v-model="setting.Email" :placeholder="$t('admin.Email')"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="form-group  row">
                            <label class="col-sm-2 col-form-label">{{$t('admin.Address')}}</label>
                            <div class="col-sm-10">
                                <input type="text" v-model="setting.Address" :placeholder="$t('admin.Address')"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="form-group  row">
                            <label class="col-sm-2 col-form-label">{{$t('admin.Contact Number')}}</label>
                            <div class="col-sm-10">
                                <input type="text" v-model="setting.ContactNumber"
                                    :placeholder="$t('admin.Contact Number')" class="form-control">
                            </div>
                        </div>

                        <div class="form-group  row">
                            <label class="col-sm-2 col-form-label">{{$t('admin.About')}} </label>
                            <div class="col-sm-10">
                                <textarea v-model="setting.About" id="About" :placeholder="$t('admin.About')" class="form-control"
                                    rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group  row">
                            <label class="col-sm-2 col-form-label">{{$t('admin.Site Logo')}}</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input id="logo" ref="fileInput" type="file" accept="image/*"  @change="readFile" >
                                    <label for="logo" class="custom-file-label">{{imageName ? imageName : $t('admin.Choose file')}}</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group  row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <img id="image" v-if="imageUrl"  :src="imageUrl" style="width:80px;">
                                <img id="image" v-else v-if="setting.Logo" :src="asset(setting.Logo)" style="width:80px;">
                                
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
