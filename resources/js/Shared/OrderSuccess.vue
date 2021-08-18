<template>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">{{$t("shared.orderSuccess.title")}} #{{ orderId }}</h3>
            <p v-if="tableNumber !== undefined">{{$t('shared.orderSuccess.tableNumber')}}: {{tableNumber}}</p>
          </div>
          <div class="panel-body">
            <p>{{$t('shared.orderSuccess.thankYou')}}.</p>
            <inertia-link :href="route('employee.menu')">{{$t('shared.orderSuccess.returnToMenu')}}</inertia-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  props: {
    orderId: {
      type: Number,
      required: true
    },
    tableNumber: {
      type: Number,
      required: false
    }
  }
}
</script>

<style>
</style>
