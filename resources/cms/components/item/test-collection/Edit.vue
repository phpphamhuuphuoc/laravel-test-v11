<template>
    <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row mt-5">
        <div class="text-2xl font-medium group-[.mode--light]:text-white">TestCollection</div>
        <router-link :to="{ name: 'cms.item.test-collection.index' }"
            class="btn btn-secondary ml-auto hover:ring-4">Quay lại</router-link>
        <!-- <a :href="this.baseURL + '/cms/item/test-collection'" class="btn btn-secondary ml-auto hover:ring-4">Quay lại</a> -->
        <button @click="update(true)" class="btn btn-secondary ml-2 hover:ring-4">Lưu & Thoát</button>
        <button @click="update()" class="btn btn-primary ml-2 hover:ring-4">Lưu</button>
    </div>
    <div v-if="!fetchError" class="mt-5 grid grid-cols-12 gap-6">
        <div class="intro-y col-span-12">
            <div class="intro-y box p-5 mt-5 shadow-mdm">
                <TabGroup>
                    <TabList class="nav-link-tabs">
                        <Tab class="w-full py-2 nav-link-item" tag="button">Nội dung</Tab>
                        <Tab class="w-full py-2 nav-link-item" tag="button">SEO</Tab>
                    </TabList>
                    <TabPanels class="mt-5">
                        <TabPanel class="leading-relaxed">
                            <div class="intro-y box shadow-md">
                                <div class="p-5 border rounded-md border-slate-200/60 dark:border-darkmode-400">
                                    <div
                                        class="flex items-center pb-5 text-base font-medium border-b border-dashed border-slate-200/60 dark:border-darkmode-400">
                                        Section 1 </div>
                                    <div class="mt-5">
                                        <div class="flex flex-wrap gap-4 list-size-design">
                                            <div class="w-full">
                                                <div class="input-form">
                                                    <label for="title" class="form-label">Tiêu đề</label>
                                                    <input @input="createSlug(form.title)" v-model="form.title" name="title" id="title" maxlength="255" class="form-control" placeholder="Tiêu đề">
                                                </div>
                                            </div>
                                            <div class="w-full">
                                                <div class="input-form">
                                                    <label for="slug" class="form-label">Slug</label>
                                                    <input disabled v-model="form.slug" type="text" name="slug" id="slug" maxlength="255" class="form-control" placeholder="Slug">
                                                </div>
                                            </div>
                                            <div class="w-full">
                                                <div class="input-form">
                                                    <label for="date" class="form-label">Ngày xuất bản</label>
                                                    <input v-model="form.date" type="date" name="date" id="date"  class="form-control" placeholder="Ngày xuất bản">
                                                </div>
                                            </div>
                                            <div class="w-full">
                                                <div class="input-form">
                                                    <label for="desc" class="form-label">Mô tả ngắn</label>
                                                    <textarea v-model="form.desc" name="desc" id="desc" rows="5" placeholder="Mô tả ngắn" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="w-full">
                                                <div class="input-form">
                                                    <label for="" class="form-label">Nội dung</label>
                                                    <!-- <textarea name="" id="" cols="30" rows="10" placeholder="Nội dung"></textarea> -->
                                                    <ClassicEditor v-model="form.content" />
                                                </div>
                                            </div>
                                            <div class="w-full">
                                                <label for="price" class="form-label">Ảnh đại diện</label>
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
                                            <div class="w-full">
                                                <div class="input-form">
                                                    <label for="status" class="form-label">Trạng thái</label>
                                                    <select name="status" id="status" class="form-control" v-model="form.status">
                                                        <option value="Published">Published</option>
                                                        <option value="Draft">Draft</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <template v-if="design">
                                                <div :class="field.classSize.class" v-for="field in form.data" :key="field.id">
                                                    <FormField :key="field.id" :attrHTML="field"></FormField>
                                                </div>
                                            </template>
                                            <template v-else>
                                                <router-link
                                                    :to="{ name: `cms.${category.category_type.type}.edit`, params: { id: category.id } }"
                                                    class="col-span-12 text-center hover:underline text-sm flex-1">
                                                    Không có bản thiết kế? Tạo từ danh mục
                                                </router-link>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </TabPanel>
                        <TabPanel class="leading-relaxed">
                            It is
                        </TabPanel>
                    </TabPanels>
                </TabGroup>
            </div>
        </div>
    </div>
    <NotificationSticky ref="notificationSticky" :message="objNotificationSticky.message"
        :type="objNotificationSticky.type"></NotificationSticky>
</template>

<script>
import NotificationSticky from '../../global/NotificationSticky.vue'
import FormField from '../../global/FormField.vue';
import { ref } from "vue";
export default {
    props: ['id'],
    inject: ['baseURL'],
    components: {
        NotificationSticky,
        FormField
    },
    data() {
        return {
            fetchError: false,
            category: {},
            objNotificationSticky: {
                type: null,
                message: null,
            },
            errors: {},
            form: {
                title: null,
                slug: null,
                date: null,
                desc: null,
                content: ref(""),
                thumbnail: null,
                status: null,
                data: ref([]),
            },
            design: [],
        }
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
        removeImagePreview(){
            this.form.thumbnail = '';
        },
        notificationSticky(type, message) {
            this.objNotificationSticky.message = message;
            this.objNotificationSticky.type = type;
            this.$refs.notificationSticky.show();
        },
        exit() {
            setTimeout(function () {
                window.location.href = `${that.baseURL}/cms/item/test-collection`
            }, 1000);
        },
        update(exit) {
            let that = this;
            axios
                .put(`${this.baseURL}/cms/api/item/test-collection/${this.id}`, this.form)
                .then((response) => {
                    console.log('Response from server:', response.data);
                    if (response.data.success == true) {
                        this.notificationSticky('success', response.data.message);
                        if (exit) {
                            setTimeout(function () {
                                window.location.href = `${that.baseURL}/cms/item/test-collection`
                            }, 1000);
                        } else {
                            setTimeout(function () {
                                location.reload();
                            }, 1000);
                        }


                    } else {
                        this.notificationSticky('error', response.data.message);
                    }
                })
                .catch((response) => {
                    console.log(response);
                    this.notificationSticky('error', 'Đã xảy ra lỗi. Vui lòng thử lại sau');
                });
        },
        loadCategory() {
            let that = this;
            return axios
                .get(`${this.baseURL}/cms/api/item/test-collection/category`)
                .then((response) => {
                    var responseData = response.data.data;
                    this.category = responseData;
                })
                .catch((error) => {
                    console.error("Error fetching data:", error);
                });
        },
        loadDesign() {
            let that = this;
            return axios
                .get(`${this.baseURL}/cms/api/design/${this.category.design_id}`)
                .then((response) => {
                    if (response.data.success) {
                        this.design = response.data.data;
                    }
                })
                .catch((error) => {
                    console.error("Error fetching data:", error);
                });
        },
        load(){
            let that = this;
            return axios
                .get(`${this.baseURL}/cms/api/item/test-collection/${this.id}`)
                .then((response) => {
                    var responseData = response.data.data;
                    that.form = responseData;
                    that.form.date = that.form.date.substring(0, 10);
                })
                .catch((error) => {
                    console.error("Error fetching data:", error);
                });
        },
    },
    mounted() {
        Promise.all([
            this.loadCategory(),
        ]).then(() => {
            this.loadDesign()
            this.load();
        }).catch((error) => {
        });
    },
}
</script>

<style></style>