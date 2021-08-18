<template>
  <div class="content-background">
    <h1>{{ $t("message.WelcomeMessage") }}</h1>
    <p>
      {{ $t("home.paragraph1") }}
    </p>
    <a href="/studentdiscount">
      {{ $t("home.studentDiscount") }}
    </a>
  </div>
</template>

<script>
import Layout from "@/Shared/CustomerLayout.vue";

export default {
  layout: Layout,
}
</script>

<style>
a {
  color: inherit;
  text-decoration: underline;
}
a:hover {
  color: inherit;
}
</style>
