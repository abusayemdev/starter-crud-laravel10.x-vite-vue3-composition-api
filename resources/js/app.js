// resources/js/app.js
import app from './componentReg.js';
import router from './router.js';
import Helper from './helper/helper.js';
import HelperFunction from './helper/helperFunction.js'
import AppStorage from './helper/appStorageHelper.js';
import { globalVar } from './globalVar.js';

//import packages
import { i18nVue } from 'laravel-vue-i18n';

//DataTable
import 'primevue/resources/themes/tailwind-light/theme.css';
import 'primevue/resources/primevue.min.css';
import 'primeicons/primeicons.css';

import PrimeVue from 'primevue/config'
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import ColumnGroup from 'primevue/columngroup';
import Row from 'primevue/row';


//define classes globally
window.AppStorage = AppStorage;
window.Helper = Helper;
window.HelperFunction = HelperFunction;
window.GlobalVar = globalVar;


// Mount app
app.use(router);
app.use(i18nVue, {
    resolve: async lang => {
        const langs = import.meta.glob('../../lang/*.json');
        return await langs[`../../lang/${lang}.json`]();
    }
});
app.use(PrimeVue);
app.component('DataTable', DataTable);
app.component('Column', Column);
app.component('ColumnGroup', ColumnGroup);
app.component('Row', Row);
app.mount('#app'); 



 

