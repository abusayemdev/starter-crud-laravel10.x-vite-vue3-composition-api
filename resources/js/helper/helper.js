// resources/js/helper/helper.js

import axios from 'axios';
import { route } from 'routeHelper';
import { ref } from 'vue';

class Helper {

  //request function error response
  handleErrors(error, errorsRef) {
    if (error.response && error.response.data && error.response.data.errors) {
      errorsRef.value = Object.values(error.response.data.errors).flat();
    } else {
      errorsRef.value.push('An unexpected error occurred.');
    }
  };

  //uppercase 
  upperCase(value) {
    return value ? value.toUpperCase() : "";
  };

  //capitalization
  capitalize(value) {
    return value ? value.charAt(0).toUpperCase() + value.slice(1) : "";
  };


  // Currency load
  currency_load() {
    if (!localStorage.getItem('default_currency_info')) {
      localStorage.setItem('default_currency_info', 'USD');
    }
  }

  // Currency converter
  currency_converter(amount) {
    return format_price(convert_price(amount));
  }

  // Convert price
  convert_price(price) {
    currency_load();

    let exchange = localStorage.getItem('currency_exchange_rate') ||
      localStorage.getItem('default_currency_info.exchange_rate') || '';

    price = parseFloat(price) * parseFloat(exchange);

    return price;
  }

  // Currency symbol
  currency_symbol() {
    currency_load();

    let symbol = localStorage.getItem('currency_symbol') ||
      localStorage.getItem('default_currency_info.symbol') || '';

    return symbol;
  }

  // Format price
  format_price(price) {
    return currency_symbol() + ' ' + price.toFixed(2);
  }



}


export default Helper = new Helper();






