<template>

    <div>

        <b-form v-if="model" @submit="save">

            <yc-admin-buttons :model="model" @save="save" @destroy="destroy"></yc-admin-buttons>

            <b-card
                class="mb-4"
                header="Общая информация"
                header-class="text-white bg-secondary"
                no-body
            >

                <b-card-body>

                    <b-form-group
                        label="Название"
                        label-for="title"
                        label-cols-sm="2"
                    >
                        <b-form-input
                            id="title"
                            type="text"
                            v-model="model.title"
                            required
                            trim />
                    </b-form-group>

                    <b-form-group
                        label="Родительская категория"
                        label-for="parentId"
                        label-cols-sm="2"
                    >
                        <b-form-select
                            id="parentId"
                            class="col-3"
                            v-model="model.parentId"
                            :options="categories"
                        >
                            <option :value="null">Нет</option>
                        </b-form-select>
                    </b-form-group>

                    <b-form-group
                        label="Статус"
                        label-for="status"
                        label-cols-sm="2"
                    >
                        <b-form-select
                            id="status"
                            class="col-3"
                            v-model="model.status"
                            :options="statuses">
                        </b-form-select>
                    </b-form-group>

                </b-card-body>

            </b-card>

            <b-button type="submit" variant="primary" :disabled="isLoading">Сохранить</b-button>

            <pre v-if="isDev">model: {{  model }}</pre>

        </b-form>

    </div>

</template>

<script>

    export default {

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
                return this.$store.getters['content-categories/model'];
            },
            settings: function () {
                return this.$store.getters['commerce/settings'];
            },
            statuses: function () {
                return _.isEmpty(this.settings) ? [] : this.settings.statusesList;
            },
            categories: function () {
                return _.isEmpty(this.settings) ? [] : this.settings.content.categories;
            }
        },

        created () {
            this.$store.dispatch('content-categories/find', this.$route.query.id);
        },

        watch: {
            '$route': function () {
                this.$store.dispatch('content-categories/find', this.$route.query.id);
            }
        },

        methods: {
            save (event) {
                event.preventDefault();

                let isNewRecord = (this.model.id === null);

                this.$store.dispatch('content-categories/save', this.model).then(() => {
                    if (this.hasError) {
                        return false;
                    }

                    this.$notify({type: 'success', text: 'Категория сохранена'});

                    this.$store.dispatch('commerce/fetchSettings');

                    if (isNewRecord) {
                        this.$router.push({ path: `/content/category/update?id=${this.model.id}` });
                    }
                });

            },

            destroy () {
                this.$store.dispatch('content-categories/delete', this.model.id).then(() => {
                    this.$notify({type: 'success', text: 'Категория удалена'});
                    this.$store.dispatch('commerce/fetchSettings');
                    this.$router.push({ path: '/content/category/index' });
                });
            }
        }

    }
</script>