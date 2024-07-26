<template>
    <div class="input-form" v-if="attrHTML.type != 'repeater'">
        <label :for="attrHTML.name" class="form-label">{{ attrHTML.label }}</label>

        <!-- Input -->
        <input
            v-if="attrHTML.tag === 'input' && attrHTML.type != 'radio' && attrHTML.type != 'checkbox' && attrHTML.type != 'file'"
            v-model="attrHTML.value" :type="attrHTML.type" :name="attrHTML.name" :maxlength="attrHTML.maxlength"
            :required="attrHTML.required" :readonly="attrHTML.readonly" :disabled="attrHTML.disabled"
            :multiple="attrHTML.multiple" class="form-control">

        <!-- File -->
        <div v-else-if="attrHTML.type === 'file'">
            <div class="mt-3 w-full flex-1 rounded-md border-2 border-dashed pt-4 dark:border-darkmode-400 xl:mt-0">
                <div id="file_preview" class="grid grid-cols-10 gap-5 pl-4 pr-5">
                    <div v-if="attrHTML.value == null" @click="openFileManager()"
                        class="image-fit zoom-in relative col-span-5 h-28 cursor-pointer md:col-span-2">
                        <img class="rounded-md"
                            src="https://www.homeiq.ae/wp-content/uploads/2015/11/default-placeholder-300x300.png">
                    </div>
                    <div v-else class="image-fit zoom-in relative col-span-5 h-28 cursor-pointer md:col-span-2"
                        v-for="(image, index) in attrHTML.value" :key="index">
                        <img class="rounded-md" :src="image.url">
                        <span @click="removeImagePreview(index)" data-placement="top"
                            class="tooltip cursor-pointer absolute right-0 top-0 -mr-2 -mt-2 flex h-5 w-5 items-center justify-center rounded-full bg-danger text-white"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" data-lucide="x" class="lucide lucide-x stroke-1.5 h-4 w-4">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg></span>
                    </div>
                </div>
                <div :id="`lfm_${attrHTML.id}`" :data-input="`file_path_${attrHTML.id}`"
                    :data-preview="`file_preview_${attrHTML.id}`" @click="openFileManager()"
                    class="relative mt-5 flex cursor-pointer items-center justify-center px-4 pb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        data-lucide="image" class="lucide lucide-image stroke-1.5 mr-2 h-4 w-4">
                        <rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect>
                        <circle cx="9" cy="9" r="2"></circle>
                        <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path>
                    </svg>
                    <span class="mr-1 text-primary"> Tải hình ảnh </span>
                </div>
            </div>
            <input type="hidden" v-model="attrHTML.value">
        </div>

        <!-- Textarea Field -->
        <textarea v-else-if="attrHTML.tag === 'textarea'" v-model="attrHTML.value" :name="attrHTML.name"
            :maxlength="attrHTML.maxlength" :required="attrHTML.required" :readonly="attrHTML.readonly"
            :disabled="attrHTML.disabled" class="form-control" rows="5"></textarea>

        <!-- Select Field -->
        <select v-else-if="attrHTML.tag === 'select'" v-model="selected" @change="handleSelect()" :name="attrHTML.name"
            :required="attrHTML.required" :disabled="attrHTML.disabled" :multiple="attrHTML.multiple"
            class="form-control">
            <option v-for="option in attrHTML.options" :key="option.id" :value="convertToSnakeCase(option.label)">
                {{ option.label }}</option>
        </select>

        <!-- Radio Buttons -->
        <div v-else-if="attrHTML.type === 'radio'" class="flex items-center">
            <div v-for="radio in attrHTML.options" :key="radio" class="mr-4">
                <input v-model="radioChecked" @change="handleRadio()" type="radio" :id="radio.id" :name="attrHTML.name"
                    :value="convertToSnakeCase(radio.label)" :disabled="attrHTML.disabled"
                    class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&[type='radio']]:checked:bg-primary [&[type='radio']]:checked:border-primary [&[type='radio']]:checked:border-opacity-10 [&[type='checkbox']]:checked:bg-primary [&[type='checkbox']]:checked:border-primary [&[type='checkbox']]:checked:border-opacity-10 [&:disabled:not(:checked)]:bg-slate-100 [&:disabled:not(:checked)]:cursor-not-allowed [&:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&:disabled:checked]:opacity-70 [&:disabled:checked]:cursor-not-allowed [&:disabled:checked]:dark:bg-darkmode-800/50">
                <label :for="radio.id" class="cursor-pointer ml-2">{{ radio.label }}</label>
            </div>
        </div>

        <!-- Checkbox -->
        <div v-else-if="attrHTML.type === 'checkbox'" class="flex items-center">
            <div v-for="checkbox in attrHTML.options" :key="checkbox.id" class="mr-4">
                <input v-model="checkboxChecked" @change="handleCheckbox()" type="checkbox" :id="checkbox.id"
                    :name="attrHTML.name" :value="convertToSnakeCase(checkbox.label)" :disabled="attrHTML.disabled"
                    class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                <label :for="checkbox.id" class="cursor-pointer ml-2">{{ checkbox.label }}</label>
            </div>

        </div>
    </div>

    <div v-else
        class="intro-y box shadow-md col-span-12 p-5 border rounded-md border-slate-200/60 dark:border-darkmode-400">
        <div
            class="flex items-center pb-5 text-base font-medium border-b border-dashed border-slate-200/60 dark:border-darkmode-400">
            {{ attrHTML.label }}
        </div>
        <div class="mt-5">
            <div class="list-size-design">
                <div v-for="(item, index) in attrHTML.data" :key="index" class="intro-y box shadow-md mt-5 p-5 border rounded-md border-slate-200/60 dark:border-darkmode-400">
                    <div 
                        class="flex items-center pb-5 text-base font-medium border-b border-dashed border-slate-200/60 dark:border-darkmode-400">
                        {{ attrHTML.label }} {{ index + 1 }}
                        <svg @click="toggleHidden(index)" :class="{ 'rotate-180': hiddenIndexes.includes(index)}" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-up ml-auto hover:ring-4 rounded-full"><path d="m18 15-6-6-6 6"/></svg>
                        <svg v-if="index > 0" @click="removeFieldRepeater(attrHTML, index)" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x ml-2 hover:ring-4 rounded-full"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                    </div>
                    <div class="mt-5" :class="{ 'hidden': hiddenIndexes.includes(index) }">
                        <div class="flex-wrap gap-4 list-size-design flex">
                            <div :class="field.classSize.class" v-for="field in item" :key="field.id">
                                <FormField :key="field.id" :attrHTML="field"></FormField>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <template v-if="attrHTML.type == 'repeater'">
        <button @click="duplicateRepeater()" class="btn btn-secondary mt-5 hover:ring-4">
            Thêm
        </button>
    </template>
</template>

<script>
export default {
    inject: ['baseURL'],
    emits: ['duplicateRepeater'],
    props: {
        attrHTML: {
            type: Object,
            required: true
        },
    },
    data() {
        return {
            selected: [],
            radioChecked: null,
            checkboxChecked: [],
            hiddenIndexes: [],
        }
    },
    methods: {
        removeFieldRepeater(data, index){
            data.data.splice(index, 1);
        },  
        toggleHidden(index) {
            const idx = this.hiddenIndexes.indexOf(index);
            if (idx === -1) {
                this.hiddenIndexes.push(index); // Nếu chưa có trong mảng, thêm vào
            } else {
                this.hiddenIndexes.splice(idx, 1); // Nếu đã có trong mảng, loại bỏ
            }
        },
        removeTones(str) {
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
        convertToSnakeCase(str) {
            str = this.removeTones(str); // Loại bỏ dấu tiếng Việt
            return str
                .toLowerCase()                // Chuyển đổi tất cả các ký tự thành chữ thường
                .replace(/\s+/g, '_')         // Thay thế tất cả các khoảng trắng bằng dấu gạch dưới
                .replace(/[^a-z0-9_]/g, '');  // Loại bỏ tất cả các ký tự không phải là chữ cái, số, hoặc dấu gạch dưới
        },
        duplicateRepeater() {
            this.$emit('duplicateRepeater', this.attrHTML);
        },
        openFileManager() {
            let that = this;
            var lfm = function (id, type, options) {
                let button = document.getElementById(id);

                button.addEventListener('click', function () {
                    var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
                    var target_preview = document.getElementById(button.getAttribute(`data-preview__${that.attrHTML.id}`));


                    window.open(route_prefix + '?type=' + type || 'file', 'FileManager', 'width=900,height=600');
                    window.SetUrl = function (items) {
                        var file_path = items.map(function (item) {
                            return item.url;
                        }).join(',');

                        if (file_path != '') {
                            file_path = file_path.split(',');
                            that.attrHTML.value = [];
                            if (that.multiple == false) {
                                that.attrHTML.value.push({
                                    url: file_path[0],
                                    title: null,
                                    alt: null,
                                })
                            } else {
                                file_path.forEach(element => {
                                    that.attrHTML.value.push({
                                        url: element,
                                        title: null,
                                        alt: null,
                                    })
                                });
                            }

                        }
                        // set the value of the desired input to image url
                        // // clear previous preview
                        // target_preview.innerHtml = '';

                        // // set or change the preview image src
                        // items.forEach(function (item) {
                        //     let img = document.createElement('img')
                        //     img.setAttribute('style', 'height: 5rem')
                        //     img.setAttribute('src', item.thumb_url)
                        //     target_preview.appendChild(img);
                        // });

                        // trigger change event
                        // target_preview.dispatchEvent(new Event('change'));
                    };
                });
            };
            // Not 
            lfm(`lfm_${that.attrHTML.id}`, 'image', { prefix: `${that.baseURL}/laravel-filemanager` });
        },
        removeImagePreview(index) {
            if (index != -1) {
                this.attrHTML.value.splice(index, 1);
            }
        },
        handleSelect() {
            this.attrHTML.value = this.selected;
        },
        handleRadio() {
            this.attrHTML.value = this.radioChecked;
        },
        handleCheckbox() {
            this.attrHTML.value = this.checkboxChecked;
        }
    },
    watch: {
        // Watcher để theo dõi thay đổi của prop attrHTML
        attrHTML: {
            handler(newVal) {
                // Cập nhật selected khi attrHTML thay đổi
                if (newVal.tag == 'select' && newVal.value != null) {
                    this.selected = newVal.value;
                }
                if (newVal.type == 'radio' && newVal.value != null) {
                    this.radioChecked = newVal.value;
                }
                if (newVal.type == 'checkbox' && newVal.value != null) {
                    this.checkboxChecked = newVal.value;
                }
            },
            immediate: true // Kích hoạt ngay lập tức watcher khi component được tạo
        }
    },
    mounted() {
        if (this.attrHTML.tag == 'select' && this.attrHTML.value != null) {
            this.selected = this.attrHTML.value;
        }
        if (this.attrHTML.type == 'radio' && this.attrHTML.value != null) {
            this.radioChecked = this.attrHTML.value;
        }
        if (this.attrHTML.tag == 'checkbox' && this.attrHTML.value != null) {
            this.checkboxChecked = this.attrHTML.value;
        }
    },

}
</script>
