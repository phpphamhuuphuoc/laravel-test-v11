import ClassificationIndex from '../../../components/category/Index.vue';
import ClassificationCreate from '../../../components/category/Create.vue';
import ClassificationEdit from '../../../components/category/Edit.vue';
const routeClassification = [
    { path: '/cms/classification', component: ClassificationIndex, name: 'cms.classification.index' },
    { path: '/cms/classification/create', component: ClassificationCreate, name: 'cms.classification.create' },
    { path: '/cms/classification/edit/:id', component: ClassificationEdit, name: 'cms.classification.edit', props: true }
]

export default routeClassification;