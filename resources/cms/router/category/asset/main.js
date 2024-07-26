import AssetIndex from '../../../components/category/Index.vue';
import AssetCreate from '../../../components/category/Create.vue';
import AssetEdit from '../../../components/category/Edit.vue';
const routeAsset = [
    { path: '/cms/asset', component: AssetIndex, name: 'cms.asset.index' },
    { path: '/cms/asset/create', component: AssetCreate, name: 'cms.asset.create' },
    { path: '/cms/asset/edit/:id', component: AssetEdit, name: 'cms.asset.edit', props: true }
]

export default routeAsset;