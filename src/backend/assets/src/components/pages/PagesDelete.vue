<template>

</template>

<script>

    export default {
        // TODO: must be removed
        created () {
            this.$store.dispatch('pages/delete', this.$route.query.id).then(() => {
                this.$notify({type: 'success', text: 'Материал удален'});
                this.$router.push({ path: '/pages/page/index' });
            });
        }
    }

</script>
