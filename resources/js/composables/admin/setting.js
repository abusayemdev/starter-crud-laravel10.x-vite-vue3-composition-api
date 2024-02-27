//resources/js/composables/admin/setting.js

import { ref } from 'vue';
import axios from 'axios';
import { route } from 'routeHelper';

export default function useSetting() {

//variables
const setting = ref({});
const settings = ref([]);
const errors = ref([]);
const loading = ref(false);

//methods
const getSettings = async () => {
    loading.value = true;
    const response = await axios.get(route('api.admin.setting.index'));
    settings.value = response.data.data;
    loading.value = false;
};

const getSetting = async (id) => {
    loading.value = true;
    const response = await axios.get(route('api.admin.setting.show', {id:id}));
    setting.value = response.data.data;
    loading.value = false;
}

const storeSetting = async (data) => {
    try {
        loading.value = true;
        await axios.post(route('api.admin.setting.store'), data, {
            headers: {
              'Content-Type': "multipart/form-data",
            }
        });
        window.location.href = route('admin.setting.index');
    } catch (error) {
        errors.value = error.response.data.errors;
    } finally{
        loading.value = false;
    }
}
const showSetting = (id) => {
    window.location.href = route('admin.setting.show', {id:id});
};

const editSetting = (id) => {
    window.location.href = route('admin.setting.edit', {id:id});
};

const updateSetting = async (id) => {
    try {
        loading.value = true;
        await axios.post(route('api.admin.setting.update', {id:id}), setting.value, {
            headers: {
              'Content-Type': "multipart/form-data",
              'X-HTTP-Method-Override': 'put',
            }
        });
        window.location.href = route('admin.setting.index');
    } catch (error) {
        errors.value = error.response.data.errors;
    } finally{
        loading.value = false;
    }
}

const destroySetting = async (id) => {
    if (!window.confirm('Are you sure?')) {
        return
    }
    await axios.delete(route('api.admin.setting.destroy', {id:id}))
    window.location.href = route('admin.setting.index');
}

const toggleStatusSetting = async (id) => {
    await axios.get(route('api.admin.toggle-status-setting', {id:id}))
    window.location.href = route('admin.setting.index');
}


return {

    errors,
    loading,
    setting,
    settings,
    getSetting,
    getSettings,
    storeSetting,
    showSetting,
    editSetting,
    updateSetting,
    destroySetting,
    toggleStatusSetting,
  
}


}

