<template>
  <nav>
    <b-navbar variant="light" type="light" toggleable="lg">
      <b-navbar-brand href="#">
        <inertia-link :href="route('employee.dashboard')">
        Kassa
        <img
          src="/images/portal.gif"
          alt="portal"
          v-b-tooltip.hover
          title="Portaal"
        />
        </inertia-link>
      </b-navbar-brand>
      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
      <!-- Generate b-nav-item from navItems array -->
      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
          <b-nav-item v-for="navItem in navItems" :key="navItem.id">
            <inertia-link :href="navItem.url">
              {{ navItem.name }}
            </inertia-link>
          </b-nav-item>
        </b-navbar-nav>

        <!-- Right aligned nav items -->
        <b-navbar-nav class="ml-auto" v-if="user !== null">
          <b-nav-item-dropdown :text="user.email">
            <b-dropdown-item>
              <inertia-link href="#">Profiel</inertia-link>
            </b-dropdown-item>
            <b-dropdown-item>
              <inertia-link :href="route('logout')" method="post" as="button">Uitloggen</inertia-link>
            </b-dropdown-item>
          </b-nav-item-dropdown>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </nav>
</template>

<script>
export default {
  computed: {
    navItems() {
      return this.$page.props.nav.items;
    },
    user() {
      return this.$page.props.auth.user;
    },
  },
};
</script>

<style scoped>
a {
  text-decoration: none;
  color: inherit;
}
button {
  background: none;
  border: none;
  padding: 0;
  margin: 0;
}
.navbar {
  padding-left: 1em;
  padding-right: 1em;
}
.navbar-brand img {
  height: 2rem;
}
</style>
