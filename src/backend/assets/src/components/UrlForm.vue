<template>

    <b-card
        v-if="model.url"
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
                    v-model="model.url.alias"
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
                    v-model="model.url.seoTitle"
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
                    v-model="model.url.seoKeywords"
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
                    v-model="model.url.seoDescription"
                    placeholder="Введите текст..."
                    rows="3"
                    max-rows="6"
                />
            </b-form-group>

            <a class="offset-sm-2" data-toggle="collapse" href="#collapse-url-params">Дополнительные параметры</a>

            <div class="collapse mt-2" id="collapse-url-params">

                <b-form-group
                    label="Путь в системе"
                    label-for="url.route"
                    label-cols-sm="2"
                    description="Путь к экшену вида module/controller/action для обработки данного адреса (пример: content/page/view)"
                >
                    <b-form-input
                        id="url.route"
                        type="text"
                        v-model="model.url.route"
                        trim />
                </b-form-group>

                <b-form-group
                    label="Параметры"
                    label-for="url.params"
                    label-cols-sm="2"
                    description="Параметры запроса в json"
                >
                    <b-form-input
                        id="url.params"
                        type="text"
                        v-model="model.url.params"
                        trim />
                </b-form-group>

            </div>


        </b-card-body>

    </b-card>

</template>

<script>
    export default {

        props: {
            model: {
                type: Object,
                default: function () {
                    return {};
                }
            }
        },

        created: function () {
            this.initEvent(true);
        },

        watch: {
            'model.id' () {
                this.initEvent(false);
            }
        },

        methods: {
            initEvent (isComponentCreation) {
                let self = this;

                // TODO: try to remake to Vue, repeats TitleField component code
                $(function (isComponentCreation) {
                    if (self.model.id || (self.model.url && self.model.url.alias)) {
                        return false;
                    }

                    let $name = $('input[id="name"]');

                    $name.on('keyup.urlForm', function() {
                        self.model.url.alias = self.translit(self.model.name);
                    });

                    if (isComponentCreation) {
                        $name.on('focus.urlForm', function () {
                            if (self.model.title) {
                                $name.unbind('keyup.urlForm');
                            }
                        });

                        $name.on('blur.urlForm', function () {
                            $name.unbind('keyup.urlForm');
                        });
                    }
                });
            },

            translit (str) {
                // TODO: need to refactoring

                let text = str.toLowerCase().replace(/[^a-zA-Zа-яёА-ЯЁ0-9\-\_\s]/g, ''),
                    result = '',
                    curentSim = '';

                const dictionary = {
                    'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 'е': 'e', 'ё': 'e', 'ж': 'zh',
                    'з': 'z', 'и': 'i', 'й': 'j', 'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n',
                    'о': 'o', 'п': 'p', 'р': 'r','с': 's', 'т': 't', 'у': 'u', 'ф': 'f', 'х': 'h',
                    'ц': 'c', 'ч': 'ch', 'ш': 'sh', 'щ': 'sh','ъ': '', 'ы': 'y', 'ь': '', 'э': 'e',
                    'ю': 'yu', 'я': 'ya', ' ': '-', '_': '-'
                };

                for(var i = 0; i < text.length; i++) {
                    if(dictionary[text[i]] != undefined) {
                        if(curentSim != dictionary[text[i]] || curentSim != '-') {
                            result += dictionary[text[i]];
                            curentSim = dictionary[text[i]];
                        }
                    } else {
                        result += text[i];
                        curentSim = text[i];
                    }
                }

                return $.trim(result);
            }
            
        }

    }
</script>