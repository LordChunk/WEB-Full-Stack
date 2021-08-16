export default {
  install(app, options) {
    // Format prices to follow a "€ 1,00" format
    app.config.globalProperties.$formatPrice = (price) => {
      price = price - 0;
      price = price.toFixed(2);
      price = "€ "+ price;
      // replace . with ,
      price = price.replace(/\./g, ',');
      return price;
    }
  }
}
