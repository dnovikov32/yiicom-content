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
                        label="Заголовок"
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
                        label="Системное название"
                        label-for="name"
                        label-cols-sm="2"
                    >
                        <b-form-input
                            id="name"
                            type="text"
                            v-model="model.name"
                            required
                            trim />
                    </b-form-group>

                    <b-form-group
                        label="Для типа материалов"
                        label-for="modelClass"
                        label-cols-sm="2"
                        description="Для каких типов материалов отображать данную группу"
                    >
                        <b-form-select
                            id="parentId"
                            class="col-3"
                            v-model="model.modelClass"
                            :options="relationModels"
                        >
                        </b-form-select>
                    </b-form-group>

                    <b-form-group
                            label="Тип материалов для выбора"
                            label-for="relationClass"
                            label-cols-sm="2"
                            description="Какие типы материалов участвуют в выборе"
                    >
                        <b-form-select
                                id="parentId"
                                class="col-3"
                                v-model="model.relationClass"
                                :options="relationModels"
                        >
                        </b-form-select>
                    </b-form-group>

                </b-card-body>

            </b-card>

            <b-button type="submit" variant="primary" :disabled="isLoading">Сохранить</b-button>

            <yc-debug :model="model"></yc-debug>

        </b-form>

    </div>

</template>

<script>

    export default {

        computed: {
            isLoading: function () {
                return this.$store.getters['commerce/isLoading'];
            },
            hasError: function () {
                return this.$store.getters['commerce/hasError'];
            },
            model: function () {
                return this.$store.getters['content-relation-group/model'];
            },
            settings: function () {
                return this.$store.getters['commerce/settings'];
            },
            // statuses: function () {
            //     return _.isEmpty(this.settings) ? [] : this.settings.statusesList;
            // },
            relationModels: function () {
                return _.isEmpty(this.settings) ? [] : this.settings.content.relation.models;
            }
        },

        created () {
            this.$store.dispatch('content-relation-group/find', this.$route.query.id);
        },

        watch: {
            '$route': function () {
                this.$store.dispatch('content-relation-group/find', this.$route.query.id);
            }
        },

        methods: {
            save (event) {
                event.preventDefault();

                let isNewRecord = (this.model.id === null);

                this.$store.dispatch('content-relation-group/save', this.model).then(() => {
                    if (this.hasError) {
                        return false;
                    }

                    this.$notify({type: 'success', text: 'Группа сохранена'});

                    this.$store.dispatch('commerce/fetchSettings');

                    if (isNewRecord) {
                        this.$router.push({ path: `/content/relation-group/update?id=${this.model.id}` });
                    }
                });

            },

            destroy () {
                this.$store.dispatch('content-relation-group/delete', this.model.id).then(() => {
                    this.$notify({type: 'success', text: 'Группа удалена'});
                    this.$store.dispatch('commerce/fetchSettings');
                    this.$router.push({ path: '/content/relation-group/index' });
                });
            }
        }

    }
</script>