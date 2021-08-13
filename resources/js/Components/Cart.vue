<template>
  <div
    class="cart container"
    :class="{
      'open-cart': isCartOpen,
      'hide-cart': $order.content.length === 0,
    }"
  >
    <div class="draggable" @click="clickCart">
      <img src="/images/drag_handle_black_24dp.svg" />
    </div>
    <div class="cart-header">
      <h2>Winkelmand</h2>
      <button class="btn btn-outline-danger" @click="clearOrder()">
        Winkelmand legen
      </button>
    </div>
    <div>
      <div class="cart-dish" v-for="dish in $order.content" :key="dish.id">
        <div class="quantity-wrapper">
          <button class="btn" @click="$order.add(dish)">+</button>
          <span>{{ dish.quantity }}x</span>
          <button class="btn" @click="$order.remove(dish)">-</button>
          <span> {{ dish.name }} </span>
        </div>
        <div class="price-wrapper">
          <span> {{ $formatPrice(dish.price) }} per stuk </span>
          <strong>
            {{ $formatPrice(dish.price * dish.quantity) }} totaal
          </strong>
        </div>
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
    clearOrder() {
      this.isCartOpen = false;

      // Let menu animation play out before removing cart
      setTimeout(() => {
        this.$order.clear();
      }, 300);
    }
  },
};
</script>

<style lang="scss">
.cart {
  background: #bdf4ff;
  border-radius: 1rem 1rem 0 0;
  box-shadow: 0px 9px 15px 15px rgb(0 0 0 / 17%);

  // Desktop only
  @media (min-width: 768px) {
    position: fixed;
    max-width: 40vw;
    left: 58vw;
    bottom: 0;
    top: 10rem;
    overflow-y: scroll;
  }

  // Mobile only
  @media (max-width: 767px) {
    position: fixed;
    left: 0;
    bottom: 0;
    right: 0;
    // Creates proper CSS height animation
    // https://stackoverflow.com/questions/3508605/how-can-i-transition-height-0-to-height-auto-using-css
    height: 100vh;
    max-height: 2em;
  }

  .cart-header {
    display: flex;
    justify-content: space-between;
    margin: 1.5rem 0;
  }

  .draggable {
    @media (min-width: 767px) {
      display: none;
    }

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
  flex-wrap: wrap;
  padding: 0.5rem;
  margin: 0.5rem;
  border-radius: 0.5rem;
  background: #fff;
  box-shadow: 0px 9px 15px 15px rgb(0 0 0 / 10%);
  transition: all 300ms;
  // Add hover effect
  &:hover {
    box-shadow: 0px 9px 15px 15px rgb(0 0 0 / 10%);
  }
  button {
    font-weight: bold;
  }

  .quantity-wrapper {
    display: flex;
    align-items: center;
    flex-wrap: nowrap;
    // Use full width on mobile
    @media (max-width: 767px) {
      width: 100%;
    }
  }
  .price-wrapper {
    display: flex;
    justify-content: space-between;
    width: -webkit-fill-available;

    // Add padding which is the same as Boostrap buttons
    padding: .375rem .75rem;
  }
}

.open-cart {
  max-height: 100vh;
}
.hide-cart {
  max-height: 0;
  opacity: 0;
}
</style>
