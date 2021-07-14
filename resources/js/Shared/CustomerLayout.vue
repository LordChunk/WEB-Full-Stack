<template>
  <div class="container">
    <header>
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
    </header>
  </div>
</template>

<script>
import HeaderLogo from "@/Shared/HeaderLogo.vue";
import HeaderMarquee from "@/Shared/Marquee.vue";
export default {
  components: {
    HeaderLogo,
    HeaderMarquee,
  },
};
</script>

<style lang="scss">
body {
  background: darkred;
}
.container {
  background: red;
}

header {
  display: flex;
  justify-content: space-between;
  margin-top: 1em;
  color: yellow;
}

.hidden-mobile {
  @media (max-width: 767px) {
    display: none !important;
  }
}
</style>
