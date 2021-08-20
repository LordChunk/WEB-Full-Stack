<template>
  <div v-for="discount in discounts"
       :key="discount.id">
    <add
      :discount="discount"
    />
  </div>
</template>

<script>
import advertisement from "@/Components/Add.vue";
import Layout from "@/Shared/CustomerLayout.vue";

export default {
  layout: Layout,
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
  component: {
    advertisement,
  },
}
</script>

<style>

</style>
