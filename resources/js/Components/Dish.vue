<template>
  <div class="dish-wrapper">
    <div class="dish-header">
      <h2>{{ dish.menu_indicator }} {{ dish.name }}</h2>
      <i @click="toggleFavorite(dish)" class="far fa-heart"></i>
    </div>

    <p v-if="dish.description">{{ dish.description }}</p>
    <p class="dish-price">€ {{ dish.price }}</p>
    <p>
      <button class="btn btn-outline-info" @click="addToCart(dish)">Voeg toe aan winkelmand</button>
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
  methods: {
    addToCart(dish) {
      if (this.$store.state.cart === undefined) {
        this.$store.state.cart = [];
      }
      this.$store.state = {
        cart: this.$store.state.cart.concat(dish),
      };
    },

    toggleFavorite(dish) {

      let storedFavs = JSON.parse(localStorage.getItem("favorites") || "[]");

      let result = storedFavs.indexOf(dish);

      console.log(result)

      if (result !== -1){
        storedFavs.splice(result,1);
        // storedFavs = storedFavs.filter(function (dish){
        //   return dish !== value;
        // });
      }
      else{
        storedFavs.push(dish);
      }

      localStorage.setItem("favorites", JSON.stringify(storedFavs));

      console.log(storedFavs)
    },
  },
};
</script>

<style scoped>
.dish-header{
  display: flex;
  justify-content: space-between;
}
</style>
