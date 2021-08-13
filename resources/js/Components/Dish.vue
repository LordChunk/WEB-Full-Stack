<template>
  <div class="dish-wrapper">
    <h2>{{ dish.menu_indicator }} {{ dish.name }}</h2>
    <p v-if="dish.description">{{ dish.description }}</p>
    <p class="dish-price">€ {{ dish.price }}</p>
    <p>
      <button class="btn btn-outline-info" @click="$order.add(dish)">Voeg toe aan winkelmand</button>
    </p>
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
