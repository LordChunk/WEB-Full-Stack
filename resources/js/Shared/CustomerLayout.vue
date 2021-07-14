<template>
  <div class="container">
    <header>
      <div>
        <!-- Nav logo left -->
        <nav-logo />
      </div>
      <div>
        <!-- Banner moving right to left with ad -->
        <h3>Zieke ads hier man kopen die handel</h3>
      </div>
      <div>
        <!-- Nav logo right -->
        <nav-logo />
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

<style>
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
</style>
