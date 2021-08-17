<template>
  <news-item />
</template>

<script>
import Layout from '@/Shared/CustomerLayout.vue'
import NewsItem from '@/Components/NewsItem'

export default {
  components: {NewsItem},
  layout: Layout,
  NewsItem: NewsItem,
}
</script>

<style scoped>

</style>
