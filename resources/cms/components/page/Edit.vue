<template>
    <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row mt-5">
        <div>
            <h2 class="font-medium mr-auto text-2xl text-center">
                Chỉnh sửa {{ route.titleUcfirst }}
            </h2>
        </div>
        <router-link :to="{ name: route.nameComponentIndex }" class="btn btn-secondary ml-auto hover:ring-4">Quay lại</router-link>
        <button @click="onSubmit(true)" class="btn btn-secondary ml-2 hover:ring-4">Lưu & Thoát</button>
        <button @click="onSubmit()" class="btn btn-primary ml-2 hover:ring-4">Lưu</button>
    </div>
    <form class="mt-5" @submit.prevent="onSubmit()">
        <div class="box intro-y shadow-md p-5 bg-white">

            <div class="grid grid-cols-12 gap-4">
                <div class="input-form col-span-12" :class="{ 'has-error': errors.title }">
                    <label for="title" class="form-label text-base font-medium">
                        Tiêu đề <span class="text-danger">*</span>
                    </label>
                    <input @input="createSlug(form.title)" v-model="form.title" type="text" name="title" id="title" class="form-control required" />
                    <div v-if="errors.title" class="mt-2 text-danger">{{ errors.title }}</div>
                </div>

                <div class="input-form col-span-12" :class="{ 'has-error': errors.is_homepage }">
                    <input @change="updateSlugHomePage()" v-model="form.is_homepage" true-value="1" false-value="0" type="checkbox" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;[type='radio']]:checked:bg-primary [&amp;[type='radio']]:checked:border-primary [&amp;[type='radio']]:checked:border-opacity-10 [&amp;[type='checkbox']]:checked:bg-primary [&amp;[type='checkbox']]:checked:border-primary [&amp;[type='checkbox']]:checked:border-opacity-10 [&amp;:disabled:not(:checked)]:bg-slate-100 [&amp;:disabled:not(:checked)]:cursor-not-allowed [&amp;:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&amp;:disabled:checked]:opacity-70 [&amp;:disabled:checked]:cursor-not-allowed [&amp;:disabled:checked]:dark:bg-darkmode-800/50 w-[38px] h-[24px] p-px rounded-full relative before:w-[20px] before:h-[20px] before:shadow-[1px_1px_3px_rgba(0,0,0,0.25)] before:transition-[margin-left] before:duration-200 before:ease-in-out before:absolute before:inset-y-0 before:my-auto before:rounded-full before:dark:bg-darkmode-600 checked:bg-primary checked:border-primary checked:bg-none before:checked:ml-[14px] before:checked:bg-white" id="is_homepage">
                    <label for="is_homepage" class="mb-0 form-label text-base font-medium ml-4">
                        Trang chủ
                    </label>
                    <div v-if="errors.is_homepage" class="mt-2 text-danger">{{ errors.is_homepage }}</div>
                </div>

                <div class="input-form col-span-12" :class="{ 'has-error': errors.slug }">
                    <label for="slug" class="form-label text-base font-medium">
                        Slug <span class="text-danger">*</span>
                    </label>
                    <input readonly v-model="form.slug" type="text" name="slug" id="slug" class="form-control required" />
                    <div v-if="errors.slug" class="mt-2 text-danger">{{ errors.slug }}</div>
                </div>

                <div class="input-form col-span-12" :class="{ 'has-error': errors.desc }">
                    <label for="desc" class="form-label text-base font-medium">
                        Mô tả
                    </label>
                    <textarea v-model="form.desc" name="desc" id="desc" rows="5" class="form-control"></textarea>
                    <div v-if="errors.desc" class="mt-2 text-danger">{{ errors.desc }}</div>
                </div>

                <div class="input-form col-span-12">
                    <label for="price" class="form-label text-base font-medium">Ảnh thumbnail</label>
                    <div class="mt-3 w-full flex-1 rounded-md border-2 border-dashed pt-4 dark:border-darkmode-400 xl:mt-0">
                        <div id="file_preview" class="grid grid-cols-10 gap-5 pl-4 pr-5">
                            <div v-if="form.thumbnail == null" @click="openFileManager()" class="image-fit zoom-in relative h-28 cursor-pointer">
                                <img class="rounded-md" src="https://www.homeiq.ae/wp-content/uploads/2015/11/default-placeholder-300x300.png">
                            </div>
                            <div v-else class="image-fit zoom-in relative h-28 cursor-pointer">
                                <img class="rounded-md" :src="form.thumbnail">
                                <span @click="removeImagePreview()" data-placement="top" class="tooltip cursor-pointer absolute right-0 top-0 -mr-2 -mt-2 flex h-5 w-5 items-center justify-center rounded-full bg-danger text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="x" class="lucide lucide-x stroke-1.5 h-4 w-4"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg></span>
                            </div>
                        </div>
                        <div id="lfm" data-input="file_path" data-preview="file_preview" @click="openFileManager()" class="relative mt-5 flex cursor-pointer items-center justify-center px-4 pb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="image" class="lucide lucide-image stroke-1.5 mr-2 h-4 w-4"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect><circle cx="9" cy="9" r="2"></circle><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path></svg>
                            <span class="mr-1 text-primary"> Tải hình ảnh </span>
                        </div>
                    </div>
                    <input type="hidden" v-model="form.thumbnail">
                </div>


                <div class="input-form col-span-12" :class="{ 'has-error': errors.template_id }">
                    <label for="template_id" class="form-label text-base font-medium">
                        Giao diện hiển thị
                        <span class="text-danger">*</span>
                    </label>
                    <select @change="loadHandle(form.template_id)" name="template_id" id="template_id" v-model="form.template_id" class="form-control required">
                        <option value="" selected>Chọn</option>
                        <option :value="item.id" v-for="item in templates" :key="item">{{ item.desc }}</option>
                    </select>
                    <div v-if="errors.template_id" class="mt-2 text-danger">{{ errors.template_id }}</div>
                </div>

                <div class="input-form col-span-12" :class="{ 'has-error': errors.handle_id }">
                    <label for="handle_id" class="form-label text-base font-medium">
                        Nội dung xử lý
                        <!-- <span class="text-danger">*</span> -->
                    </label>
                    <select name="handle_id" id="handle_id" v-model="form.handle_id" class="form-control required">
                        <option value="" selected>Chọn</option>
                        <option :value="item.id" v-for="item in categories" :key="item">{{ item.title }}</option>
                    </select>
                    <div v-if="errors.handle_id" class="mt-2 text-danger">{{ errors.handle_id }}</div>
                </div>

                

                
            </div>
        </div>


        <div class="mt-5 gap-6 grid grid-cols-12">
            <draggable
                v-model="form.modules" 
                :group="{ name: 'shared', pull: false, put: ['modules'] }" 
                itemKey="id" 
                class="intro-y box shadow-md col-span-6 p-5 border rounded-md border-slate-200/60 dark:border-darkmode-400">
                <template #header>
                    <div class="flex items-center pb-5 text-base font-medium border-b border-dashed border-slate-200/60 dark:border-darkmode-400"> 
                        <div class="flex items-center">
                            <input v-model="form.top_position"  true-value="1" false-value="0" type="checkbox" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;[type='radio']]:checked:bg-primary [&amp;[type='radio']]:checked:border-primary [&amp;[type='radio']]:checked:border-opacity-10 [&amp;[type='checkbox']]:checked:bg-primary [&amp;[type='checkbox']]:checked:border-primary [&amp;[type='checkbox']]:checked:border-opacity-10 [&amp;:disabled:not(:checked)]:bg-slate-100 [&amp;:disabled:not(:checked)]:cursor-not-allowed [&amp;:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&amp;:disabled:checked]:opacity-70 [&amp;:disabled:checked]:cursor-not-allowed [&amp;:disabled:checked]:dark:bg-darkmode-800/50 w-[38px] h-[24px] p-px rounded-full relative before:w-[20px] before:h-[20px] before:shadow-[1px_1px_3px_rgba(0,0,0,0.25)] before:transition-[margin-left] before:duration-200 before:ease-in-out before:absolute before:inset-y-0 before:my-auto before:rounded-full before:dark:bg-darkmode-600 checked:bg-primary checked:border-primary checked:bg-none before:checked:ml-[14px] before:checked:bg-white" id="preorder-active">
                            <label for="preorder-active" class="cursor-pointer ml-2 text-xs leading-relaxed text-slate-500">
                                Hiển thị trước dữ liệu nội dung
                            </label>
                        </div>
                    </div>
                </template>
                <template v-if="form.modules" #item="{ element }">
                        <div 
                            class="flex text-black hover:ring-4 hover:rounded cursor-pointer mb-4 mt-4" >
                            <div class="bg-slate-100 border border-slate-200 cursor-move px-3 py-2 rounded rounded-r-none shadow-sm sortable-item text-slate-600" id="input-group-email"> 
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="!-mb-[60px] h-4 lucide lucide-move-vertical mt-1 w-4">
                                    <polyline points="8 18 12 22 16 18"></polyline>
                                    <polyline points="8 6 12 2 16 6"></polyline>
                                    <line x1="12" x2="12" y1="2" y2="22"></line>
                                </svg> 
                            </div>
                            <div type="text" class="form-control rounded-none flex items-center">
                                {{ element.title_admin }}
                            </div>
                            <div
                                class="rounded-r flex justify-content-center align-items-center py-2 px-3 bg-slate-100 border shadow-sm border-slate-200 text-slate-600 dark:bg-darkmode-900/20 dark:border-darkmode-900/20 dark:text-slate-400 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r">
                                <div @click="removeField(element)" class="mt-1" title="Remove"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-trash-2 w-4 h-4">
                                        <path d="M3 6h18" />
                                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                        <line x1="10" x2="10" y1="11" y2="17" />
                                        <line x1="14" x2="14" y1="11" y2="17" />
                                    </svg></div>
                            </div>
                        </div>

                </template>
                <template v-if="form.modules.length == 0" #footer>
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            Thả module vào đây
                        </div>
                </template>
            </draggable>
            <div class="intro-y box shadow-md col-span-6 border rounded-md border-slate-200/60 dark:border-darkmode-400">
                <div class="modal-header p-5">
                    <h2 class="font-medium text-lg mr-auto"> Danh sách Module </h2>
                </div>
                <div class="modal-search p-5 border-slate-200\/60 text-slate-500 bg-slate-100"><input
                        type="search" name="searchFields" id="searchFields" class="form-control"
                        placeholder="Tìm kiếm..."></div>
                <div class="modal-body">
                        <draggable class="grid grid-cols-1 gap-4" v-model="modules" :group="{ name: 'modules', pull: 'clone', put: false }" itemKey="id" :sortable="false">
                            <template #item="{ element }">
                                <div class="col-span-1 item">
                                    <div class="flex text-black hover:ring-4 hover:rounded cursor-pointer">
                                        <div class="py-2 px-3 bg-slate-100 border shadow-sm border-slate-200 text-slate-600 rounded rounded-r-none"
                                            id="input-group-email"> @ </div>
                                        <div id="input1" type="text" class="form-control rounded-l-none">{{ element.title_admin }}</div>
                                    </div>
                                </div>
                            </template>
                        </draggable>
                </div>
            </div>
        </div>
    </form>
    <NotificationSticky ref="notificationSticky" :message="objNotificationSticky.message"
        :type="objNotificationSticky.type"></NotificationSticky>
</template>


<script>
import axios from "axios";
import * as yup from 'yup';
import NotificationSticky from '../global/NotificationSticky.vue'
import FormField from "../global/FormField.vue";
import draggable from 'vuedraggable';
import {getRouteEdit} from '../../helper/URL'

export default {
    props: ['id'],
    inject: ["baseURL"],
    components: {
        NotificationSticky,
        FormField,
        draggable
    },
    data() {
        return {
            route: {},
            form: {
                title: null,
                slug: null,
                desc: null,
                thumbnail: null,
                top_position: false,
                modules: [],
                is_homepage: false,
                parent_id: null,
                handle_id: null,
                seo_id: null,
                template_id: null,
            },
            errors: {
            },
            objNotificationSticky: {
                type: null,
                message: null,
            },
            categories: [],
            templates: [],
            seos: [],
            pages: [],
            modules: [],
            page_moduleIDs: [],
            tmp_modules: [],
        };
    },
    methods: {
        removeAccents(str) {
            const accentsMap = {
                a: 'áàạảãâấầậẩẫăắằặẳẵ',
                e: 'éèẹẻẽêếềệểễ',
                i: 'íìịỉĩ',
                o: 'óòọỏõôốồộổỗơớờợởỡ',
                u: 'úùụủũưứừựửữ',
                y: 'ýỳỵỷỹ',
                d: 'đ',
                A: 'ÁÀẠẢÃÂẤẦẬẨẪĂẮẰẶẲẴ',
                E: 'ÉÈẸẺẼÊẾỀỆỂỄ',
                I: 'ÍÌỊỈĨ',
                O: 'ÓÒỌỎÕÔỐỒỘỔỖƠỚỜỢỞỠ',
                U: 'ÚÙỤỦŨƯỨỪỰỬỮ',
                Y: 'ÝỲỴỶỸ',
                D: 'Đ'
            };

            for (let key in accentsMap) {
                for (let char of accentsMap[key]) {
                    str = str.replace(new RegExp(char, 'g'), key);
                }
            }

            return str;
        },
        createSlug(str) {
            str = this.removeAccents(str); // Loại bỏ dấu từ các ký tự có dấu

            // Chuyển đổi các ký tự không phải chữ cái, số thành khoảng trắng
            str = str.replace(/[^a-zA-Z0-9]/g, ' ');

            // Loại bỏ khoảng trắng thừa
            str = str.trim().replace(/\s+/g, '-');

            // Chuyển đổi thành chữ thường
            str = str.toLowerCase();

            this.form.slug = str;
        },
        removeField(element) {
            var index = this.form.modules.findIndex(item => item.id == element.id)
            if(index != -1){
                this.form.modules.splice(index, 1)
            }
        },
        updateSlugHomePage() {
            if(this.form.is_homepage == true){
                this.form.slug = '/';
            }else{
                this.createSlug(this.form.title);
            }
        },
        openFileManager() {
            let that = this;
            var lfm = function (id, type, options) {
                let button = document.getElementById(id);

                button.addEventListener('click', function () {
                    var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
                    var target_preview = document.getElementById(button.getAttribute(`data-preview`));


                    window.open(route_prefix + '?type=' + type  || 'file', 'FileManager', 'width=900,height=600');
                    window.SetUrl = function (items) {
                        var file_path = items.map(function (item) {
                            return item.url;
                        }).join(',');
                        
                        if(file_path != ''){
                            file_path = file_path.split(',');
                            that.form.thumbnail = file_path[0];
                        }
                    };
                });
            };
            // Not 
            lfm(`lfm`, 'image', {prefix: `${that.baseURL}/laravel-filemanager`});
        },
        async validateForm() {
            let that = this;
            // Define Yup schema for validation
            const schema = yup.object().shape({
                title: yup.string().required('Tiêu đề không được để trống').max(255, 'Tiêu đề không được quá 255 ký tự'),
                slug: yup.string().required('Slug không được để trống').max(255, 'Slug không được quá 255 ký tự'),
                template_id: yup.string().required('Vui lòng chọn giao diện hiển thị')
            });

            try {
                // Validate the form data
                await schema.validate(this.form, { abortEarly: false });
                this.errors = {};
                return true;
            } catch (err) {
                // Collect validation errors
                this.errors = {};
                if (err.inner) {
                    err.inner.forEach(error => {
                        this.errors[error.path] = error.message;
                    });
                }
                this.notificationSticky("error", "Vui lòng kiểm tra lại form");
                return false;
            }
        },
        async onSubmit(exit = false) {
            const isValid = await this.validateForm();
            if (isValid) {
                this.update(exit);
            }
        },
        notificationSticky(type, message) {
            this.objNotificationSticky.message = message;
            this.objNotificationSticky.type = type;
            this.$refs.notificationSticky.show();
        },


        loadHandle(template_id = null) {
            if(template_id != null){
                return;
            }
            var category_type_id = null
            if(template_id == 1 || template_id == 2 || template_id == 3 || template_id == 4 || template_id == 6){
                category_type_id = 1;
            }else if(template_id == 5){
                category_type_id = 3;
            }
            let that = this;
            axios
                .get(`${this.baseURL}/cms/api/category?category_type_id=${category_type_id}`)
                .then((response) => {
                    if (response.data.success) {
                        this.categories = response.data.data;
                    }
                })
                .catch((error) => {
                    console.error("Error fetching data:", error);
                });
        },
        loadCategories(){
            let that = this;
            axios
                .get(`${this.baseURL}/cms/api/category`)
                .then((response) => {
                    if (response.data.success) {
                        this.categories = response.data.data;
                        console.log(this.categories);
                    }
                })
                .catch((error) => {
                    console.error("Error fetching data:", error);
                });
        },
        loadTemplates(){
            let that = this;
            axios
                .get(`${this.baseURL}/cms/api/template`)
                .then((response) => {
                    if (response.data.success) {
                        this.templates = response.data.data;
                    }
                })
                .catch((error) => {
                    console.error("Error fetching data:", error);
                });
        },
        loadModules() {
            let that = this;
            axios
                .get(`${this.baseURL}/cms/api/module`)
                .then((response) => {
                    if (response.data.success) {
                        this.modules = response.data.data.data;
                    }
                })
                .catch((error) => {
                    console.error("Error fetching data:", error);
                });
        },
        exit(){
            let that = this;
            setTimeout(function() {
                that.$router.push({ name: that.route.nameComponentIndex });
                // window.location.href = `${that.baseURL}/cms/collection/`
            }, 1000); 
        },
        update(exit) {
            let that = this;
            if(this.form.modules && this.form.modules.length > 0){
                this.form.modules.forEach(function(item){
                    that.page_moduleIDs.push(item.id);
                })
            }
            let tmp_modules = [];
            tmp_modules = this.form.modules;
            this.form.modules = this.page_moduleIDs;
            axios
                .put(`${this.baseURL}/${this.route.nameAPI}/${this.id}`, this.form)
                .then((response) => {
                    this.form.modules = this.tmp_modules;
                    console.log('Response from server:', response.data);
                    if (response.data.success == true) {
                        this.notificationSticky('success', response.data.message);
                        if(exit){
                            this.exit();
                        }
                    }else{
                        this.notificationSticky('error', response.data.message);
                    }
                })
                .catch((response) => {
                    this.form.modules = this.tmp_modules;
                    console.log(response);
                    this.notificationSticky('error', 'Đã xảy ra lỗi. Vui lòng thử lại sau');
                });
        },
        loadModuleById(id) {
            axios
                .get(`${this.baseURL}/cms/api/module/${id}`)
                .then((response) => {
                    if (response.data.success) {
                        this.tmp_modules.push(response.data.data);
                    }
                })
                .catch((error) => {
                    console.error("Error fetching data:", error);
                });
        },
        loadDesigns(){
            let that = this;
            axios
                .get(`${this.baseURL}/cms/api/design`)
                .then((response) => {
                    if (response.data.success) {
                        this.designs = response.data.data.data;
                        this.loadDesign();
                    }
                })
                .catch((error) => {
                    console.error("Error fetching data:", error);
                });
        },
        loadDesign(){
            let that = this;
            if(this.form.data == null){
                axios
                .get(`${this.baseURL}/cms/api/design/${this.form.design_id}`)
                .then((response) => {
                    if (response.data.success) {
                        this.form.data = response.data.data.data;
                        if(this.form.data.length > 0){
                            this.form.data.forEach(function(field){
                                if(field.type=='repeater'){
                                    const copiedObject = JSON.parse(JSON.stringify(field.data));
                                    field.data = [];
                                    field.data[0] = copiedObject;
                                }
                            });
                        }
                    }
                })
                .catch((error) => {
                    console.error("Error fetching data:", error);
                });
            }else{
                console.log('-------------------', this.form.data);
            }

        },
        load() {
            let that = this;
            axios
                .get(`${this.baseURL}/${this.route.nameAPI}/${this.id}`)
                .then((response) => {
                    var responseData = response.data.data;
                    this.form = responseData;
                    if(this.form.modules && this.form.modules.length > 0){
                        this.form.modules.forEach(function(item){
                            that.loadModuleById(item)
                        })
                    }
                    this.form.modules = this.tmp_modules;
                })
                .catch((error) => {
                    console.error("Error fetching data:", error);
                });
        },
        getRoute(current){
            this.route = current;
            this.route = getRouteEdit(this.route)
        },
    },
    watch: {
        $route(to, from) {
            this.getRoute(to)
            this.load();
            this.loadCategories();
            this.loadTemplates();
            this.loadModules();
        },
    },
    created() {
        this.getRoute(this.$route)
        this.load();
        this.loadCategories();
        this.loadTemplates();
        this.loadModules();
    },

}
</script>
<style></style>