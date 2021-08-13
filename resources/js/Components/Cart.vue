<template>
  <div
    class="cart container px-4"
    v-bind:class="{
      'open-cart': isCartOpen,
      'hide-cart': $order.content.length === 0,
    }"
  >
    <div class="draggable" @click="clickCart">
      <img src="/images/drag_handle_black_24dp.svg" />
    </div>
    <div class="cart-header">
      <h2>Winkelmand</h2>
    </div>
    <div>
      <div class="cart-dish" v-for="dish in $order.content" :key="dish.id">
        <span>
          <div class="quantity-wrapper">
            <button class="btn" @click="$order.add(dish)">+</button>
            <span>{{ dish.quantity }}x</span>
            <button class="btn" @click="$order.remove(dish)">-</button>
          </div>
        </span>
        <span> {{ dish.name }} </span>
        <span> {{ $formatPrice(dish.price) }} per stuk </span>
        <span> {{ $formatPrice(dish.price*dish.quantity) }} totaal </span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isCartOpen: false,
    };
  },
  methods: {
    clickCart() {
      this.isCartOpen = !this.isCartOpen;
    },
  },
};
</script>

<style lang="scss">
.cart {
  position: fixed;
  left: 0;
  bottom: 0;
  right: 0;
  border-radius: 1rem 1rem 0 0;
  background: #bdf4ff;
  box-shadow: 0px 9px 15px 15px rgb(0 0 0 / 17%);

  // Creates proper CSS height animation
  // https://stackoverflow.com/questions/3508605/how-can-i-transition-height-0-to-height-auto-using-css
  height: 100vh;
  max-height: 2em;

  .draggable {
    cursor: pointer;
    display: flex;
    justify-content: center;
    img {
      width: 2em;
    }
  }
  transition: max-height 300ms;
}

.cart-dish {
  display: flex;
  justify-content: space-between;
  align-items: center;
  align-content: center;
  padding: 0.5rem;
  margin: 0.5rem;
  border-radius: 0.5rem;
  background: #fff;
  box-shadow: 0px 9px 15px 15px rgb(0 0 0 / 10%);
  transition: all 300ms;
  // Add hover effect
  &:hover {
    background: #bdf4ff;
    box-shadow: 0px 9px 15px 15px rgb(0 0 0 / 10%);
  }
  button {
    font-weight: bold;
  }

  .quantity-wrapper {
    display: flex;
    align-items: center;
  }
}

.open-cart {
  max-height: 100vh;
}
.hide-cart {
  max-height: 0;
}
</style>
