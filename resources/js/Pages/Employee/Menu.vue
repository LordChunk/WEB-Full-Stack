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
    <div
      class="cart container px-4"
      v-bind:class="{ 'open-cart': isCartOpen, 'hide-cart': $store.state.cart.length === 0 }"
    >
      <div class="draggable" @click="clickCart">
        <img src="/images/drag_handle_black_24dp.svg" />
      </div>
      <div class="cart-header">
        <h2>Winkelmand</h2>
      </div>
      <div>
        <div v-for="dish in $store.state.cart" :key="dish.id">
          <p>
            {{ dish.name }}
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped lang="scss">
.menu-header {
  display: flex;
  justify-content: space-between;
}

.cart {
  position: fixed;
  left: 0;
  bottom: 0;
  right: 0;
  border-radius: 1rem 1rem 0 0;
  background: #bdf4ff;
  box-shadow: 0px 9px 15px 15px rgb(0 0 0 / 17%);

  // Creates proper CSS height animation
  // https://stackoverflow.com/questions/3508605/how-can-i-transition-height-0-to-height-auto-using-css
  height: 100vh;
  max-height: 2em;

  .draggable {
    cursor: pointer;
    display: flex;
    justify-content: center;
    img {
      width: 2em;
    }
  }
  transition: max-height 300ms;
}
.open-cart {
  max-height: 100vh;
}
.hide-cart {
  max-height: 0;
}
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

<script>
import Layout from "@/Shared/BootstrapLayout.vue";
import DishType from "@/Components/DishCategory.vue";
export default {
  layout: Layout,
  components: {
    DishType,
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
      isCartOpen: false,
    };
  },
  beforeCreate() {
    if (this.$store.state.cart === undefined) {
      this.$store.state.cart = [];
    }
  },
  methods: {
    emptyCart() {
      this.$store.state.cart = [];
    },
    clickCart() {
      this.isCartOpen = !this.isCartOpen;
    },
  },
};
</script>
