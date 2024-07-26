<template>
    <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row mt-5">
        <div class="text-2xl font-medium group-[.mode--light]:text-white">{{ formTypeAction }} Design</div>
        <router-link :to="{ name: 'cms.design.index' }" class="btn btn-secondary ml-auto hover:ring-4">Quay
            lại</router-link>
        <!-- <a :href="this.baseURL + '/cms/collection/'" class="btn btn-secondary ml-auto hover:ring-4">Quay lại</a> -->
        <button @click="onSubmit(true)" class="btn btn-secondary ml-2 hover:ring-4">Lưu & Thoát</button>
        <button @click="onSubmit()" class="btn btn-primary ml-2 hover:ring-4">Lưu</button>
    </div>
    <div v-if="!fetchError" class="mt-5 grid grid-cols-12 gap-6">
        <div class="intro-y col-span-12">
            <div class="intro-y box p-5 shadow-md">
                <div class="input-form " :class="{ 'has-error': errors.title }">
                    <label for="title" class="form-label text-base font-medium">
                        Tiêu đề <span class="text-danger">*</span>
                    </label>
                    <input v-model="data.title" type="text" name="title" id="title" class="form-control required" />
                    <div v-if="errors.title" class="mt-2 text-danger">{{ errors.title }}</div>
                </div>

                <div class="mt-10 input-form " :class="{ 'has-error': errors.desc }">
                    <label for="desc" class="form-label text-base font-medium">
                        Mô tả
                        <!-- <span class="text-danger">*</span> -->
                    </label>
                    <textarea v-model="data.desc" name="desc" id="desc" class="form-control required"
                        rows="5"></textarea>
                    <div v-if="errors.desc" class="mt-2 text-danger">{{ errors.desc }}</div>
                </div>
                
                <div class="mt-10 input-form " :class="{ 'has-error': errors.type }">
                    <label for="type" class="form-label text-base font-medium">
                        Loại thiết kế
                        <span class="text-danger">*</span>
                    </label>
                    <select v-model="data.type" name="type" id="type" class="form-control">
                        <option value="module">Module</option>
                        <option value="collection">Collection</option>
                        <!-- <option value="asset">Asset</option> -->
                        <option value="form">Form</option>
                        <!-- <option value="navigation">Navigation</option> -->
                        <!-- <option value="classification">Classification</option> -->
                        <!-- <option value="global">Global</option> -->
                    </select>
                    <div v-if="errors.type" class="mt-2 text-danger">{{ errors.type }}</div>
                </div>

            </div>
            <div class="mt-5 gap-6 grid grid-cols-12">
                <draggable 
                    @change="handleChange" v-model="fields" 
                    :group="{ name: 'shared', pull: false, put: ['fieldDefault', 'fieldCustom'] }" 
                    itemKey="id" 
                    class="intro-y box shadow-md col-span-6 p-5 border rounded-md border-slate-200/60 dark:border-darkmode-400">
                    <template #header>
                        <div class="flex items-center pb-5 text-base font-medium border-b border-dashed border-slate-200/60 dark:border-darkmode-400"> Section 1 </div>
                    </template>
                    <template #item="{ element }">
                        <div v-if="element.type!='repeater'" 
                            :class="[
                                element.classSize && element.classSize.class ? element.classSize.class : 'w-full',
                                { 'field-has-error': errorsField[element.index] }
                            ]" 
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
                            <div @click="editField(element)" type="text" class="form-control rounded-none flex items-center" placeholder="Text">
                                {{ element.label }}
                            </div>
                            <div
                                class="rounded-r flex justify-content-center align-items-center py-2 px-3 bg-slate-100 border shadow-sm border-slate-200 text-slate-600 dark:bg-darkmode-900/20 dark:border-darkmode-900/20 dark:text-slate-400 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r">
                                <div @click="resizeField(element)"
                                    class="mr-4 mt-0.5 bg-white px-3 shadow-lg rounded" title="Resize">
                                    {{ element.classSize && element.classSize.percent ? element.classSize.percent : '100%' }}</div>
                                <div @click="duplicateField(element)" class="mr-4 mt-1.5"
                                    title="Duplicate"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="lucide lucide-copy-check w-4 h-4">
                                        <path d="m12 15 2 2 4-4" />
                                        <rect width="14" height="14" x="8" y="8" rx="2" ry="2" />
                                        <path
                                            d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2" />
                                    </svg></div>
                                <div @click="removeField(element)" class="mt-1.5" title="Remove"><svg
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
                        <div v-else 
                            :class="[
                                element.classSize && element.classSize.class ? element.classSize.class : 'w-full',
                                { 'field-has-error': errorsField[element.index] }
                            ]" 
                            class="flex flex-wrap text-black hover:ring-4 hover:rounded cursor-pointer mb-4 mt-4" >
                            <div class="w-full rounded-t flex justify-content-center align-items-center py-2 px-3 bg-slate-100 border shadow-sm border-slate-200 text-slate-600 dark:bg-darkmode-900/20 dark:border-darkmode-900/20 dark:text-slate-400 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r">
                                <div class="mr-3">
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
                                <div @click="editField(element)"  class="mt-1 font-medium text-black mr-auto ml-3 flex-grow">
                                    {{ element.label }}
                                </div>
                                <div @click="resizeField(element)"
                                    class="mr-4 mt-0.5 bg-white px-3 shadow-lg rounded" title="Resize">
                                    {{ element.classSize && element.classSize.percent ? element.classSize.percent : '100%' }}</div>
                                <div @click="duplicateField(element)" class="mr-4 mt-1.5"
                                    title="Duplicate"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="lucide lucide-copy-check w-4 h-4">
                                        <path d="m12 15 2 2 4-4" />
                                        <rect width="14" height="14" x="8" y="8" rx="2" ry="2" />
                                        <path
                                            d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2" />
                                    </svg></div>
                                <div @click="removeField(element)" class="mt-1.5" title="Remove"><svg
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
                            <draggable @change="handleChangeRepeater($event, element)" v-model="element.data" :group="{ name: 'shared', pull: false, put: ['fieldDefault'] }" itemKey="id" class="px-4 box min-h-20 w-full border border-dashed shadow border-secondary rounded-t-none border-t-0">
                                <template #item="{ element }">
                                    <div :class="element.classSize && element.classSize.class ? element.classSize.class : 'w-full'" class="flex text-black hover:ring-4 hover:rounded cursor-pointer mb-4 mt-4" >
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
                                        <div @click="editField(element)" type="text" class="form-control rounded-none flex items-center" placeholder="Text">
                                            {{ element.label }}
                                        </div>
                                        <div
                                            class="rounded-r flex justify-content-center align-items-center py-2 px-3 bg-slate-100 border shadow-sm border-slate-200 text-slate-600 dark:bg-darkmode-900/20 dark:border-darkmode-900/20 dark:text-slate-400 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r">
                                            <div @click="resizeField(element)"
                                                class="mr-4 mt-0.5 bg-white px-3 shadow-lg rounded" title="Resize">
                                                {{ element.classSize && element.classSize.percent ? element.classSize.percent : '100%' }}</div>
                                            <div @click="duplicateField(element)" class="mr-4 mt-1.5"
                                                title="Duplicate"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="lucide lucide-copy-check w-4 h-4">
                                                    <path d="m12 15 2 2 4-4" />
                                                    <rect width="14" height="14" x="8" y="8" rx="2" ry="2" />
                                                    <path
                                                        d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2" />
                                                </svg></div>
                                            <div @click="removeField(element)" class="mt-1.5" title="Remove"><svg
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
                            </draggable>
                        </div>
                    </template>
                </draggable>
                <div class="intro-y box shadow-md col-span-6 border rounded-md border-slate-200/60 dark:border-darkmode-400">
                    <div class="modal-header p-5">
                        <h2 class="font-medium text-lg mr-auto"> Danh sách trường </h2>
                    </div>
                    <div class="modal-search p-5 border-slate-200\/60 text-slate-500 bg-slate-100"><input
                            type="search" name="searchFields" id="searchFields" class="form-control"
                            placeholder="Tìm kiếm..."></div>
                    <div class="modal-body">
                        <div class="intro-y box shadow-md">
                            <div class="p-5 border rounded-md border-slate-200/60 dark:border-darkmode-400">
                                <div
                                    class="flex items-center pb-5 text-base font-medium border-b border-slate-200/60 dark:border-darkmode-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-chevron-down-icon stroke-1.5 w-4 h-4 mr-2">
                                        <path d="m6 9 6 6 6-6"></path>
                                    </svg> Trường mặc định
                                </div>
                                <div class="mt-5">
                                    <draggable class="grid lg:grid-cols-1 xl:grid-cols-2 2xl:grid-cols-4 gap-4" v-model="fieldDesign.fieldDefault" :group="{ name: 'fieldDefault', pull: 'clone', put: false }" itemKey="id" :sortable="false">
                                        <template #item="{ element }">
                                            <div class="col-span-1 item">
                                                <div class="flex text-black hover:ring-4 hover:rounded cursor-pointer">
                                                    <div class="py-2 px-3 bg-slate-100 border shadow-sm border-slate-200 text-slate-600 rounded rounded-r-none"
                                                        id="input-group-email"> @ </div>
                                                    <div id="input1" type="text" class="form-control rounded-l-none">{{ element.label }}</div>
                                                </div>
                                            </div>
                                        </template>
                                    </draggable>
                                </div>
                            </div>
                        </div>
                        <div class="intro-y box shadow-md mt-5">
                            <div class="p-5 border rounded-md border-slate-200/60 dark:border-darkmode-400">
                                <div
                                    class="flex items-center pb-5 text-base font-medium border-b border-slate-200/60 dark:border-darkmode-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-chevron-down-icon stroke-1.5 w-4 h-4 mr-2">
                                        <path d="m6 9 6 6 6-6"></path>
                                    </svg> Trường nâng cao
                                </div>
                                <div class="mt-5">
                                    <draggable class="grid 2xl:grid-cols-4 xl:grid-cols-2 lg:grid-cols-1 gap-4" v-model="fieldDesign.fieldCustom" :group="{ name: 'fieldCustom', pull: 'clone', put: false }" itemKey="id" :sortable="false">
                                        <template #item="{ element }">
                                            <div class="col-span-1 item">
                                                <div class="flex text-black hover:ring-4 hover:rounded cursor-pointer">
                                                    <div class="py-2 px-3 bg-slate-100 border shadow-sm border-slate-200 text-slate-600 rounded rounded-r-none"
                                                        id="input-group-email"> @ </div>
                                                    <div id="input1" type="text" class="form-control rounded-l-none">{{ element.label }}</div>
                                                </div>
                                            </div>
                                        </template>
                                    </draggable>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="fields-action mt-5 col-span-12">
                    <button @click="showFields()" class="btn btn-secondary shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="mr-2 lucide lucide-plus">
                            <path d="M5 12h14" />
                            <path d="M12 5v14" />
                        </svg>
                        Thêm trường
                    </button>
                </div> -->

            </div>
        </div>
    </div>
    <NotificationSticky ref="notificationSticky" :message="objNotificationSticky.message"
        :type="objNotificationSticky.type"></NotificationSticky>
    <Fields ref="fields" @field="importField" @reField="updateField" :fieldOld="fieldOld" :isEdit="isEdit" @resetOldField="resetOldField"></Fields>
</template>

<script>
import NotificationSticky from '../global/NotificationSticky.vue'
import draggable from 'vuedraggable';
import Fields from '../custom/Fields.vue'
import * as yup from 'yup';
import { reactive } from 'vue';
export default {
    inject: ['baseURL'],
    props: ['id'],
    components: {
        NotificationSticky,
        Fields,
        draggable
    },
    data() {
        return {
            formEdit: false,
            fetchError: false,
            data: {},
            categoryTypes: {},
            objNotificationSticky: {
                type: null,
                message: null,
            },
            errors: {},
            fields: reactive([]),
            fieldOld: {},
            isEdit: false,
            classesSize: {
                'w-full': '100%',
                'w-8/12': '66%',
                'w-6/12': '50%',
                'w-4/12': '33%',
            },
            indexDuplicatte: 1,
            errors: {},
            errorsField: {},
            fieldDesign: {
                fieldDefault: [
                    { type: 'text', label: 'Text' },
                    { type: 'textarea', label: 'Textarea' },
                    { type: 'select', label: 'Select' },
                    { type: 'number', label: 'Number' },
                    { type: 'email', label: 'Email' },
                    { type: 'password', label: 'Password' },
                    { type: 'file', label: 'File' },
                    { type: 'tel', label: 'Tel' },
                    { type: 'checkbox', label: 'Checkbox' },
                    { type: 'radio', label: 'Radio' },
                    { type: 'date', label: 'Date' },
                    { type: 'time', label: 'Time' },
                    { type: 'datetime-local', label: 'Datetime local' },
                    { type: 'color', label: 'Color' },
                    { type: 'search', label: 'Search' },
                ],
                fieldCustom: [
                    { type: 'repeater', label: 'Repeater' }
                ]
            },
        }
    },
    computed: {
        formTypeAction() {
            return this.id !== undefined ? "Chỉnh sửa " : "Tạo ";
        },
    },
    methods: {
        handleSelect(param_type) {
            typeText.value = param_type + " Field";

            type.value = param_type.toLowerCase();
            showSlideOverDetail()
        },
        async validateForm() {
            // Define Yup schema for validation
            const schema = yup.object().shape({
                title: yup.string().required('Tiêu đề không được để trống').max(255, 'Tiêu đề không được quá 255 ký tự'),
                desc: yup.string().nullable(),
                type: yup.string().required('Tiêu đề không được để trống')
            });
            const schemaField = yup.array().of(
                yup.object().shape({
                    name: yup.string().required('Tiêu biến không được để trống').max(255, 'Tên biến không được quá 255 ký tự'),
                    label: yup.string().required('Nhãn hiển thị không được để trống').max(255, 'Nhãn hiển thị không được quá 255 ký tự'),
                    data: yup.array().of(
                        yup.object().shape({
                            name: yup.string().required('Tiêu biến không được để trống').max(255, 'Tên biến không được quá 255 ký tự'),
                            label: yup.string().required('Nhãn hiển thị không được để trống').max(255, 'Nhãn hiển thị không được quá 255 ký tự'),
                        })
                    )
                })
            );
            try {
                // Validate the form data
                await schema.validate(this.data, { abortEarly: false });
                await schemaField.validate(this.fields, { abortEarly: false });
                this.errors = {};
                this.errorsField = {};
                return true;
            } catch (err) {
                // Collect validation errors
                this.errors = {};
                if (err.inner) {
                    err.inner.forEach(error => {
                        if (error.path.startsWith('[')) {
                            this.errorsField[error.path.match(/^\[(\d+)\]\./)[1]] = error.message;
                        }else{
                            this.errors[error.path] = error.message;
                        }
                    });
                }
                console.log(this.errorsField);
                this.notificationSticky("error", "Vui lòng kiểm tra lại form");
                return false;
            }
        },
        async onSubmit(exit) {
            const isValid = await this.validateForm();
            if (isValid) {
                if(this.formEdit){
                    this.update(exit);
                }else{
                    this.store(exit);
                }
            }
        },
        notificationSticky(type, message) {
            this.objNotificationSticky.message = message;
            this.objNotificationSticky.type = type;
            this.$refs.notificationSticky.show();
        },
        handleChange(evt) {
            if (evt.added) {
                var newItem = { ...evt.added.element };
                newItem = this.contructField(newItem);
                this.fields.splice(evt.added.newIndex, 1, newItem);
            }
        },
        handleChangeRepeater(evt, fieldRepeater) {
            if (evt.added) {
                var newItem = { ...evt.added.element };
                newItem = this.contructField(newItem);

                const indexRepeater = this.fields.findIndex(field => field.id === fieldRepeater.id);
                this.fields[indexRepeater].data.splice(evt.added.newIndex, 1, newItem);
            }
        },
        contructField(field) {
            field.id = Math.random().toString(36).substring(2);
            field.tag = '';
            field.name = null;
            field.maxlength = null;
            field.value = null;
            field.required = false;
            field.multiple = false;
            field.options = reactive([{id: Date.now().toString(36), label: null, value: null, selected: null}]);
            field.min = null;
            field.max = null;
            field.readonly = false;
            field.disabled = false;
            field.classSize = {class: 'w-full', percent: '100%'};
            field.data = reactive([]);
            return field;
        },
        contructFieldIdDeep(field) {
            // Update ID of the current field
            field.id = Math.random().toString(36).substring(2);

            // Recursively update IDs of nested data fields if they exist
            if (field.data && Array.isArray(field.data)) {
                field.data.forEach(subField => {
                    this.contructFieldIdDeep(subField);
                });
            }
            return field;
        },
        findFieldDeep(data, fields = this.fields) {
            for (let item of fields) {
                if (item.id === data.id) {
                    return item;
                }
                if (item.data) { 
                    const found = this.findFieldDeep(data, item.data);
                    if (found) {
                        return found;
                    }
                }
            }
            return null;
        },
        findFieldIndexDeep(fields = this.fields, field, parentIndex = []) {
            for (let i = 0; i < fields.length; i++) {
                if (fields[i].id === field.id) {
                    return parentIndex.concat(i); // Trả về mảng các chỉ số để tìm thấy phần tử
                }
                if (fields[i].data) { // Nếu có các fields con
                    const foundIndex = this.findFieldIndexDeep(fields[i].data, field, parentIndex.concat(i));
                    if (foundIndex) {
                        return foundIndex;
                    }
                }
            }
            return null;
        },
        importField(data) {
            this.fields.push(reactive(data));
        },
        updateField(data) {
            let itemToUpdate = this.findFieldDeep(data);
            if (itemToUpdate) {
                Object.assign(itemToUpdate, data);
            }
        },
        resizeField(field) {
            let indexPath = this.findFieldIndexDeep(this.fields, field);
            if (indexPath && indexPath.length > 0) {
                let arrayToModify = this.fields;
                for (let i = 0; i < indexPath.length - 1; i++) {
                    arrayToModify = arrayToModify[indexPath[i]].data;
                }
                let index = indexPath[indexPath.length - 1];

                let targetField = arrayToModify[index];
                const classKeys = Object.keys(this.classesSize);
                const currentClass = targetField.classSize.class;
                const currentIndex = classKeys.indexOf(currentClass);
                const nextIndex = (currentIndex + 1) % classKeys.length;
                const nextClass = classKeys[nextIndex];

                targetField.classSize.class = nextClass;
                targetField.classSize.percent = this.classesSize[nextClass];
            }
        },
        duplicateField(field) {
            let indexPath = this.findFieldIndexDeep(this.fields, field);

            if (indexPath && indexPath.length > 0) {
                let arrayToModify = this.fields;
                for (let i = 0; i < indexPath.length - 1; i++) {
                    arrayToModify = arrayToModify[indexPath[i]].data;
                }
                let index = indexPath[indexPath.length - 1];
                
                let newItem = JSON.parse(JSON.stringify(arrayToModify[index])); // Deep copy
                newItem = this.contructFieldIdDeep(newItem); // Update IDs recursively

                newItem.label = newItem.label + " " + this.indexDuplicatte;
                if (newItem.name) {
                    newItem.name = newItem.name + "_" + this.indexDuplicatte;
                }
                arrayToModify.splice(index + 1, 0, newItem);
                this.indexDuplicatte++;
            }
            console.log(this.fields);
            return;
        },
        removeField(field) {
            let indexPath = this.findFieldIndexDeep(this.fields, field);
            if (indexPath && indexPath.length > 0) {
                let arrayToModify = this.fields;
                for (let i = 0; i < indexPath.length - 1; i++) {
                    arrayToModify = arrayToModify[indexPath[i]].data;
                }
                let index = indexPath[indexPath.length - 1];

                arrayToModify.splice(index, 1);
            }
        },
        showFields() {
            this.isEdit = false;
            this.$refs.fields.show();
        },
        editField(data) {
            this.isEdit = true;
            this.fieldOld = data;
            this.$refs.fields.show();
        },
        resetOldField() {
            this.fieldOld = null;
        },
        exit() {
            let that = this;
            setTimeout(function () {
                // window.location.href = `${this.baseURL}`
                that.$router.push({ name: "cms.design.index" });
            }, 2000);
        },
        store(exit) {
            let that = this;
            let data = {
                title: this.data.title,
                desc: this.data.desc,
                type: this.data.type,
                data: this.fields,
            }
            axios
                .post(`${this.baseURL}/cms/api/design/`, data)
                .then((response) => {
                    console.log('Response from server:', response.data);
                    if (response.data.success == true) {
                        this.notificationSticky('success', response.data.message);
                        if (exit) {
                            this.exit();
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
        update(exit) {
            let that = this;
            let data = {
                title: this.data.title,
                desc: this.data.desc,
                type: this.data.type,
                data: this.fields,
            }
            console.log(data);
            axios
                .put(`${this.baseURL}/cms/api/design/${this.id}`, data)
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
        loadCategoryType() {
            let that = this;
            axios
                .get(`${this.baseURL}/cms/api/category-type`)
                .then((response) => {
                    var responseData = response.data.data;
                    this.categoryTypes = responseData;
                })
                .catch((error) => {
                    console.error("Error fetching data:", error);
                });
        },
        load() {
            let that = this;
            axios
                .get(`${this.baseURL}/cms/api/design/${this.id}`)
                .then((response) => {
                    var responseData = response.data.data;
                    that.data.title = responseData.title;
                    that.data.desc = responseData.desc;
                    that.data.type = responseData.type;
                    that.fields = responseData.data;
                })
                .catch((error) => {
                    console.error("Error fetching data:", error);
                });
        },
    },
    created() {
        if(this.id !== undefined){
            this.formEdit = true;
            this.load();
        }
    },
    watch: {
        fields(newValue, oldValue) {
            newValue.forEach((element, index) => {
                element.index = index;
            });
            // console.log(this.fields);
        },
    }
}
</script>

<style>
    .field-has-error{
        --tw-border-opacity: 1;
        border: 1px solid rgb(var(--color-danger) / var(--tw-border-opacity));
        border-radius: 0.25rem;
    }
</style>