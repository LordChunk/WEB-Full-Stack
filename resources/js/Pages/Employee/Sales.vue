<template>
  <div class="sales-header">
    <div>Omzet: {{ $formatPrice(totalPriceIncBtw()) }}</div>
    <div>BTW: {{ $formatPrice(totalPriceIncBtw() - totalPriceExcBtw()) }}</div>
    <div>Excl. BTW: {{ $formatPrice(totalPriceExcBtw()) }}</div>
  </div>
  <form class="date-pickers">
    <div>
      <span> Begindatum: </span>
      <input type="date" name="beginDate" v-model="serverBeginDate" />
    </div>
    <div>
      <span> Einddatum: </span>
      <input type="date" name="endDate" v-model="serverEndDate" />
    </div>

    <!-- Submit button -->
    <button type="submit" class="btn btn-primary">
      <i class="fa fa-search"></i>
      <span> Zoek</span>
    </button>
  </form>
  <div class="sales-wrapper">
    <!-- Column headers -->
    <strong>Naam</strong>
    <strong>Verkoopprijs</strong>
    <strong>Aantal verkocht</strong>
    <strong>Totaalprijs</strong>
    <!-- Table -->
    <template v-for="dish in sales" :key="dish.id + dish.price">
      <strong> {{ dish.name }} </strong>
      <span>{{ $formatPrice(dish.price) }}</span>
      <span>{{ dish.total_quantity }}</span>
      <span>{{ $formatPrice(dish.total_quantity * dish.price) }}</span>
    </template>
  </div>
</template>

<script>
import layout from "@/Shared/BootstrapLayout.vue";

export default {
  layout,
  props: {
    sales: Array[
      Object,
      {
        id: Number,
        name: String,
        price: Number,
        total_quantity: Number
      }
    ],
    serverBeginDate: String,
    serverEndDate: String,
  },
  data() {
    return {
      beginDate: "",
      endDate: "",
    };
  },
  created() {
    this.beginDate = this.serverBeginDate || "01/01/2018";
    this.endDate = this.serverEndDate || new Date().toISOString().split("T")[0];

    console.log(this.beginDate, this.endDate);
  },
  methods: {
    totalPriceIncBtw() {
      return this.sales.reduce(
        (total, item) => total + item.total_quantity * item.price,
        0
      );
    },
    totalPriceExcBtw() {
      return (
        (this.sales.reduce(
          (total, item) => total + item.total_quantity * item.price,
          0
        ) /
          109) *
        100
      );
    },
  },
};
</script>

<style scoped lang="scss">
.date-pickers {
  display: flex;
  align-items: center;
  margin-bottom: 2em;
  > * {
    margin-right: 2em;
  }
}
.sales-header {
  display: flex;
  justify-content: space-around;
  font-weight: bold;
  font-size: large;
  margin-bottom: 2em;
}
.sales-wrapper {
  margin-top: 10px;
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr;
  gap: 1em 1em;
  @media (max-width: 767px) {
    overflow-x: scroll;
  }
}
</style>
