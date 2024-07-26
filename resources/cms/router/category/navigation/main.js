import NavigationIndex from '../../../components/category/Index.vue';
import NavigationCreate from '../../../components/category/Create.vue';
import NavigationEdit from '../../../components/category/Edit.vue';

const routeNavigation = [
    { path: '/cms/navigation', component: NavigationIndex, name: 'cms.navigation.index' },
    { path: '/cms/navigation/create', component: NavigationCreate, name: 'cms.navigation.create' },
    { path: '/cms/navigation/edit/:id', component: NavigationEdit, name: 'cms.navigation.edit', props: true }
]

export default routeNavigation;