<template>
  <div class="wrapper">
    <div class="menu-wrapper">
      <div class="menu-header">
        <h2>Menukaart</h2>
      </div>
      <div class="mt-4 mb-4">
        <label for="menu-search-bar" class="form-label">
          Zoek naar gerechten
        </label>
        <div class="input-group">
          <input id="menu-search-bar" type="text" v-model="searchTerm" />
        </div>

        <p>
          U kunt zoeken op naam, categorie, beschrijving of menunummer.
        </p>
      </div>
      <dish-type
        v-for="dishType in dishTypes"
        :key="dishType.name"
        :dishType="dishType"
        :searchTerm="searchTerm"
      >
      </dish-type>
    </div>
    <cart />
  </div>
</template>

<style scoped lang="scss">
// Desktop only styling
@media (min-width: 768px) {
  .wrapper {
    display: flex;
  }
  .menu-wrapper {
    max-width: 50vw;
  }
}

// Style all dish elements according to employee layout
:deep(.dish-wrapper) {
  padding: 1.5em 0;

  .dish-price {
    font-size: 1.2em;
    font-weight: bold;
  }

  // Remove margin from last p tag
  p:last-child {
    margin: 0;
  }
}
</style>

<script>
import Layout from "@/Shared/BootstrapLayout.vue";
import DishType from "@/Components/DishCategory.vue";
import Cart from "@/Components/Cart.vue";
export default {
  layout: Layout,
  components: {
    DishType,
    Cart,
  },
  props: {
    dishTypes: {
      type: Array[
        {
          type: {
            id: Number,
            menu_indicator: String,
            name: String,
            price: Number,
            description: String,
            dish_type: String,
          },
        }
      ],
      required: true,
    },
  },
  data() {
    return {
      searchTerm: "",
    };
  },
};
</script>
