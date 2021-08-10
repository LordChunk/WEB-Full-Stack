<template>
  <div class="customer-menu">
    <dish-type
      v-for="dishType in dishTypes"
      :key="dishType.name"
      :dishType="dishType"
    >
    </dish-type>
  </div>
</template>

<script>
import Layout from "@/Shared/CustomerLayout.vue";
import DishType from "@/Components/DishCategory.vue";
export default {
  layout: Layout,
  props: {
    dishTypes: {
      type: Array[
        {
          type: {
            id: Number,
            menu_indicator: String,
            name: String,
            price: Number,
            description: String,
            dish_type: String,
          },
        }
      ],
      required: true,
    },
  },
  components: {
    DishType,
  },
};
</script>

<style scoped lang="scss">
* {
  color: white;
}

// Style all dish elements according to customer layout
:deep(.dish-wrapper) {
  margin: 10px 0;
  padding: 1em;
  border: 1px solid yellow;

  .dish-price {
    font-size: 1.2em;
    font-weight: bold;
  }

  // Remove margin from last p tag
  p:last-child {
    margin: 0;
  }
}
</style>
