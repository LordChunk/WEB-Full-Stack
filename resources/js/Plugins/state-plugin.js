import { reactive } from 'vue'

export default {
  install: (app, options) => {
    // Create observable to ensure reactivity
    const observableStateManager = reactive(stateManager);
    app.config.globalProperties.$store = observableStateManager;
  }
}

const stateManager = {
  // Initialise the state from local storage
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
      this.state[key] = undefined;
    } else {
      this.state = {};
    }
    localStorage.setItem('state', JSON.stringify(this._state));
  },
}
