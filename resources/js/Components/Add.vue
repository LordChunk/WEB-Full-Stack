<template>
  <div class="content-background">
    <h3>
      Nummer {{ discount.dish.menu_indicator }} {{ discount.dish.name }}, Nu in de aanbieding!
      Van: €{{ discount.dish.price }}        Naar: €{{ discount.dish.price * (1 - discount.discount/100) }}
    </h3>
  </div>
</template>

<script>
export default {
  props: {
    discount: Object,
  },
}
</script>
