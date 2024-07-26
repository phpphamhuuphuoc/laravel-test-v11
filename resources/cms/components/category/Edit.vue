<template>
    <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row mt-5">
        <router-link :to="{ name: route.nameComponentIndex }" class="btn btn-secondary ml-auto hover:ring-4">Quay lại</router-link>
    </div>
    <form class="mt-5" @submit.prevent="onSubmit()">
        <div class="box intro-y shadow-md p-6 lg:px-20 lg:py-10 bg-white">
            <div>
                <h2 class="font-medium mr-auto text-2xl text-center">
                    {{ form.title }}
                </h2>
                <!-- <div class="text-center mt-5 text-base text-gray-500">
                    {{ route.titleUcfirst }} là tập hợp các thực thể Trang, Bài Viết, Sản Phẩm
                </div> -->
            </div>
            <div class="mt-14">
                <div class="mt-10 input-form " :class="{ 'has-error': errors.title }">
                    <label for="title" class="form-label text-base font-medium">
                        Tiêu đề <span class="text-danger">*</span>
                    </label>
                    <input v-model="form.title" type="text" name="title" id="title" class="form-control required" disabled />
                    <div v-if="errors.title" class="mt-2 text-danger">{{ errors.title }}</div>
                </div>

                <div class="mt-10 input-form " :class="{ 'has-error': errors.desc }">
                    <label for="desc" class="form-label text-base font-medium">
                        Mô tả 
                        <!-- <span class="text-danger">*</span> -->
                    </label>
                    <textarea v-model="form.desc" name="desc" id="desc" class="form-control required"
                        rows="5"></textarea>
                    <div v-if="errors.desc" class="mt-2 text-danger">{{ errors.desc }}</div>
                </div>
                <div class="mt-10 input-form " :class="{ 'has-error': errors.design_id }">
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
                <button type="submit" class="btn btn-primary w-24 shadow">Cập nhật</button>
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
import {getRouteEdit} from '../../helper/URL'

export default {
    props: ['id'],
    inject: ["baseURL"],
    components: {
        NotificationSticky
    },
    data() {
        return {
            route: {},
            form: {
                title: '',
                desc: '',
                design_id: '',
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
        async validateForm() {
            let that = this;
            // Define Yup schema for validation
            const schema = yup.object().shape({
                title: yup.string().required('Tiêu đề không được để trống').max(255, 'Tiêu đề không được quá 255 ký tự'),
                desc: yup.string().nullable()
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
                this.update(true);
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
                        this.designs = response.data.data.data;
                    }
                })
                .catch((error) => {
                    console.error("Error fetching data:", error);
                });
        },
        exit(){
            let that = this;
            console.log(this.route);
            setTimeout(function() {
                that.$router.push({ name: that.route.nameComponentIndex });
                // window.location.href = `${that.baseURL}/cms/collection/`
            }, 1000); 
        },
        update(exit) {
            let that = this;
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
        load() {
            let that = this;
            axios
                .get(`${this.baseURL}/${this.route.nameAPI}/${this.id}`)
                .then((response) => {
                    var responseData = response.data.data;
                    that.form.title = responseData.title;
                    that.form.desc = responseData.desc;
                    that.form.design_id = responseData.design_id;
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
            this.loadDesign();
        },
    },
    created() {
        this.getRoute(this.$route)
        console.log(this.route);
        this.load();
        this.loadDesign();
    },

}
</script>
<style></style>