<!-- resources/js/components/admin/language/Languages.vue -->
<script setup>

import { ref, onMounted } from 'vue';
import { route } from 'routeHelper';
import useLanguage from '@/composables/admin/language.js';
import {FilterMatchMode} from 'primevue/api';

//variables
const { loading, languages, getLanguages, editLanguage, destroyLanguage } = useLanguage();
const filters = ref({
    'global': {value: null, matchMode: FilterMatchMode.CONTAINS},
});

//hooks
onMounted(() => {
    getLanguages();
    
});

</script>

<template>
<div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-10">
        <h2>{{$t('admin.Language List')}}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a :href="route('admin.dashboard')">{{$t('admin.Home')}}</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>{{$t('admin.Language')}}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2 align-self-center ">
        <div class="my-auto">
            <a class="btn btn-primary btn-md float-right" :href="route('admin.language.create')">{{$t('admin.Create Language')}}</a>
        </div>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>{{$t('admin.Language List')}}</h5>
                </div>
                <div class="ibox-content">
                    <DataTable :value="languages" stripedRows showGridlines responsiveLayout="scroll" :loading="loading" :paginator="true" :rows="10" paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown" :rowsPerPageOptions="[10,25,50]" :filters="filters" currentPageReportTemplate="Showing {first} to {last} of {totalRecords} entries">

                        <template #header>
                            <div class="flex justify-content-end">
                                <input type="text" v-model="filters['global'].value" placeholder="Search" class="rounded-md" />
                            </div>
                        </template>

                        <Column field="name" :header="$t('admin.Language')" :sortable="true"></Column>
                        <Column field="code" :header="$t('admin.Code')" :sortable="true"> </Column>
                        <Column :header="$t('admin.Action')">
                            <template #body="slotProps">
                                <button @click="editLanguage(slotProps.data.id)" class="btn btn-success btn-sm mr-1">{{$t('admin.Edit')}}</button>
                                <button @click="destroyLanguage(slotProps.data.id)" class="btn btn-danger btn-sm mr-1">{{$t('admin.Delete')}}</button>
                            </template>
                        </Column>

                    </DataTable>

                </div>
            </div>
        </div>
    </div>
</div>
</template>
