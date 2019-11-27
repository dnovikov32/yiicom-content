import PagesIndex from '../components/pages/PagesIndex.vue';
import PagesEdit from "../components/pages/PagesEdit.vue";
import PagesDelete from "../components/pages/PagesDelete.vue";
import CategoriesIndex from "../components/categories/CategoriesIndex.vue";
import CategoriesEdit from "../components/categories/CategoriesEdit.vue";
import CategoriesDelete from "../components/categories/CategoriesDelete.vue";

const routes = [
    {
        path: '/content/page/index',
        name: 'content.page.index',
        component: PagesIndex,
        meta: {
            auth: true,
            breadcrumbs: [
                { text: 'Страницы' }
            ]
        }
    },
    {
        path: '/content/page/create',
        name: 'content.page.create',
        component: PagesEdit,
        meta: {
            auth: true,
            breadcrumbs: [
                { text: 'Страницы', href: '/#/content/page/index' },
                { text: 'Создать' }
            ]
        }
    },
    {
        path: '/content/page/update',
        name: 'content.page.update',
        component: PagesEdit,
        meta: {
            auth: true,
            breadcrumbs: [
                { text: 'Страницы', href: '/#/content/page/index' },
                { text: 'Изменить' }
            ]
        }
    },
    {
        path: '/content/page/delete',
        name: 'content.page.delete',
        component: PagesDelete,
        meta: {
            auth: true
        }
    },
    {
        path: '/content/category/index',
        name: 'content.category.index',
        component: CategoriesIndex,
        meta: {
            auth: true,
            breadcrumbs: [
                { text: 'Категории страниц' }
            ]
        }
    },
    {
        path: '/content/category/create',
        name: 'content.category.create',
        component: CategoriesEdit,
        meta: {
            auth: true,
            breadcrumbs: [
                { text: 'Категории страниц', href: '/#/content/category/index' },
                { text: 'Создать' }
            ]
        }
    },
    {
        path: '/content/category/update',
        name: 'content.category.update',
        component: CategoriesEdit,
        meta: {
            auth: true,
            breadcrumbs: [
                { text: 'Категории страниц', href: '/#/content/category/index' },
                { text: 'Изменить' }
            ]
        }
    },
    {
        path: '/content/category/delete',
        name: 'content.category.delete',
        component: CategoriesDelete,
        meta: {
            auth: true
        }
    }
];

export default routes;