import { usePage } from '@inertiajs/inertia-vue3';
import { computed } from 'vue';

export default {
  install(app, options) {
    app.config.globalProperties.$auth = {
      /**
       * Get role for current user
       * @returns {object | null} return role object or null if user is not logged in
       **/
      get role() {
        return computed(() => usePage().props.value.auth.user?.role);
      },

      /**
       * Get auth state for current user
       * @returns {boolean} true - logged in, false - not logged in
       **/
      get state() {
        return computed(() =>  usePage().props.value.auth.user !== null);
      },

      /**
       * Get user object for current user
       * @returns {object | null} return user object or null if user is not logged in
       * @example
       *   $auth.user;
       **/
      get user() {
        return computed(() => usePage().props.value.auth.user);
      }
    };
  }
}
