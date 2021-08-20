<template>
  <div class="content-background">
    <h3>
      Nummer {{ discount.dish.menu_indicator }} {{ discount.dish.name }}, Nu in de aanbieding!
      Van: {{ $formatPrice(discount.dish.price) }}        Naar: {{ $formatPrice(calculatePriceWithDiscount(discount.discountPercentage,discount.dish.price)) }}
    </h3>
  </div>
</template>

<script>
export default {
  props: {
    discount: Object,
  },
  methods:{
    calculatePriceWithDiscount(discount, price){
      discount = discount - 0;
      price = price - 0;
      return price * (1-discount/100);
    }
  }
}
</script>
