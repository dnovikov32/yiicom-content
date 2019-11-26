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
                return this.$store.getters['pages/grid'];
            }
        },

        watch: {
            '$route': function (refreshPage) {
                this.$store.dispatch('pages/all', this.$route.query);
            }
        },

        created () {
            this.$store.dispatch('pages/all');
        }

    }
</script>
