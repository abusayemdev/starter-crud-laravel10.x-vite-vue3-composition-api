//resources/js/composables/admin/translation.js

import { ref } from 'vue';
import axios from 'axios';
import { route } from 'routeHelper';

export default function useTranslation() {

//variables
const translation = ref([]);
const translations = ref([]);
const languages = ref([]);
const errors = ref([]);
const loading = ref(false);

//methods
const getTranslations = async () => {
    loading.value = true;
    const response = await axios.get(route('api.admin.translation.index'));
    translations.value = response.data.data;
    loading.value = false;
};

const getLanguages = async () => {
    loading.value = true;
    const response = await axios.get(route('api.admin.language.index'));
    languages.value = response.data.data;
    loading.value = false;
};

const getTranslation = async (id) => {
    loading.value = true;
    const response = await axios.get(route('api.admin.translation.show', {id:id}));
    translation.value = response.data.data;
    loading.value = false;
}

const storeTranslation = async (data) => {
    try {
        loading.value = true;
        await axios.post(route('api.admin.translation.store'), data);
        window.location.href = route('admin.translation.index');
    } catch (error) {
        errors.value = error.response.data.errors;
    } finally {
        loading.value = false;
    }
}

const editTranslation = (id) => {
    window.location.href = route('admin.translation.edit', {id:id});
};

const updateTranslation = async (id) => {
    try {
        loading.value = true;
        await axios.put(route('api.admin.translation.update', {id:id}), translation.value);
        window.location.href = route('admin.translation.index');
    } catch (error) {
        errors.value = error.response.data.errors;
    } finally {
        loading.value = false;
    }
}

const destroyTranslation = async (id) => {
    if (!window.confirm('Are you sure?')) {
        return
    }
    await axios.delete(route('api.admin.translation.destroy', {id:id}))
    window.location.href = route('admin.translation.index');
}


return {

    errors,
    loading,
    translation,
    translations,
    languages,
    getTranslations,
    getLanguages,
    getTranslation,
    storeTranslation,
    editTranslation,
    updateTranslation,
    destroyTranslation,
  
}


}

