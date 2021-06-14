<template>
<div>
    <div v-for="dish in MenuItems" :key="dish.id">
        Nummer: {{dish.menunummer}} <br>
        Naam: {{dish.naam}}
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            MenuItems: null
        }
    },
    created() {
        axios.get('/api/menu')
            .then((res) => {
                this.MenuItems = res.data;
            })
            .catch((e) => console.error(e));
    }
}
</script>

<style>

</style>
