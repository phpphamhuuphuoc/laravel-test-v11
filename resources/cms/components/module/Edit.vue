<template>
    <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row mt-5">
        <div>
            <h2 class="font-medium mr-auto text-2xl text-center">
                Chỉnh sửa {{ route.titleUcfirst }} {{ form.title_admin }}
            </h2>
        </div>
        <router-link :to="{ name: route.nameComponentIndex }" class="btn btn-secondary ml-auto hover:ring-4">Quay lại</router-link>
        <button @click="onSubmit(true)" class="btn btn-secondary ml-2 hover:ring-4">Lưu & Thoát</button>
        <button @click="onSubmit()" class="btn btn-primary ml-2 hover:ring-4">Lưu</button>
    </div>
    <form class="mt-5" @submit.prevent="onSubmit()">
        <div class="box intro-y shadow-md p-5 bg-white">

            <div class="grid grid-cols-12 gap-4">
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
                <div class="input-form col-span-6" :class="{ 'has-error': errors.cta_text }">
                    <label for="cta_text" class="form-label text-base font-medium">
                        Kêu gọi hành động
                    </label>
                    <input v-model="form.cta_text" type="text" name="cta_text" id="cta_text" class="form-control required" />
                    <div v-if="errors.cta_text" class="mt-2 text-danger">{{ errors.cta_text }}</div>
                </div>
                <div class="input-form col-span-6" :class="{ 'has-error': errors.cta_url }">
                    <label for="cta_url" class="form-label text-base font-medium">
                        URL kêu gọi hành động
                    </label>
                    <input v-model="form.cta_url" type="text" name="cta_url" id="cta_url" class="form-control required" />
                    <div v-if="errors.cta_url" class="mt-2 text-danger">{{ errors.cta_url }}</div>
                </div>
                <div class="input-form col-span-6" :class="{ 'has-error': errors.cta_url_title }">
                    <label for="cta_url_title" class="form-label text-base font-medium">
                        Tiêu đề URL kêu gọi hành động
                    </label>
                    <input v-model="form.cta_url_title" type="text" name="cta_url_title" id="cta_url_title" class="form-control required" />
                    <div v-if="errors.cta_url_title" class="mt-2 text-danger">{{ errors.cta_url_title }}</div>
                </div>
                <div class="input-form col-span-6" :class="{ 'has-error': errors.cta_icon }">
                    <label for="cta_icon" class="form-label text-base font-medium">
                        Icon kêu gọi hành động
                    </label>
                    <input v-model="form.cta_icon" type="text" name="cta_icon" id="cta_icon" class="form-control required" />
                    <div v-if="errors.cta_icon" class="mt-2 text-danger">{{ errors.cta_icon }}</div>
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
        </div>
    </form>
    <div class="intro-y box p-5 shadow-md mt-5">
        <div :class="field.classSize.class" v-for="field in form.data" :key="field.id" class="mt-5">
            <FormField :key="field.id" :attrHTML="field" @duplicateRepeater="duplicateRepeater"></FormField>
        </div>
    </div>
    <NotificationSticky ref="notificationSticky" :message="objNotificationSticky.message"
        :type="objNotificationSticky.type"></NotificationSticky>
</template>


<script>
import axios from "axios";
import * as yup from 'yup';
import NotificationSticky from '../global/NotificationSticky.vue'
import FormField from '../global/FormField.vue';

import {getRouteEdit} from '../../helper/URL'

export default {
    props: ['id'],
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
        duplicateRepeater(data) {
            // Tìm khóa (key) của object trong this.form.data mà có id trùng với data.id
            let targetKey = null;

            // Lặp qua các khóa trong object để tìm key tương ứng
            for (const key in this.form.data) {
                if (this.form.data[key].id === data.id) {
                    targetKey = key;
                    break;
                }
            }
            // Nếu tìm thấy khóa, thực hiện các thao tác trên phần tử tương ứng
            if (targetKey !== null) {
                const targetItem = this.form.data[targetKey].data[this.form.data[targetKey].data.length - 1];
                // Kiểm tra xem targetItem.data có phần tử nào không
                if (targetItem) {

                    // Tạo bản sao sâu của dữ liệu
                    const newData = JSON.parse(JSON.stringify(targetItem));
                    
                    // Thực hiện các thao tác trên bản sao dữ liệu
                    if (newData) {
                        for (const key in newData) {
                            console.log(key);
                            newData[key].id = Math.random().toString(36).substring(2);
                        }
                    }

                    // Chèn bản sao vào mảng dữ liệu
                    this.form.data[targetKey].data.push(newData);
                }
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
        async onSubmit(exit) {
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
        exit(){
            let that = this;
            setTimeout(function() {
                that.$router.push({ name: that.route.nameComponentIndex });
                // window.location.href = `${that.baseURL}/cms/collection/`
            }, 1000); 
        },
        update(exit) {
            let that = this;
            let transformedData = Object.entries(this.form.data).reduce((acc, [key, item]) => {
                    acc[item.name] = item;
                    if (item.type !== 'repeater') {
                        item.data.forEach((element, index) => {
                            let transformedSubData = Object.entries(element).reduce((sub_acc, [sub_key, sub_item]) => {
                                sub_acc[sub_item.name] = sub_item;
                                return sub_acc;
                            }, {});
                            acc.data[index] = transformedSubData;
                        });
                    }
                    return acc;
            }, {});
            // console.log(transformedData);
            // return;
            this.form.data = transformedData;
            axios
                .put(`${this.baseURL}/${this.route.nameAPI}/${this.id}`, this.form)
                .then((response) => {
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
                    console.log(response);
                    this.notificationSticky('error', 'Đã xảy ra lỗi. Vui lòng thử lại sau');
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
                    that.form = responseData;
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
            this.loadDesigns();
        },
    },
    created() {
        this.getRoute(this.$route)
        this.load();
        this.loadDesigns();
    },

}
</script>
<style></style>