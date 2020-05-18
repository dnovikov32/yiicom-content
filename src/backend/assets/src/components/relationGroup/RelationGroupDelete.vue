<template>

</template>

<script>

    export default {
        // TODO: must be removed
        created () {
            this.$store.dispatch('content-relation-group/delete', this.$route.query.id).then(() => {
                this.$notify({type: 'success', text: 'Группа удалена'});
                this.$store.dispatch('commerce/fetchSettings');
                this.$router.push({ path: '/content/relation-group/index' });
            });
        }
    }

</script>
