<template>
  <nav>
    <v-list nav>
        <div v-for="navItem in navItems" :key="navItem.id">
            <v-list-item router-link :to="navItem.url">
                {{ navItem.name }}
            </v-list-item>
        </div>
    </v-list>
  </nav>
</template>

<script>
export default {
  props: {
    navItems: {
      type: Array,
      required: true,
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
