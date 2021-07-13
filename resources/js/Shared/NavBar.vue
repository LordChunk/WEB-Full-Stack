<template>
  <div>
    <b-navbar variant="light" type="light">
      <b-navbar-brand href="#">Gekkie Navbar</b-navbar-brand>
      <!-- Generate b-nav-item from navItems array -->
      <b-nav
        v-for="navItem in navItems"
        :key="navItem.id"
        :active="navItem.active"
      >
        <b-nav-item :href="navItem.url" :active="navItem.active">
          <!-- <b-icon name="{{navItem.icon}}"></b-icon> -->
          {{ navItem.name }}
        </b-nav-item>
      </b-nav>
    </b-navbar>
  </div>
</template>


<script>
export default {
  computed: {
    navItems() {
      return this.$page.props.nav.items;
    },
  },
};
</script>

<style>
</style>
