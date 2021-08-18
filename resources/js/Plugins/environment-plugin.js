export default {
  install(app, options) {
    app.config.globalProperties.$env = {
      isEmployee() {
        return route().current().startsWith("employee.");
      },
      isCustomer() {
        return route().current().startsWith("customer.");
      },
      current() {
        return route().current().split(".")[0];
      }
    }
  }
}
