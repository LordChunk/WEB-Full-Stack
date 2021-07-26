export default {
  install(Vue) {
    Vue.prototype.$store = {
      // Fetch the state from local storage
      _state: JSON.parse(localStorage.getItem('state') || '{}'),

      set state(newState) {
        // Merge state and override with new values
        this._state = {
          ...this._state,
          ...newState,
        };
        localStorage.setItem('state', JSON.stringify(this._state));
      },

      get state() {
        return this._state;
      },

      clear(key) {
        if (key) {
          delete this._state[key];
        } else {
          delete this._state;
        }
        localStorage.setItem('state', JSON.stringify(this._state));
      },
    }
  }
}
