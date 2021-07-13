<template>
    <div>
        <nav-bar></nav-bar>

        <slot></slot>
    </div>
</template>

<script>
import NavBar from '@/Shared/NavBar';

export default {
    components: {
        NavBar,
    }
}
</script>

<style>

</style>
