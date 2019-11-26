<template>

</template>

<script>

    export default {
        // TODO: must be removed
        created () {
            this.$store.dispatch('pages-categories/delete', this.$route.query.id).then(() => {
                this.$notify({type: 'success', text: 'Категория удалена'});
                this.$store.dispatch('settings');
                this.$router.push({ path: '/pages/category/index' });
            });
        }
    }

</script>
