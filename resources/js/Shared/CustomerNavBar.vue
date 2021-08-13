<template>
  <div class="wrapper">
    <div class="title">
      <img src="/images/dragon.png" alt="Dragon Logo" class="hidden-mobile" />
      <div>
        <h1>{{ $t("message.restaurantName") }}</h1>
        <h2>{{ $t("message.specialties") }}</h2>
      </div>
      <img
        src="/images/dragon.png"
        alt="Dragon Logo"
        class="mirror-horizontal hidden-mobile"
      />
    </div>

    <div class="nav-wrapper">
      <!-- Generate navigation from navItems array -->
      <inertia-link
        v-for="navItem in navItems"
        :key="navItem.id"
        :href="navItem.url"
        :active="navItem.active"
      >
        {{ navItem.name }}
      </inertia-link>
    </div>
    <switch-language/>
  </div>
</template>

<script>
import SwitchLanguage from '@/components/SwitchLanguage.vue'

export default {
  computed: {
    navItems() {
      return this.$page.props.nav.items;
    },
  },

  components:{
    SwitchLanguage,
  }
};
</script>

<style lang="scss" scoped>
img {
  width: 200px;
  height: 200px;
}
.title {
  text-align: center;
  margin-bottom: 50px;
  display: flex;
  justify-content: center;
}
.wrapper {
  // Center both header and navigation content horizontally
  display: flex;
  flex-direction: column;
  align-items: center;

  // Add space between navigation and main content
  margin-bottom: 2em;
}
.nav-wrapper {
  display: flex;
  width: fit-content;
  padding: 2px;
  border: 1px solid white;

  a {
    // Vertically center text for multiline text
    display: flex;
    align-items: center;

    // Style text
    color: white;
    text-align: center;
    font-size: 1.2em;
    text-decoration: none;

    // spacing between links
    margin: 0 1px;
    padding: 0 1em;

    // Add background gradient
    background: rgb(0, 4, 255);
    background: linear-gradient(
      0deg,
      rgba(0, 4, 255, 1) 0%,
      rgba(0, 251, 255, 1) 100%
    );
  }
}
</style>
