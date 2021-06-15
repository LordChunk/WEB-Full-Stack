<template>
  <div class="dish-type-wrapper">
    <div v-for="MenuGroup in MenuGroups" :key="MenuGroup.type">
      <h2>{{ MenuGroup.type }}</h2>
      <div
        v-for="Dish in MenuGroup.dishes"
        :key="Dish.menu_indicator + Dish.name"
      >
        <div>
          <h3 v-html="Dish.menu_indicator + ' ' + Dish.name"></h3>
          <p>
            <span v-html=Dish.description></span><br/>
            <span>Prijs: €{{ Dish.price }}</span>
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      MenuGroups: null,
    };
  },
  created() {
    axios
      .get("/api/menu/group-by-type")
      .then((res) => {
        this.MenuGroups = res.data;
      })
      .catch((e) => console.error(e));
  },
};
</script>

<style scoped lang="scss">
.dish-type-wrapper {
  display: flex;
  flex-wrap: wrap;

  > * {
    margin: 1em;
    width: 30%;
    min-width: 250px;
    max-height: 80vh;

    > * {
      display: flex;
      flex-direction: column;
      flex-wrap: wrap;
    }
  }
}
</style>
