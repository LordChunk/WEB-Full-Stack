export default {
  install(app, options) {
    app.config.globalProperties.$order = {
      addItem(item) {
        console.log('Order plugin is working!');
      }
    }
  }
}
