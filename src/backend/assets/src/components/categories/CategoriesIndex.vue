<template>

    <div>

        <yc-admin-buttons :model="model"></yc-admin-buttons>

        <div v-html="grid"></div>

    </div>

</template>

<script>
    export default {

        computed: {
            grid () {
                return this.$store.getters['pages-categories/grid'];
            }
        },

        watch: {
            '$route': function () {
                this.$store.dispatch('pages-categories/all', this.$route.query);
            }
        },

        created () {
            this.$store.dispatch('pages-categories/all');
        }

    }
</script>
