<template>
  <nav>
    <b-navbar variant="light" type="light">
      <b-navbar-brand href="#">Gekkie Navbar</b-navbar-brand>
      <!-- Generate b-nav-item from navItems array -->
      <b-nav
        v-for="navItem in navItems"
        :key="navItem.id"
      >
        <b-nav-item>
          <!-- <b-icon name="{{navItem.icon}}"></b-icon> -->
          <inertia-link :href="navItem.url">
            {{ navItem.name }}
          </inertia-link>
        </b-nav-item>
      </b-nav>
    </b-navbar>
  </nav>
</template>

<style scoped>
a {
  text-decoration: none;
}
</style>

<script>
export default {
  computed: {
    navItems() {
      return this.$page.props.nav.items;
    },
  },
};
</script>

