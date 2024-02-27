<!-- resources/js/components/languageDropdown.vue -->
<script setup>

import { ref } from 'vue';
import { route } from 'routeHelper';

//variables
const selectedLanguage = ref('');
const supportedLanguages = {
  en: 'English',
  ar: 'عربي',
  es: 'Español',
  // Add more languages as needed
};

selectedLanguage.value = localStorage.getItem('lang') || 'en';

//methods
const changeLanguage = () => {
  try{
    GlobalVar.isLanguage.value = false;
    AppStorage.storeLocale(selectedLanguage.value)

    setTimeout(() => {
      window.location.href = route('locale', {id:selectedLanguage.value});
    }, 1000);
   
  } catch(error) {
    console.log(error)
  } finally{
    GlobalVar.isLanguage.value = true;
  }

};

</script>

<template>
  <select v-model="selectedLanguage" @change="changeLanguage" class="lang-dropdown">
    <option v-for="(language, key) in supportedLanguages" :key="key" :value="key">
      {{ language }}
    </option>
  </select>
</template>
  
<style scoped>
.language{
  position: absolute
}
.lang-dropdown {
  padding: 1px 35px 1px 10px;
  color: inherit;
}

select{
  border-color: #f1f1fc;
  appearance: none; 
  -webkit-appearance: none;
  -moz-appearance: none;
  padding: 5px;
  background-color: inherit; 
  border: 1px solid #ccc; 
  color: #333;
}

</style>
