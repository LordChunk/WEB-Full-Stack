export default {
  install(Vue, options) {
    Vue.prototype.$order = {
      addItem(item) {
        console.log('Order plugin is working!');
      }
    }
  }
}
