import { createRouter, createWebHistory } from 'vue-router';
import CollectionIndex from '../components/category/Index.vue';

import routeDesign from './design/main.js'
import routeModule from './module/main.js'
import routePage from './page/main.js'
import routeAsset from './category/asset/main.js'
import routeClassification from './category/classification/main.js'
import routeCollection from './category/collection/main.js'
import routeForm from './category/form/main.js'
import routeGlobal from './category/global/main.js'
import routeNavigation from './category/navigation/main.js'
import routeOther from './category/other/main.js';
// -------------------



import routeProduct from './item/product/main.js'

import routePost from './item/post/main.js'

import routeContact from './item/contact/main.js'

import routeTestCollection from './item/test-collection/main.js'
// CONST BREAKPOINT_IMPORT = true;
const routes = [
  { path: '/cms/', component: CollectionIndex, name: 'home' },
];
routes.push(...routeDesign);
routes.push(...routePage);
routes.push(...routeModule);
routes.push(...routeAsset);
routes.push(...routeClassification);
routes.push(...routeCollection);
routes.push(...routeForm);
routes.push(...routeGlobal);
routes.push(...routeNavigation);
routes.push(...routeOther);


routes.push(...routeProduct);

routes.push(...routePost);

routes.push(...routeContact);

routes.push(...routeTestCollection);
// CONST BREAKPOINT_PUSH = true;


const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
