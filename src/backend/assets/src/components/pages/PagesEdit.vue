<template>

    <div>

        <b-form v-if="model" @submit="save">

            <yc-admin-buttons :model="model" @save="save" @destroy="destroy"></yc-admin-buttons>

            <page-form :model="model"></page-form>

            <url-form :model="model.url"></url-form>

            <files-form
                :models.sync="model.files"
                title="Изображение превью"
                :multiple="false"
            />

            <b-button type="submit" variant="primary" :disabled="isLoading">Сохранить</b-button>

            <pre v-if="isDev">model: {{  model }}</pre>

        </b-form>

    </div>

</template>

<script>
    import PageForm from "./../PageForm.vue";
    import UrlForm from "./../UrlForm.vue";
    // TODO: do something with import component from another module
    import FilesForm from "./../../../../../../../yiicom-files/src/backend/assets/src/components/FilesForm.vue"


    export default {

        components: {
            PageForm,
            UrlForm,
            FilesForm
        },

        computed: {
            isDev: function () {
                return this.$store.getters['commerce/isDev'];
            },
            isLoading: function () {
                return this.$store.getters['commerce/isLoading'];
            },
            hasError: function () {
                return this.$store.getters['commerce/hasError'];
            },
            model: function () {
                return this.$store.getters['content-pages/model'];
            }
        },

        created () {
            this.$store.dispatch('content-pages/find', this.$route.query.id);
        },

        watch: {
            '$route': function () {
                this.$store.dispatch('content-pages/find', this.$route.query.id);
            }
        },

        methods: {
            save (event) {
                event.preventDefault();

                let isNewRecord = (this.model.id === null);

                this.$store.dispatch('content-pages/save', this.model).then(() => {
                    if (this.hasError) {
                        return false;
                    }

                    this.$notify({type: 'success', text: 'Материал сохранен'});

                    if (isNewRecord) {
                        this.$router.push({ path: `/content/page/update?id=${this.model.id}` });
                    }
                });

            },

            destroy () {
                this.$store.dispatch('content-pages/delete', this.model.id).then(() => {
                    this.$notify({type: 'success', text: 'Материал удален'});
                    this.$router.push({ path: '/content/page/index' });
                });
            }
        }

    }
</script>
