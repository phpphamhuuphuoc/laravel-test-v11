import TestCollectionIndex from '../../../components/item/test-collection/Index.vue';
import TestCollectionCreate from '../../../components/item/test-collection/Create.vue';
import TestCollectionEdit from '../../../components/item/test-collection/Edit.vue';
const routeTestCollection = [
    { path: '/cms/item/test-collection', component: TestCollectionIndex, name: 'cms.item.test-collection.index' },
    { path: '/cms/item/test-collection/create', component: TestCollectionCreate, name: 'cms.item.test-collection.create' },
    { path: '/cms/item/test-collection/edit/:id', component: TestCollectionEdit, name: 'cms.item.test-collection.edit', props: true }
]

export default routeTestCollection;