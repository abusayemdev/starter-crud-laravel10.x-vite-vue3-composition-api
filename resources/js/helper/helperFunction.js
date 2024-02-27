//resources/js/helper/helperFucntion.js
import axios from 'axios';
import { route } from 'routeHelper';
import { ref } from 'vue';

const translations = ref({});
const isLoading = ref(false);


class HelperFucntion {

  //translateTextMethod to call database text in vue component
  async translateTextMethod(text) {
    try {
      const response = await axios.get(route('translation', { id: text }));
      translations.value[text] = response.data.text;
      return translations.value[text];
    } catch (error) {
      console.error(error.response.data);
      return '';
    }
  };

  //trans to translate database text in vue component
  trans(text) {
    isLoading.value = true;
    const lang = localStorage.getItem('lang');

    if (lang !== 'en') {
      try {
        if (!translations.value[text]) {
          this.translateTextMethod(text);
        }
        console.log(translations.value[text]);
        return translations.value[text];
      } catch (error) {
        console.error('Error in lang function:', error);
        return text;
      } finally {
        isLoading.value = false;
      }
    }

    return text;
  };


}

export default new HelperFucntion();
