<template>

    <b-card
        v-if="model"
        class="mb-4"
        header="Seo настройки страницы"
        header-class="text-white bg-secondary"
        no-body
    >

        <b-card-body>

            <b-form-group
                label="Адрес страницы"
                label-for="url.alias"
                label-cols-sm="2"
                description="ЧПУ адрес страницы (например: articles/example-article-url-alias)"
            >
                <b-form-input
                    id="url.alias"
                    type="text"
                    v-model="model.alias"
                    trim />
            </b-form-group>

            <b-form-group
                label="Заголовок страницы"
                label-for="url.seoTitle"
                label-cols-sm="2"
                description="SEO заголовок страницы (значение meta title)"
            >
                <b-form-input
                    id="url.seoTitle"
                    type="text"
                    v-model="model.seoTitle"
                    trim />
            </b-form-group>

            <b-form-group
                label="Ключевые слова"
                label-for="url.seoKeywords"
                label-cols-sm="2"
                description="Ключевые слова через ',' (значение meta keywords)"
            >
                <b-form-input
                    id="url.seoKeywords"
                    type="text"
                    v-model="model.seoKeywords"
                    trim />
            </b-form-group>


            <b-form-group
                label="Описание страницы"
                label-for="url.seoDescription"
                label-cols-sm="2"
                description="Описание страницы в результатах поиска (значение meta description)"
            >
                <b-form-textarea
                    id="textarea"
                    v-model="model.seoDescription"
                    placeholder="Введите текст..."
                    rows="3"
                    max-rows="6"
                />
            </b-form-group>

        </b-card-body>

    </b-card>

</template>

<script>
    export default {

        props: [
            'model'
        ]

    }
</script>