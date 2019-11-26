import Vue from 'vue';
import pageStore from './store/pages.js';
import categoryStore from './store/category.js';
import PagesIndex from './components/pages/PagesIndex.vue';
import PagesEdit from "./components/pages/PagesEdit.vue";
import PagesDelete from "./components/pages/PagesDelete.vue";
import CategoriesIndex from "./components/categories/CategoriesIndex.vue";
import CategoriesEdit from "./components/categories/CategoriesEdit.vue";
import CategoriesDelete from "./components/categories/CategoriesDelete.vue";

window.App.$store.registerModule('pages', pageStore);
window.App.$store.registerModule('pages-categories', categoryStore);

const routes = [
    {
        path: '/pages/page/index',
        name: 'pages.index',
        component: PagesIndex,
        meta: {
            auth: true,
            breadcrumbs: [
                { text: 'Страницы' }
            ]
        }
    },
    {
        path: '/pages/page/create',
        name: 'pages.create',
        component: PagesEdit,
        meta: {
            auth: true,
            breadcrumbs: [
                { text: 'Страницы', href: '/#/pages/page/index' },
                { text: 'Создать' }
            ]
        }
    },
    {
        path: '/pages/page/update',
        name: 'pages.update',
        component: PagesEdit,
        meta: {
            auth: true,
            breadcrumbs: [
                { text: 'Страницы', href: '/#/pages/page/index' },
                { text: 'Изменить' }
            ]
        }
    },
    {
        path: '/pages/page/delete',
        name: 'pages.delete',
        component: PagesDelete,
        meta: {
            auth: true
        }
    },
    {
        path: '/pages/category/index',
        name: 'pages.category.index',
        component: CategoriesIndex,
        meta: {
            auth: true,
            breadcrumbs: [
                { text: 'Категории страниц' }
            ]
        }
    },
    {
        path: '/pages/category/create',
        name: 'pages.category.create',
        component: CategoriesEdit,
        meta: {
            auth: true,
            breadcrumbs: [
                { text: 'Категории страниц', href: '/#/pages/category/index' },
                { text: 'Создать' }
            ]
        }
    },
    {
        path: '/pages/category/update',
        name: 'pages.category.update',
        component: CategoriesEdit,
        meta: {
            auth: true,
            breadcrumbs: [
                { text: 'Категории страниц', href: '/#/pages/category/index' },
                { text: 'Изменить' }
            ]
        }
    },
    {
        path: '/pages/category/delete',
        name: 'pages.category.delete',
        component: CategoriesDelete,
        meta: {
            auth: true
        }
    },
];

window.App.$router.addRoutes(routes);
