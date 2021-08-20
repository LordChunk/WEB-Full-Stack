<template>
  <div v-for="discount in discounts" :key="discount.id">
    <advertisement :discount="discount" />
  </div>
</template>

<script>
import Advertisement from "@/Components/Advertisement.vue";
import Layout from "@/Shared/CustomerLayout.vue";

export default {
  layout: Layout,
  components: {
    Advertisement,
  },
  props: {
    discount: Object,
    discounts: {
      type: Array[
        {
          type: {
            id: Number,
            dish_id: Number,
            isStudentDiscount: Boolean,
            discountPercentage: Number,
            startDate: Date,
            endDate: Date,
            dish: Object,
          },
        }
      ],
      required: true,
    },
  },
};
</script>

<style>
</style>
