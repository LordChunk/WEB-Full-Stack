<template>
  <div class="dish-wrapper">
    <h2>{{ dish.menu_indicator }} {{ dish.name }}</h2>
    <p v-if="dish.description">{{ dish.description }}</p>
    <p class="dish-price">€ {{ dish.price }}</p>
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
