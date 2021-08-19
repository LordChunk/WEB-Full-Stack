<template>
  <div class="dish-wrapper">
    <div class="dish-header">
      <h2>{{ dish.menu_indicator }} {{ dish.name }}</h2>
      <i
        v-if="$env.isCustomer()"
        @click="toggleFavorite(dish)"
        :class="{ fas: isFavourite, far: !isFavourite }"
        class="far fa-heart"
      ></i>
    </div>

    <p v-if="dish.description">{{ dish.description }}</p>

    <p class="dish-price">{{ $formatPrice(dish.price) }}</p>

    <p>
      Allergenen:
      <template v-for="(allergy, $index) in dish.allergies" :key="allergy">
        <!-- Add comma if not first item -->
        <span v-if="$index > 0">, </span>
        {{ allergy }}
      </template>
    </p>

    <!-- Add to basket -->
    <p>
      <button
        v-if="$env.isEmployee()"
        @click="$order.add(dish)"
        class="btn btn-outline-info"
      >
        {{ $t("dish.addToCart") }}
      </button>
      <button
        v-if="$env.isCustomer()"
        @click="$order.add(dish)"
        class="btn btn-light right"
      >
        {{ $t("dish.addToCart") }}
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
    };
  },
  created() {
    this.isFavourite = this.isDishFavorited(this.dish);
  },
  methods: {
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
