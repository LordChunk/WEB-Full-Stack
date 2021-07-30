<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <inertia-link class="navbar-brand" :href="route('employee.dashboard')">
        Kassa
        <img src="/images/portal.gif" alt="portal" />
      </inertia-link>
      <div class="collapse navbar-collapse" id="nav-bar-collapse">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item" v-for="navItem in navItems" :key="navItem.id">
            <inertia-link class="nav-link" :href="navItem.url">
              {{ navItem.name }}
            </inertia-link>
          </li>
        </ul>
      </div>
      <!-- Right aligned nav items -->
      <div class="nav-item dropdown ml-auto" v-if="user !== null">
        <a
          class="nav-link dropdown-toggle"
          data-bs-toggle="dropdown"
          href="#"
          role="button"
        >
          {{ user.email }}
        </a>
        <ul class="dropdown-menu">
          <li class="dropdown-item">
            <inertia-link href="#">Profiel</inertia-link>
          </li>
          <li class="dropdown-item">
            <inertia-link :href="route('logout')" method="post" as="button">
              Uitloggen
            </inertia-link>
          </li>
        </ul>
      </div>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#nav-bar-collapse"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div>
        <SwitchLanguage />
      </div>
    </div>
  </nav>
</template>

<script>
import SwitchLanguage from '@/components/SwitchLanguage.vue'

export default {
  computed: {
    navItems() {
      return this.$page.props.nav.items;
    },
    user() {
      return this.$page.props.auth.user;
    },
  },
  components: {
    SwitchLanguage,
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
img {
  height: 2rem;
}
</style>
