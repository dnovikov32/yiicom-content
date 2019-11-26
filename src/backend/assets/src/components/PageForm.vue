<template>

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
                label="Категория"
                label-for="categoryId"
                label-cols-sm="2"
            >
                <b-form-select
                    id="categoryId"
                    class="col-3"
                    v-model="model.categoryId"
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

            <b-form-group
                label="Шаблон"
                label-for="template"
                label-cols-sm="2"
                description="Укажите имя файла шаблона, если требуется переопределить стандартный"
            >
                <b-form-input
                    id="template"
                    class="col-3"
                    type="text"
                    v-model="model.template"
                    placeholder="Имя файла"
                    trim />
            </b-form-group>

            <b-form-group
                label="Короткое содержимое"
                label-for="teaser"
            >
                <vue-ckeditor v-model="model.teaser" :config="{height: 150}" />
            </b-form-group>

            <b-form-group
                label="Полное содержимое"
                label-for="body"
            >
                <vue-ckeditor v-model="model.body" />
            </b-form-group>

        </b-card-body>

    </b-card>

</template>

<script>

    export default {

        props: [
            'model'
        ],

        computed: {
            settings: function () {
                return this.$store.getters['settings'];
            },
            statuses: function () {
                return _.isEmpty(this.settings) ? [] : this.settings.statusesList;
            },
            categories: function () {
                return _.isEmpty(this.settings) ? [] : this.settings.pages.categories;
            }
        }

    }
</script>
