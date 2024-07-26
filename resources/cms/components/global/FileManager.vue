<template>
    <div>
        <div class="mt-3 w-full flex-1 rounded-md border-2 border-dashed pt-4 dark:border-darkmode-400 xl:mt-0">
            <div id="file_preview" class="grid grid-cols-10 gap-5 pl-4 pr-5">
                <div v-if="images.length == 0" class="image-fit zoom-in relative col-span-5 h-28 cursor-pointer md:col-span-2">
                    <img class="rounded-md" src="https://www.homeiq.ae/wp-content/uploads/2015/11/default-placeholder-300x300.png">
                </div>
                <div v-else class="image-fit zoom-in relative col-span-5 h-28 cursor-pointer md:col-span-2" v-for="(image, index) in images" :key="index">
                    <img class="rounded-md" :src="image.url">
                    <span data-placement="top" class="tooltip cursor-pointer absolute right-0 top-0 -mr-2 -mt-2 flex h-5 w-5 items-center justify-center rounded-full bg-danger text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="x" class="lucide lucide-x stroke-1.5 h-4 w-4"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg></span>
                </div>
            </div>
            <div id="lfm" data-input="file_path" data-preview="file_preview" @click="openFileManager()" class="relative mt-5 flex cursor-pointer items-center justify-center px-4 pb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="image" class="lucide lucide-image stroke-1.5 mr-2 h-4 w-4"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect><circle cx="9" cy="9" r="2"></circle><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path></svg>
                <span class="mr-1 text-primary"> Upload a file </span>
            </div>
        </div>
        <input type="text" id="file_path">
    </div>
</template>

<script>
export default {
    inject: ['baseURL'],
    props: {
        multiple: Boolean
    },
    data() {
        return{
            images: [],
        }
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
                            that.form.thumbnail = file_path[0];
                        }
                    };
                });
            };
            // Not 
            lfm(`lfm`, 'image', {prefix: `${that.baseURL}/laravel-filemanager`});
        },
    },
    
};
</script>