<template>
  <confirm-order />
</template>

<script>
import ConfirmOrder from "@/Shared/ConfirmOrder.vue";
import layout from "@/Shared/BootstrapLayout.vue";
import { Inertia } from "@inertiajs/inertia";

export default {
  layout,
  components: {
    ConfirmOrder,
  },
  methods: {
    confirmOrder() {
      Inertia.post(route("employee.order.confirm"), this.$order.content, {
        onSuccess: () => {
          this.$order.clear();
        },
      });
    },
  },
};
</script>

<style scoped lang="scss">
</style>
