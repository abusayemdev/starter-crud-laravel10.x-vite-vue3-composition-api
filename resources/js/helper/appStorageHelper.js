// resources/js/helper/appStorageHelper.js

class AppStorage {

    //store locale for language 
    storeLocale (lang) {
        localStorage.setItem('lang', lang);
    }

}

export default AppStorage = new AppStorage();