//resources/js/composables/admin/language.js

import { ref } from 'vue';
import axios from 'axios';
import { route } from 'routeHelper';

export default function useLanguage() {

//variables
const language = ref([]);
const languages = ref([]);
const errors = ref([]);
const loading = ref(false);


//methods
const getLanguages = async () => {
    loading.value = true;
    const response = await axios.get(route('api.admin.language.index'));
    languages.value = response.data.data;
    loading.value = false;
};

const getLanguage = async (id) => {
    loading.value = true;
    const response = await axios.get(route('api.admin.language.show', {id:id}));
    language.value = response.data.data;
    loading.value = false;
}

const storeLanguage = async (data) => {
    try {
        loading.value = true;
        await axios.post(route('api.admin.language.store'), data);
        window.location.href = route('admin.language.index');
    } catch (error) {
        errors.value = error.response.data.errors;
    } finally{
        loading.value = false;
    }
}

const editLanguage = (id) => {
    window.location.href = route('admin.language.edit', {id:id});
};

const updateLanguage = async (id) => {
    try {
        loading.value = true;
        await axios.put(route('api.admin.language.update', {id:id}), language.value);
        window.location.href = route('admin.language.index');
    } catch (error) {
        errors.value = error.response.data.errors;
    } finally {
        loading.value = false;
    }
}

const destroyLanguage = async (id) => {
    if (!window.confirm('Are you sure?')) {
        return
    }
    await axios.delete(route('api.admin.language.destroy', {id:id}))
    window.location.href = route('admin.language.index');
}


return {

    errors,
    loading,
    language,
    languages,
    getLanguages,
    getLanguage,
    storeLanguage,
    editLanguage,
    updateLanguage,
    destroyLanguage,
  
}


}

