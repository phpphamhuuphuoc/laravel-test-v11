import PageIndex from '../../components/page/Index.vue';
import PageCreate from '../../components/page/Create.vue';
import PageEdit from '../../components/page/Edit.vue';
const routePage = [
    { path: '/cms/page', component: PageIndex, name: 'cms.page.index' },
    { path: '/cms/page/create', component: PageCreate, name: 'cms.page.create' },
    { path: '/cms/page/edit/:id', component: PageEdit, name: 'cms.page.edit', props: true }
]

export default routePage;