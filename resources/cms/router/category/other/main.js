import OtherIndex from '../../../components/category/Index.vue';
import OtherCreate from '../../../components/category/Create.vue';
import OtherEdit from '../../../components/category/Edit.vue';
const routeOther = [
    { path: '/cms/other', component: OtherIndex, name: 'cms.other.index' },
    { path: '/cms/other/create', component: OtherCreate, name: 'cms.other.create' },
    { path: '/cms/other/edit/:id', component: OtherEdit, name: 'cms.other.edit', props: true }
]

export default routeOther;