<template>
  <div class="dish-wrapper">
    <div class="dish-header">
      <h2>{{ dish.menu_indicator }} {{ dish.name }}</h2>
      <i
        v-if="isCustomerMenu"
        @click="toggleFavorite(dish)"
        :class="{ fas: isFavourite, far: !isFavourite }"
        class="far fa-heart"
      ></i>
    </div>

    <p v-if="dish.description">{{ dish.description }}</p>
    <p class="dish-price">€ {{ dish.price }}</p>
    <p>
      <button
        v-if="isEmployeeMenu"
         @click="$order.add(dish)"
        class="btn btn-outline-info"
      >
        Voeg toe aan winkelmand
      </button>
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
  data() {
    return {
      isFavourite: false,
      isEmployeeMenu: route().current().startsWith('employee.'),
      isCustomerMenu: route().current().startsWith('customer.'),
    };
  },
  created() {
    this.isFavourite = this.isDishFavorited(this.dish);
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
      // Fetch current favourited dishes
      let favourites = JSON.parse(localStorage.getItem("favorites") || "[]");

      // Check if new dish is already favorited
      const isFavorited = favourites.some((fav) => fav.id === dish.id);
      // Toggle favourite
      if (isFavorited) {
        favourites = favourites.filter((fav) => fav.id !== dish.id);
      } else {
        favourites.push(dish);
      }

      // Save favourites
      localStorage.setItem("favorites", JSON.stringify(favourites));
      // Update state
      this.isFavourite = !this.isFavourite;
    },
    isDishFavorited(dish) {
      // Fetch current favourited dishes
      const favourites = JSON.parse(localStorage.getItem("favorites") || "[]");
      // Check if new dish is already favorited
      return favourites.find((fav) => fav.id === dish.id);
    },
  },
};
</script>

<style scoped>
.dish-header {
  display: flex;
  justify-content: space-between;
}
</style>
