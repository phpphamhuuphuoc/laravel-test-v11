import GlobalIndex from '../../../components/category/Index.vue';
import GlobalCreate from '../../../components/category/Create.vue';
import GlobalEdit from '../../../components/category/Edit.vue';
const routeGlobal = [
    { path: '/cms/global', component: GlobalIndex, name: 'cms.global.index' },
    { path: '/cms/global/create', component: GlobalCreate, name: 'cms.global.create' },
    { path: '/cms/global/edit/:id', component: GlobalEdit, name: 'cms.global.edit', props: true }
]

export default routeGlobal;