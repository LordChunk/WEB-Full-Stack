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
      <!-- Customer allergy ui -->
      <template v-if="$env.isCustomer()">
        <template v-for="(allergy, $index) in dish.allergies" :key="allergy">
          <!-- Add comma if not first item -->
          <span v-if="$index > 0">, </span>
          {{ allergy }}
        </template>
      </template>
      <!-- Admin allergy ui -->
      <template v-else>
        <!-- Create checkboxes for all allergies -->
        <div v-for="allergy in allAllergies" :key="allergy">
          <input
            type="checkbox"
            :id="dish.id + '-' + allergy.id"
            :value="allergy.name"
            v-model="dish.allergies"
          />
          <label class="p-1" :for="dish.id + '-' + allergy.id">{{
            allergy.name
          }}</label>
        </div>

        <!-- Submit allergy changes -->
        <button @click="updateAllergies()" class="btn btn-outline-secondary">
          Update allergieën
        </button>
      </template>
    </p>

    <p>Pittigheid: {{ dish.spiciness }}</p>

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
import { Inertia } from "@inertiajs/inertia";
export default {
  props: {
    dish: {
      type: Object,
      required: true,
    },
    allAllergies: {
      type: Array,
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
    updateAllergies() {
      Inertia.post(
        route("employee.menu.update.allergies"), {
        dishId: this.dish.id,
        allergies: this.dish.allergies,
      },
      {
        preserveScroll: true, // This prevents a scroll back to the top of the page
      });
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
