<template>
  <div>
    <!-- Generate div for each dishType -->
    <div v-for="dishType in dishTypes" :key="dishType.name" class="dishType">
      <h2>{{ dishType.name }}</h2>
      <!-- Generate div for each dish -->
      <div v-for="dish in dishType.dishes" :key="dish.id" class="dish">
        <h2>{{dish.menu_indicator}} {{dish.name}}</h2>
        <p>{{dish.description}}</p>
        <p>Price: €{{dish.price}}</p>
        <!-- <p>
          <button @click="addToCart(dishType, dish)">Add to cart</button>
        </p> -->
      </div>
    </div>
  </div>
</template>

<script>
import Layout from "@/Shared/CustomerLayout.vue";
export default {
    layout: Layout,
    props: {
        dishTypes: {
            type: Array[{
                type: {
                    id: Number,
                    menu_indicator: String,
                    name: String,
                    price: Number,
                    description: String,
                    dish_type: String,
                }
            }],
            required: true
        }
    }
}
</script>

<style scoped lang="scss">
* {
  color: white;
}
</style>
