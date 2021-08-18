<template>
  <div class="marquee">
    <a href="discount">
      <div>
        <slot></slot>
      </div>
    </a>
</div>

</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
// Marquee styling
.marquee {
  overflow: hidden;
  position: relative;
  width: 100%;
  display: flex;
  align-items: center;

  > * {
    animation: scroll-left 10s linear infinite;
    position: absolute;
    width: max-content;
    margin: 0;
    padding: 0;
  }
}

a {
  color: inherit;
  text-decoration: none;
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
