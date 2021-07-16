<template>
  <div>
    <dish-type
      v-for="dishType in dishTypes"
      :key="dishType.name"
      :dishType="dishType">
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
  }
};
</script>

<style scoped lang="scss">
* {
  color: white;
}
</style>
