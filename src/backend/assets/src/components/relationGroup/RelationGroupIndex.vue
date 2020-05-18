<template>

    <div>

        <yc-admin-buttons></yc-admin-buttons>

        <div v-html="grid"></div>

    </div>

</template>

<script>
    export default {

        computed: {
            grid () {
                return this.$store.getters['content-relation-group/grid'];
            }
        },

        watch: {
            '$route': function () {
                this.$store.dispatch('content-relation-group/all', this.$route.query);
            }
        },

        created () {
            this.$store.dispatch('content-relation-group/all');
        }

    }
</script>
