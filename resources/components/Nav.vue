<template>
    <nav>
        <div v-for="navItem in navItems" :key="navItem.key">
            <h2>Item: {{navItem}}</h2>
        </div>
    </nav>
</template>

<script>
export default {
    name: 'navigation',
    props: {
        navItems: {
            type: Array,
            required: true,
        }
    }
}
</script>

<style lang="scss" scoped>
    * {
        color: red;
    }
</style>
