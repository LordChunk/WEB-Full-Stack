<template>
  <nav>
    <v-list dense nav>
        <div v-for="navItem in navItems" :key="navItem.id">
            <v-list-item link :href="navItem.url">
                {{ navItem.name }}
            </v-list-item>
        </div>
    </v-list>
  </nav>
</template>

<script>
export default {
  name: "navigation",
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
