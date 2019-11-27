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
                return this.$store.getters['content-pages/grid'];
            }
        },

        watch: {
            '$route': function (refreshPage) {
                this.$store.dispatch('content-pages/all', this.$route.query);
            }
        },

        created () {
            this.$store.dispatch('content-pages/all');
        }

    }
</script>
