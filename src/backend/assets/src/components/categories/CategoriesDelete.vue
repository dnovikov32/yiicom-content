<template>

</template>

<script>

    export default {
        // TODO: must be removed
        created () {
            this.$store.dispatch('content-categories/delete', this.$route.query.id).then(() => {
                this.$notify({type: 'success', text: 'Категория удалена'});
                this.$store.dispatch('commerce/fetchSettings');
                this.$router.push({ path: '/content/category/index' });
            });
        }
    }

</script>
