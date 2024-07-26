import CollectionIndex from '../../../components/category/Index.vue';
import CollectionCreate from '../../../components/category/Create.vue';
import CollectionEdit from '../../../components/category/Edit.vue';
const routeCollection = [
    { path: '/cms/collection', component: CollectionIndex, name: 'cms.collection.index' },
    { path: '/cms/collection/create', component: CollectionCreate, name: 'cms.collection.create' },
    { path: '/cms/collection/edit/:id', component: CollectionEdit, name: 'cms.collection.edit', props: true }
]

export default routeCollection;