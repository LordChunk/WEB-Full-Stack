<template>
  <div class="content">
    <h3>
      {{$t("message.news")}}
    </h3>
  </div>
</template>

<script>
import Layout from '@/Shared/CustomerLayout.vue'

export default {
  layout: Layout,
}
</script>

<style scoped>
.content {
  background-color: floralwhite;
  border: 1px solid black;
  display: flex;
  align-items: center;
  padding: 1vh 2vw;
  margin: 3vh 5vw;
}
</style>
