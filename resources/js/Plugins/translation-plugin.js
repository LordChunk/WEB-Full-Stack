import {createI18n} from "vue-i18n";
import en from "../../locale/en";
import nl from "../../locale/nl";


const i18n = createI18n({
  locale: 'nl', // set locale
  fallbackLocale: 'en', // set fallback locale
  messages: {en,nl},
})

export default i18n
