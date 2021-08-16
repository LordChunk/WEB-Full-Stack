<template>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Uw bestelling is geplaatst #{{ orderId }}</h3>
          </div>
          <div class="panel-body">
            <p>Bedankt voor uw bestelling.</p>
            <inertia-link :href="route('employee.menu')">Ga terug naar het menu</inertia-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import layout from '@/Shared/BootstrapLayout.vue';

export default {
  layout,
  props: {
    orderId: {
      type: Number,
      required: true
    }
  }
}
</script>

<style>

</style>
