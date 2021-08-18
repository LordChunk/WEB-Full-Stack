<template>
  <div class="container">
    <confirm-order/>
  </div>
</template>

<script>
import layout from "@/Shared/CustomerLayout.vue";
import ConfirmOrder from '@/Shared/ConfirmOrder.vue';

export default {
  layout,
  components: {
    ConfirmOrder,
  },
};
</script>

<style scoped lang="scss">
* {
  color: white;
}
</style>
