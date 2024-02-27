<!-- resources/js/components/admin/setting/View.vue -->
<script setup>

import { onMounted } from 'vue';
import { route, asset } from 'routeHelper';
import useSetting from '@/composables/admin/setting.js';

//variables
const { setting, getSetting } = useSetting(); 
const props = defineProps(['id']);

//hooks
onMounted(() => {
    getSetting(props.id);
});

</script>

<template>
 <div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-10">
        <h2>{{$t('admin.Settings Details')}}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a :href="route('admin.dashboard')">{{$t('admin.Home')}}</a>
            </li>
            <li class="breadcrumb-item">
                <a :href="route('admin.setting.index')">{{$t('admin.Settings')}}</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>{{$t('admin.Settings Details')}}</strong>
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
                    <h5>{{$t('admin.Settings Details')}}</h5>
                </div>
                <div class="ibox-content">
                    <dl class="row">
                        <dt class="col-sm-3">ID <span class="float-right">:</span></dt>
                        <dd class="col-sm-9">{{setting.id}}</dd>
                        <dt class="col-sm-3">{{$t('admin.Site Name')}} <span class="float-right">:</span></dt>
                        <dd class="col-sm-9">{{setting.Name}}</dd>
                        <dt class="col-sm-3">{{$t('admin.Logo')}} <span class="float-right">:</span></dt>
                        <dd class="col-sm-9"> <img :src="asset(setting.Logo)" width="100px"></dd>
                        <dt class="col-sm-3">{{$t('admin.Email')}} <span class="float-right">:</span></dt>
                        <dd class="col-sm-9">{{setting.Email}}</dd>
                        <dt class="col-sm-3">{{$t('admin.Address')}} <span class="float-right">:</span></dt>
                        <dd class="col-sm-9">{{setting.Address}}</dd>
                        <dt class="col-sm-3">{{$t('admin.Contact Number')}} <span class="float-right">:</span></dt>
                        <dd class="col-sm-9">{{setting.ContactNumber}}</dd>
                        <dt class="col-sm-3">{{$t('admin.About')}} <span class="float-right">:</span></dt>
                        <dd class="col-sm-9">{{setting.About}}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
</template>