<template>
  <div>
    <img src="/images/dragon.png" alt="Dragon Logo" />
    <span> De Gouden Draak </span>
    <img src="/images/dragon.png" class="mirror-horizontal" alt="Dragon Logo" />
  </div>
</template>

<script>
export default {};
</script>

<style scoped lang="scss">
div {
  font-family: "gouden_draak_header";
  display: flex;
  flex-wrap: nowrap;
  align-items: center;
  width: 15em;
}
img {
  width: 50px;
  height: 50px;
}
.mirror-horizontal {
  transform: scaleX(-1);
}
</style>
