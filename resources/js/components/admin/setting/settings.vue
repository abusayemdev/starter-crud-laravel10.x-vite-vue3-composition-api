<!-- resources/js/components/admin/setting/settings.vue -->
<script setup>

import { ref, onMounted } from 'vue';
import { route, asset } from 'routeHelper';
import useSetting from '@/composables/admin/setting.js';
import {FilterMatchMode} from 'primevue/api';

//variables
const { loading, settings , getSettings, showSetting, editSetting, destroySetting, toggleStatusSetting } = useSetting();
const filters = ref({
    'global': {value: null, matchMode: FilterMatchMode.CONTAINS},
});

//hooks
onMounted(() => {
    getSettings();
    
});

</script>
<template>
 <div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-10">
        <h2>{{$t('admin.Settings List')}}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a :href="route('admin.dashboard')">{{$t('admin.Home')}}</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>{{$t('admin.Settings')}}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2 align-self-center ">
        <div class="my-auto">
            <a class="btn btn-primary btn-md float-right"
                :href="route('admin.setting.create')">{{$t('admin.Create Settings')}}</a>
        </div>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>{{$t('admin.Settings List')}}</h5>
                </div>
                <div class="ibox-content">
                    <DataTable :value="settings" stripedRows showGridlines responsiveLayout="scroll" :loading="loading" :paginator="true" :rows="10" paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown" :rowsPerPageOptions="[10,25,50]" :filters="filters" currentPageReportTemplate="Showing {first} to {last} of {totalRecords} entries">

                        <template #header>
                            <div class="flex justify-content-end">
                                <input type="text" v-model="filters['global'].value" placeholder="Search" class="rounded-md" />
                            </div>
                        </template>

                        <Column field="Name" :header="$t('admin.Name')" :sortable="true"> </Column>
                        <Column field="Email" :header="$t('admin.Email')" :sortable="true"> </Column>
                        <Column field="Logo" :header="$t('admin.Logo')"> 
                            <template #body="slotProps">
                                <img :src="asset(slotProps.data.Logo)" :alt="slotProps.data.Logo" width="50px" height="50px" />
                            </template>
                        </Column>
                        <Column :header="$t('admin.Status')">
                            <template #body="slotProps">
                               
                                <span v-if="slotProps.data.Status == 1" class="badge">Active</span>
                                <span v-if="slotProps.data.Status == 0" class="badge">Inactive</span>
    
                                <label class="switch ml-3">
                                    <input type="checkbox" class="input_status" :checked="slotProps.data.Status === 1 ? true : false"  
                                    @change="toggleStatusSetting(slotProps.data.id)">
                                    <span class="slider round"></span>
                                </label>
                            </template>
                        </Column>
                        <Column :header="$t('admin.Action')">
                            <template #body="slotProps">
                                <button @click="showSetting(slotProps.data.id)" class="btn btn-primary btn-sm mr-1">{{$t('admin.View')}}</button>
                                <button @click="editSetting(slotProps.data.id)" class="btn btn-success btn-sm mr-1">{{$t('admin.Edit')}}</button>
                                <button @click="destroySetting(slotProps.data.id)" class="btn btn-danger btn-sm mr-1">{{$t('admin.Delete')}}</button>
                            </template>
                        </Column>
                    </DataTable>
                </div>
            </div>
        </div>
    </div>
</div>
</template>