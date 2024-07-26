import DesignIndex from '../../components/design/Index.vue';
import DesignCreate from '../../components/design/Create.vue';
import DesignEdit from '../../components/design/Edit.vue';
import DesignForm from '../../components/design/Form.vue';
const routeCollection = [
    { path: '/cms/design', component: DesignIndex, name: 'cms.design.index' },
    { path: '/cms/design/create', component: DesignForm, name: 'cms.design.create' },
    { path: '/cms/design/edit/:id', component: DesignForm, name: 'cms.design.edit', props: true }
]

export default routeCollection;