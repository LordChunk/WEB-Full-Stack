<template>
  <div class="layout-wrapper">
    <div class="spacer"></div>
    <div class="container">
      <header>
        <div class="top-header">
          <div>
            <!-- Nav logo left -->
            <header-logo />
          </div>
          <!-- Banner moving right to left with ad -->
          <header-marquee>
            <h3>{{ $t("message.advertisement") }}</h3>
          </header-marquee>
          <div>
            <!-- Nav logo right -->
            <header-logo class="hidden-mobile" />
          </div>
        </div>
        <nav>
          <nav-bar></nav-bar>
        </nav>
      </header>
      <main>
        <slot></slot>
      </main>
    </div>
  </div>
</template>

<script>
import HeaderLogo from "@/Shared/HeaderLogo.vue";
import HeaderMarquee from "@/Shared/Marquee.vue";
import NavBar from "@/Shared/CustomerNavBar.vue";

export default {
  components: {
    HeaderLogo,
    HeaderMarquee,
    NavBar,
  },
};
</script>

<style lang="scss" scoped>
.top-header {
  display: flex;
  justify-content: space-between;
}
header {
  color: yellow;
}
nav {
  margin-top: 5em;
}

.layout-wrapper {
  min-height: 100vh;
  background: darkred;
  font-family: "Times New Roman", Times, serif;
}
.spacer {
  height: 1em;
}
.container {
  background: red;
  min-height: calc(100vh - 1em);
}
</style>
