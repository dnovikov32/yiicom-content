import Index from '../components/relationGroup/RelationGroupIndex.vue';
import Edit from '../components/relationGroup/RelationGroupEdit.vue';
import Delete from '../components/relationGroup/RelationGroupDelete.vue';

const routes = [
    {
        path: '/content/relation-group/index',
        name: 'content.relationGroup.index',
        component: Index,
        meta: {
            auth: true,
            breadcrumbs: [
                { text: 'Связанные материалы' }
            ]
        }
    },
    {
        path: '/content/relation-group/create',
        name: 'content.relationGroup.create',
        component: Edit,
        meta: {
            auth: true,
            breadcrumbs: [
                { text: 'Связанные материалы', href: '/#/content/relation-group/index' },
                { text: 'Создать' }
            ]
        }
    },
    {
        path: '/content/relation-group/update',
        name: 'content.relationGroup.update',
        component: Edit,
        meta: {
            auth: true,
            breadcrumbs: [
                { text: 'Связанные материалы', href: '/#/content/relation-group/index' },
                { text: 'Изменить' }
            ]
        }
    },
    {
        path: '/content/relation-group/delete',
        name: 'content.relationGroup.delete',
        component: Delete,
        meta: {
            auth: true
        }
    }
];

export default routes;