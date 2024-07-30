import ProductIndex from '../../../components/item/product/Index.vue';
import ProductCreate from '../../../components/item/product/Create.vue';
import ProductEdit from '../../../components/item/product/Edit.vue';
const routeProduct = [
    { path: '/cms/item/product', component: ProductIndex, name: 'cms.item.product.index' },
    { path: '/cms/item/product/create', component: ProductCreate, name: 'cms.item.product.create' },
    { path: '/cms/item/product/edit/:id', component: ProductEdit, name: 'cms.item.product.edit', props: true }
]

export default routeProduct;