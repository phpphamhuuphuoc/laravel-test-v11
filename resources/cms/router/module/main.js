import ModuleIndex from '../../components/module/Index.vue';
import ModuleCreate from '../../components/module/Create.vue';
import ModuleEdit from '../../components/module/Edit.vue';
const routeModule = [
    { path: '/cms/module', component: ModuleIndex, name: 'cms.module.index' },
    { path: '/cms/module/create', component: ModuleCreate, name: 'cms.module.create' },
    { path: '/cms/module/edit/:id', component: ModuleEdit, name: 'cms.module.edit', props: true }
]

export default routeModule;