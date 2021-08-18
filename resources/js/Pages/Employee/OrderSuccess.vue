<template>
  <order-success :orderId="orderId" />
</template>

<script>
import layout from '@/Shared/BootstrapLayout.vue';
import OrderSuccess from '@/Shared/OrderSuccess.vue';

export default {
  layout,
  components: {
    OrderSuccess,
  },
  props: {
    orderId: {
      type: Number,
      required: true
    }
  }
}
</script>

<style>

</style>
