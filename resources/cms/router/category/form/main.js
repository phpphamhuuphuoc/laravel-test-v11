import FormIndex from '../../../components/category/Index.vue';
import FormCreate from '../../../components/category/Create.vue';
import FormEdit from '../../../components/category/Edit.vue';
const routeForm = [
    { path: '/cms/form', component: FormIndex, name: 'cms.form.index' },
    { path: '/cms/form/create', component: FormCreate, name: 'cms.form.create' },
    { path: '/cms/form/edit/:id', component: FormEdit, name: 'cms.form.edit', props: true }
]

export default routeForm;