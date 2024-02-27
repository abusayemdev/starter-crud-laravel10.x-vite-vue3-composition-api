// resources/js/componentReg.js

import { createApp } from 'vue';


// Import components
//site
import exampleComponent from './components/exampleComponent.vue';
import welcomeComponent from './components/welcomeComponent.vue';
import languageDropdown from './components/languageDropdown.vue';

//admin
import adminLogin from './components/admin/auth/adminLogin.vue';
import adminHome from './components/admin/homeComponent.vue';
import settings from './components/admin/setting/settings.vue';
import createSetting from './components/admin/setting/create.vue';
import editSetting from './components/admin/setting/edit.vue';
import viewSetting from './components/admin/setting/view.vue';
import languages from './components/admin/language/languages.vue';
import createLanguage from './components/admin/language/create.vue';
import editLanguage from './components/admin/language/edit.vue';
import translations from './components/admin/translation/translations.vue';
import createTranslation from './components/admin/translation/create.vue';
import editTranslation from './components/admin/translation/edit.vue';


//custer
import customerLogin from './components/user/auth/customerLogin.vue';
import customerRegister from './components/user/auth/customerRegister.vue';
import homeComponent from './components/user/homeComponent.vue';
import userProfile from './components/user/profile/userProfile.vue';


//create app
const app = createApp({});

// Register global components
//site
app.component('example-component', exampleComponent);
app.component('welcome-component', welcomeComponent);
app.component('language-dropdown', languageDropdown);

//admin
app.component('admin-login', adminLogin);
app.component('admin-home', adminHome);
app.component('settings', settings);
app.component('create-setting', createSetting);
app.component('edit-setting', editSetting);
app.component('view-setting', viewSetting);
app.component('languages', languages);
app.component('create-language', createLanguage);
app.component('edit-language', editLanguage);
app.component('translations', translations);
app.component('create-translation', createTranslation);
app.component('edit-translation', editTranslation);


//customer
app.component('customer-login', customerLogin);
app.component('customer-register', customerRegister);
app.component('home-component', homeComponent);
app.component('user-profile', userProfile);


export default app;

