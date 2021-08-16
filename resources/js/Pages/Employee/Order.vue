<template>
  <div class="container">
    <h1 class="mb-4">Bestelling bevestingen</h1>
    <div>
      <div class="cart-dish" v-for="dish in $order.content" :key="dish.id">
        <div class="quantity-wrapper">
          <span>{{ dish.quantity }}x </span>
          <span> {{ dish.name }} </span>
          <span> {{ $formatPrice(dish.price) }} </span>
          <strong> {{ $formatPrice(dish.price * dish.quantity) }} </strong>
        </div>
        <hr />
      </div>
      <div class="checkout-wrapper">
        <strong>
          Totaalprijs: {{ $formatPrice($order.getTotalPrice()) }}
        </strong>
        <button class="btn btn-success" @click="confirmOrder()">
          Bestellen
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import Cart from "@/Components/Cart.vue";
import layout from "@/Shared/BootstrapLayout.vue";
import { Inertia } from "@inertiajs/inertia";

export default {
  layout,
  components: { Cart },
  methods: {
    confirmOrder() {
      Inertia.post(route("employee.order.confirm"), this.$order.content, {
        onSuccess: () => {
          this.$order.clear();
        }
      });
    },
  },
};
</script>

<style scoped lang="scss">
.quantity-wrapper {
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 100%;
}

.checkout-wrapper {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin: 1rem 0;
}
</style>
