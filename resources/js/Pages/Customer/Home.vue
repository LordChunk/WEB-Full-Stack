<template>
  <div class="content-background">
    <h1>{{ $t("message.WelcomeMessage") }}</h1>
    <p>
      Al jaren is De Gouden Draak een begrip als het gaat om de beste afhaalgerechten in 's-Hertogenbosch.
      Graag trakteren we u op authentieke gerechten uit de Cantonese keuken.
    </p>
    <a href="studentdiscount">
      Bekijk hier de Speciale Studentenaanbiedingen!
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
