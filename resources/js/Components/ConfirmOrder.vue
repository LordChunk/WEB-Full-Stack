<template>
  <h1 class="mb-4">Bestelling bevestingen</h1>
  <div>
    <div class="order-contents">
      <template v-for="dish in $order.content" :key="dish.id">
        <span>{{ dish.quantity }}x </span>
        <span> {{ dish.name }} </span>
        <span> {{ $formatPrice(dish.price) }} </span>
        <strong> {{ $formatPrice(dish.price * dish.quantity) }} </strong>
      </template>
    </div>

    <div class="checkout-wrapper">
      <strong> Totaalprijs: {{ $formatPrice($order.getTotalPrice()) }} </strong>
      <button class="btn btn-success" @click="confirmOrder()">Bestellen</button>
    </div>
  </div>
</template>

<script>
import { Inertia } from "@inertiajs/inertia";

export default {
  methods: {
    confirmOrder() {
      Inertia.post(
        route(this.$env.current() + ".order.confirm"),
        this.$order.content,
        {
          onSuccess: () => {
            this.$order.clear();
          },
        }
      );
    },
  },
};
</script>

<style scoped lang="scss">
.order-contents {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr;
  gap: 1em 1em;
}

.checkout-wrapper {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin: 1rem 0;
}
</style>
