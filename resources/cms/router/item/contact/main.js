import ContactIndex from '../../../components/item/contact/Index.vue';
import ContactCreate from '../../../components/item/contact/Create.vue';
import ContactEdit from '../../../components/item/contact/Edit.vue';
const routeContact = [
    { path: '/cms/item/contact', component: ContactIndex, name: 'cms.item.contact.index' },
    { path: '/cms/item/contact/create', component: ContactCreate, name: 'cms.item.contact.create' },
    { path: '/cms/item/contact/edit/:id', component: ContactEdit, name: 'cms.item.contact.edit', props: true }
]

export default routeContact;