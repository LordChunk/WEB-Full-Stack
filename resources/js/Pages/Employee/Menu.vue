<template>
  <div>
    <div>
      <div class="menu-header">
        <h2>Menukaart</h2>
        <button class="btn btn-outline-danger" @click="emptyCart">
          Winkelmand legen
        </button>
      </div>
      <dish-type
        v-for="dishType in dishTypes"
        :key="dishType.name"
        :dishType="dishType"
      >
      </dish-type>
    </div>
    <div class="basket">
      <div class="basket-header">
        <h2>Winkelmand</h2>
      </div>
      <div>
        <div v-for="dish in $store.state.cart" :key="dish.id">
          <p>
            {{dish.name}}
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Layout from "@/Shared/BootstrapLayout.vue";
import DishType from "@/Components/DishCategory.vue";
export default {
  layout: Layout,
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
  components: {
    DishType,
  },
  beforeCreate() {
    if(this.$store.cart === undefined) {
      this.$store.cart = [];
    }
  },
  methods: {
    emptyCart() {
      this.$store.clear("cart");
    },
  },
};
</script>

<style scoped lang="scss">
.menu-header {
  display: flex;
  justify-content: space-between;
}

// .basket {
//   display: absolute;
// }
// Style all dish elements according to employee layout
::v-deep .dish-wrapper {
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
