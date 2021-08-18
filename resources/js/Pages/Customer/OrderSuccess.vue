<template>
  <order-success :orderId="orderId" :tableNumber="tableNumber" />
</template>

<script>
import Layout from "@/Shared/CustomerLayout.vue";
import OrderSuccess from "@/Shared/OrderSuccess.vue";

export default {
  layout: Layout,
  components: {
    OrderSuccess
  },
  props: {
    orderId: {
      type: Number,
      required: true
    },
    tableNumber: {
      type: Number,
      required: true
    },
  }
};
</script>

<style scoped lang="scss">
* {
  color: white;
}

:deep(a) {
  color: yellow;
}
</style>
