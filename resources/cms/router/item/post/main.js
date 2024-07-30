import PostIndex from '../../../components/item/post/Index.vue';
import PostCreate from '../../../components/item/post/Create.vue';
import PostEdit from '../../../components/item/post/Edit.vue';
const routePost = [
    { path: '/cms/item/post', component: PostIndex, name: 'cms.item.post.index' },
    { path: '/cms/item/post/create', component: PostCreate, name: 'cms.item.post.create' },
    { path: '/cms/item/post/edit/:id', component: PostEdit, name: 'cms.item.post.edit', props: true }
]

export default routePost;