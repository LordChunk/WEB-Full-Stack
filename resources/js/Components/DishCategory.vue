<template>
  <div class="container">
    <h2>{{ dishType.name }}</h2>
    <!-- Generate div for each dish -->
    <dish v-for="dish in dishType.dishes" :key="dish.id" :dish="dish">
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
  },
  components: {
    Dish,
  },
};
</script>
