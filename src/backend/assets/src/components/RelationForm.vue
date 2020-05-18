<template>

    <b-card
        v-if="groups"
        class="mb-4"
        :header="title"
        header-class="text-white bg-secondary"
        no-body
    >

        <b-card-body>

            <div v-for="(group, groupIndex) in groups">

                <div v-if="modelClass === group.modelClass && lists[group.relationClass]">

                    <h6>{{ group.title }}</h6>

                    <select
                        @change="select(group, $event)"
                        class="col-3 custom-select mb-4"
                    >
                        <option :value="null">Выбрать</option>
                        <option v-for="(item, itemIndex) in lists[group.relationClass]"
                            :value="item.id"
                        >
                            {{ item.name }}
                        </option>
                    </select>

                    <ul v-if="relations">
                        <li v-for="(relation, relationIndex) in relations" v-if="group.id === relation.groupId">
                            <span>{{ relationName(group, relation) }} </span>
                            <a class="btn btn-xs btn-danger" @click="remove(group, relation)">
                                <i class="fa fa-trash"></i>
                            </a>
                        </li>
                    </ul>

                </div>

            </div>

        </b-card-body>

    </b-card>

</template>

<script>

    import Vue from 'vue';
    import _ from 'lodash'

    export default {

        props: {
            title: {
                type: String,
                default: 'Связанные материалы'
            },
            model: {
                type: [Array],
                default: function () {
                    return [];
                }
            },
            modelClass: String
        },

        computed: {
            relations: {
                get () {
                    return this.model;
                },
                set (value) {
                    this.$emit('update:model', value);
                }
            },
            groups: function () {
                return this.$store.getters['content-relation-group/list'];
            },
            lists: function () {
                return this.$store.getters['content-relation/list'];
            }
        },

        created () {
            this.init();
        },

        watch: {
            model (model) {
                this.model = model;
            },
            '$route' () {
                this.init();
            }
        },

        methods: {
            init () {
                console.log('INIT RELATIONS');

                let self = this;

                this.$store.dispatch('content-relation-group/list', { modelClass: this.modelClass }).then(() => {
                    let uniqRelationClasses = _.uniqBy(self.groups, 'relationClass');

                    _.each(uniqRelationClasses, function (group) {
                        self.$store.dispatch('content-relation/list', { relationClass: group.relationClass });
                    });
                });
            },

            select (group, event) {
                let self = this;
                let relationModelId = parseInt(event.target.value);

                if (! relationModelId) {
                    return false;
                }

                let exists = this.relations.find(relation => {
                    return relation.relationId === relationModelId && relation.groupId === group.id;
                });

                if (exists) {
                    return false;
                }

                this.relations.push({
                    'groupId': group.id,
                    'modelClass': this.modelClass,
                    'relationId': relationModelId,
                });
            },

            remove (group, relation) {
                if (! confirm('Вы уверены?')) {
                    return false;
                }

                this.relations.splice(this.relations.indexOf(relation), 1);
            },

            // TODO: need to do something with getting the name and image of relation
            relationName (group, relation) {
                let item = _.find(this.lists[group.relationClass], (element) => {
                    return element.id == relation.relationId;
                });

                return item.name;
            }
        }

    }
</script>