<!-- resources/js/components/admin/translation/Translations.vue -->
<script setup>

import { ref, onMounted } from 'vue';
import { route } from 'routeHelper';
import useTranslation from '@/composables/admin/translation.js';
import {FilterMatchMode} from 'primevue/api';

//variables
const { loading, translations , getTranslations, editTranslation, destroyTranslation } = useTranslation();
const filters = ref({
    'global': {value: null, matchMode: FilterMatchMode.CONTAINS},
});

//hooks
onMounted(() => {
    getTranslations();
});

</script>

<template>
<div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-10">
        <h2>{{$t('admin.Translation List')}}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a :href="route('admin.dashboard')">{{$t('admin.Home')}}</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>{{$t('admin.Translation')}}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2 align-self-center ">
        <div class="my-auto">
            <a class="btn btn-primary btn-md float-right" :href="route('admin.translation.create')">{{$t('admin.Create Translation')}}</a>
        </div>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>{{$t('admin.Translation List')}}</h5>
                </div>

                <div class="ibox-content">
                    <DataTable :value="translations" stripedRows showGridlines responsiveLayout="scroll" :loading="loading" :paginator="true" :rows="10" paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown" :rowsPerPageOptions="[10,25,50]" :filters="filters" currentPageReportTemplate="Showing {first} to {last} of {totalRecords} entries">

                        <template #header>
                            <div class="flex justify-content-end">
                                <input type="text" v-model="filters['global'].value" placeholder="Search" class="rounded-md" />
                            </div>
                        </template>

                        <Column field="text" :header="$t('admin.Text')" :sortable="true"> </Column>
                        <Column field="lang" :header="$t('admin.Language')" :sortable="true"></Column>
                        <Column field="translation" :header="$t('admin.Translation')"></Column>
                        <Column :header="$t('admin.Action')">
                            <template #body="slotProps">
                                <button @click="editTranslation(slotProps.data.id)" class="btn btn-success btn-sm mr-1">{{$t('admin.Edit')}}</button>
                                <button @click="destroyTranslation(slotProps.data.id)" class="btn btn-danger btn-sm mr-1">{{$t('admin.Delete')}}</button>
                            </template>
                        </Column>

                    </DataTable>

                </div>
            </div>
        </div>
    </div>
</div>
</template>
