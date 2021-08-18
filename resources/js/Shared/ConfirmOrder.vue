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

    <div v-if="$env.isCustomer()" class="table-nubmer mt-4">
      <span>Uw tafelnummer: </span>
      <input type="number" v-model="table_number" />
      <strong v-if="table_warn"> Tafelnummer is niet correct</strong>
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
  data() {
    return {
      table_number: 0,
      table_warn: false
    };
  },
  methods: {
    confirmOrder() {
      if (this.table_number == 0 && this.$env.isCustomer()) {
        this.table_warn = true;
        return;
      }

      Inertia.post(
        route(this.$env.current() + ".order.confirm"),
        {
          table_number: this.table_number === 0 ? null : this.table_number,
          dishes: this.$order.content,
        },
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
