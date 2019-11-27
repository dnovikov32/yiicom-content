<template>

</template>

<script>

    export default {
        // TODO: must be removed
        created () {
            this.$store.dispatch('content-pages/delete', this.$route.query.id).then(() => {
                this.$notify({type: 'success', text: 'Материал удален'});
                this.$router.push({ path: '/content/page/index' });
            });
        }
    }

</script>
