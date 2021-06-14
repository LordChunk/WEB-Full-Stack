<template>

</template>

<script>
export default {
    beforeCreate() {
        axios.get('/api/menu')
            .then((res) => {
                console.log(res);
            })
            .catch((e) => console.error(e));
    }
}
</script>

<style>

</style>
