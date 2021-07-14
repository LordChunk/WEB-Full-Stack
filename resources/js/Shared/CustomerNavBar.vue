<template>
  <div class="wrapper">
    <div class="title">
      <img src="/images/dragon.png" alt="Dragon Logo" class="hidden-mobile" />
      <div>
        <h1>De Gouden Draak</h1>
        <h2>Chineese Indische Specialiteiten</h2>
      </div>
      <img
        src="/images/dragon.png"
        alt="Dragon Logo"
        class="mirror-horizontal hidden-mobile"
      />
    </div>

    <div class="nav-wrapper">
      <!-- Generate navigation from navItems array -->
      <ul>
        <li v-for="navItem in navItems" :key="navItem.id">
          <a :href="navItem.url" :active="navItem.active">
            {{ navItem.name }}
          </a>
        </li>
      </ul>
    </div>
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
.nav-wrapper {
  display: flex;
  justify-content: center;
}

ul {
  list-style: none;
  padding: 0;
  display: flex;
  border: 1px solid white;
  padding: 2px;

  li {
    padding: 2px 1em;
    background: rgb(0, 4, 255);
    background: linear-gradient(
      0deg,
      rgba(0, 4, 255, 1) 0%,
      rgba(0, 251, 255, 1) 100%
    );
    text-align: center;
    font-size: 1.2em;
    margin: 0 1px;

    a {
      text-decoration: none;
      color: white;
    }
  }
}
</style>
