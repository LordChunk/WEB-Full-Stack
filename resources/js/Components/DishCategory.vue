<template>
  <div class="container" v-if="filteredDishes.length !== 0">
    <h2>{{ dishType.name }}</h2>
    <!-- Generate div for each dish -->
    <dish v-for="dish in filteredDishes" :key="dish.id" :dish="dish">
    </dish>
  </div>
</template>

<script>
import Dish from "./Dish.vue"
export default {
  props: {
    dishType: {
      type: Object,
    },
    searchTerm: {
      type: String,
      default: "",
    },
  },
  components: {
    Dish,
  },
  computed: {
    filteredDishes() {
      // Check if search term matches with dishType name
      if (this.dishType.name.toLowerCase().includes(this.searchTerm.toLowerCase())) {
        return this.dishType.dishes;
      }

      return this.dishType.dishes.filter((dish) => {
        // Filter based on name, description and menu indicator
        return (
          dish.name.toLowerCase().includes(this.searchTerm.toLowerCase()) ||
          dish.description?.toLowerCase().includes(this.searchTerm.toLowerCase()) ||
          dish.menu_indicator.toLowerCase().includes(this.searchTerm.toLowerCase())
        );
      });
    },
  },
};
</script>
