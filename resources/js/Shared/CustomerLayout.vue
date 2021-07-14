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
            <h3>Zieke ads hier man kopen die handel</h3>
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
  width: 100vw;
  height: 100vh;
  background: darkred;
  font-family: "Times New Roman", Times, serif;
}
.spacer {
  height: 1em;
}
.container {
  background: red;
}

.mirror-horizontal {
  transform: scaleX(-1);
}

.hidden-mobile {
  @media (max-width: 767px) {
    display: none !important;
  }
}
</style>
