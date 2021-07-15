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

<style scoped lang="scss">
.dish-wrapper {
  margin: 10px 0;
  padding: 1em;
  border: 1px solid yellow;
}

.dish-price {
  font-size: 1.2em;
  font-weight: bold;
}

// Remove margin from last p tag
p:last-child {
  margin: 0;
}
</style>
