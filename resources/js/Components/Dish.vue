<template>
  <div>
    <h2>{{ dish.menu_indicator }} {{ dish.name }}</h2>
    <p>{{ dish.description }}</p>
    <p>Price: €{{ dish.price }}</p>
    <!-- <p>
          <button @click="addToCart(dishType, dish)">Add to cart</button>
        </p> -->
  </div>
</template>

<script>
export default {
  props: {
    dish: {
      type: Object,
    },
  },
};
</script>

<style>
</style>
