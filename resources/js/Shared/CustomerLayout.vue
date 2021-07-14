<template>
  <div class="container">
    <header>
      <div>
        <!-- Nav logo left -->
        <nav-logo />
      </div>
      <div class="marquee">
        <!-- Banner moving right to left with ad -->
        <h3>Zieke ads hier man kopen die handel</h3>
      </div>
      <div>
        <!-- Nav logo right -->
        <nav-logo class="hidden-mobile" />
      </div>
    </header>
  </div>
</template>

<script>
import NavLogo from "@/Shared/NavLogo.vue";
export default {
  components: {
    NavLogo,
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
}

.hidden-mobile {
    @media (max-width: 767px) {
        display: none !important;
    }
}

// Marquee styling
.marquee {
  overflow: hidden;
  position: relative;
  width: 100%;

  > * {
    animation: scroll-left 10s linear infinite;
    position: absolute;
    width: max-content;
  }
}
@keyframes scroll-left {
  0% {
    transform: translateX(100%);
  }
  100% {
    transform: translateX(-100%);
  }
}
</style>
