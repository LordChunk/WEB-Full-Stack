import { reactive } from 'vue'

export default {
  install: (app, options) => {
    // Init order plugin with previous data
    orderPlugin.content = JSON.parse(localStorage.getItem('order') || '[]');
    // ensure reactivity
    app.config.globalProperties.$order = reactive(orderPlugin);
  },

}

const orderPlugin = {
  content: [],

  add(item) {
    // Check if the item is already in the basket
    if (this.content.indexOf(item) === -1) {
      item.quantity = 1;
      this.content.push(item);
    } else {
      // increase the quantity of the item
      this.content[this.content.indexOf(item)].quantity++;
    }
    this.saveToLocalStorage();
  },
  remove(item) {
    // decrease the quantity of the item
    this.content[this.content.indexOf(item)].quantity--;
    // remove the item if the quantity is 0
    if (this.content[this.content.indexOf(item)].quantity === 0) {
      this.content.splice(this.content.indexOf(item), 1);
    }
    this.saveToLocalStorage();
  },
  clear() {
    this.content = [];
    this.saveToLocalStorage();
  },
  getTotalPrice() {
    let total = 0;
    for (let i = 0; i < this.content.length; i++) {
      total += this.content[i].price * this.content[i].quantity;
    }
    return total;
  },

  saveToLocalStorage() {
    localStorage.setItem('order', JSON.stringify(this.content));
  }
}

