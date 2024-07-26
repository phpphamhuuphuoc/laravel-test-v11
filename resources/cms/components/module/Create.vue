<template>
    <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row mt-5">
        <router-link :to="{ name: route.nameComponentIndex }" class="btn btn-secondary ml-auto hover:ring-4">Quay lại</router-link>
    </div>
    <form class="mt-5" @submit.prevent="onSubmit()">
        <div class="box intro-y shadow-md p-6 lg:px-20 lg:py-10 bg-white">
            <div>
                <h2 class="font-medium mr-auto text-2xl text-center">
                    Tạo {{ route.titleUcfirst }}
                </h2>
                <!-- <div class="text-center mt-5 text-base text-gray-500">
                    {{ route.titleUcfirst }} là tập hợp các thực thể Trang, Bài Viết, Sản Phẩm
                </div> -->
            </div>
            <div class="mt-14 grid grid-cols-12 gap-4">
                <div class="input-form col-span-12" :class="{ 'has-error': errors.title_admin }">
                    <label for="title_admin" class="form-label text-base font-medium">
                        Tiêu đề Admin <span class="text-danger">*</span>
                    </label>
                    <input v-model="form.title_admin" type="text" name="title_admin" id="title_admin" class="form-control required" />
                    <div v-if="errors.title_admin" class="mt-2 text-danger">{{ errors.title_admin }}</div>
                </div>

                <div class="input-form col-span-6" :class="{ 'has-error': errors.title_user }">
                    <label for="title_user" class="form-label text-base font-medium">
                        Tiêu đề User <span class="text-danger">*</span>
                    </label>
                    <input v-model="form.title_user" type="text" name="title_user" id="title_user" class="form-control required" />
                    <div v-if="errors.title_user" class="mt-2 text-danger">{{ errors.title_user }}</div>
                </div>

                <div class="input-form col-span-6" :class="{ 'has-error': errors.sub_title_user }">
                    <label for="sub_title_user" class="form-label text-base font-medium">
                        Tiêu đề phụ User
                    </label>
                    <input v-model="form.sub_title_user" type="text" name="sub_title_user" id="sub_title_user" class="form-control required" />
                    <div v-if="errors.sub_title_user" class="mt-2 text-danger">{{ errors.sub_title_user }}</div>
                </div>

                <div class="input-form col-span-12" :class="{ 'has-error': errors.desc }">
                    <label for="desc" class="form-label text-base font-medium">
                        Mô tả
                    </label>
                    <textarea v-model="form.desc" name="desc" id="desc" rows="5" class="form-control"></textarea>
                    <div v-if="errors.desc" class="mt-2 text-danger">{{ errors.desc }}</div>
                </div>

                <div class="input-form col-span-12">
                    <label for="price" class="form-label text-base font-medium">Ảnh background</label>
                    <div class="mt-3 w-full flex-1 rounded-md border-2 border-dashed pt-4 dark:border-darkmode-400 xl:mt-0">
                        <div id="file_preview" class="grid grid-cols-10 gap-5 pl-4 pr-5">
                            <div v-if="form.background == null" @click="openFileManager()" class="image-fit zoom-in relative h-28 cursor-pointer">
                                <img class="rounded-md" src="https://www.homeiq.ae/wp-content/uploads/2015/11/default-placeholder-300x300.png">
                            </div>
                            <div v-else class="image-fit zoom-in relative h-28 cursor-pointer">
                                <img class="rounded-md" :src="form.background">
                                <span @click="removeImagePreview()" data-placement="top" class="tooltip cursor-pointer absolute right-0 top-0 -mr-2 -mt-2 flex h-5 w-5 items-center justify-center rounded-full bg-danger text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="x" class="lucide lucide-x stroke-1.5 h-4 w-4"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg></span>
                            </div>
                        </div>
                        <div id="lfm" data-input="file_path" data-preview="file_preview" @click="openFileManager()" class="relative mt-5 flex cursor-pointer items-center justify-center px-4 pb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="image" class="lucide lucide-image stroke-1.5 mr-2 h-4 w-4"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect><circle cx="9" cy="9" r="2"></circle><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path></svg>
                            <span class="mr-1 text-primary"> Tải hình ảnh </span>
                        </div>
                    </div>
                    <input type="hidden" v-model="form.background">
                </div>

                <div class="input-form col-span-12" :class="{ 'has-error': errors.design_id }">
                    <label for="design_id" class="form-label text-base font-medium">
                        Bản thiết kế
                        <!-- <span class="text-danger">*</span> -->
                    </label>
                    <select name="design_id" id="design_id" v-model="form.design_id" class="form-control required">
                        <option :value="item.id" v-for="item in designs" :key="item">{{ item.title }}</option>
                    </select>
                    <div v-if="errors.design_id" class="mt-2 text-danger">{{ errors.design_id }}</div>
                </div>
            </div>
            <div class="flex justify-center mt-4">
                <button type="submit" class="btn btn-primary w-24 shadow">Tạo mới</button>
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
import {getRouteCreate} from '../../helper/URL'

export default {
    inject: ["baseURL"],
    components: {
        NotificationSticky,
        FormField
    },
    data() {
        return {
            route: {},
            form: {
                title_admin: null,
                title_user: null,
                sub_title_user: null,
                desc: null,
                thumbnail: null,
                background: null,
                cta_text: null,
                cta_url: null,
                cta_url_title: null,
                cta_icon: null,
                data: null,
                design_id: null,
            },
            errors: {
            },
            objNotificationSticky: {
                type: null,
                message: null,
            },
            designs: {},
        };
    },
    methods: {
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
                            that.form.background = file_path[0];
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
                title_admin: yup.string().required('Tiêu đề không được để trống').max(255, 'Tiêu đề không được quá 255 ký tự'),
                title_user: yup.string().required('Tiêu đề không được để trống').max(255, 'Tiêu đề không được quá 255 ký tự'),
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
        async onSubmit() {
            const isValid = await this.validateForm();
            if (isValid) {
                this.store();
            }
        },
        notificationSticky(type, message) {
            this.objNotificationSticky.message = message;
            this.objNotificationSticky.type = type;
            this.$refs.notificationSticky.show();
        },


        loadDesign(){
            let that = this;
            axios
                .get(`${this.baseURL}/cms/api/design`)
                .then((response) => {
                    if (response.data.success) {
                        console.log(response.data.data.data);
                        this.designs = response.data.data.data;
                    }
                })
                .catch((error) => {
                    console.error("Error fetching data:", error);
                });
        },
        store() {
            axios
                .post(`${this.baseURL}/${this.route.nameAPI}`, this.form)
                .then((response) => {
                console.log('Response from server:', response.data);
                if (response.data.success) {
                    this.notificationSticky('success', response.data.message);
                    setTimeout(() => {
                        // Reset form fields
                        this.form = {
                            title: '',
                            desc: ''
                        };
                        // Navigate to the edit component
                        this.$router.push({ name: this.route.nameComponentEdit, params: { id: response.data.data.id } });
                    }, 2000);
                } else {
                    this.notificationSticky('error', response.data.message);
                }
                })
                .catch((error) => {
                console.error(error);
                this.notificationSticky('error', 'Đã xảy ra lỗi. Vui lòng thử lại sau');
                });
        },
        getRoute(current){
            this.route = current;
            this.route = getRouteCreate(this.route);
            console.log(this.route);
        },
    },
    watch: {
        $route(to, from) {
            this.getRoute(to)
        },
    },
    created() {
        this.getRoute(this.$route)
        this.loadDesign();
    },

}
</script>
<style></style>