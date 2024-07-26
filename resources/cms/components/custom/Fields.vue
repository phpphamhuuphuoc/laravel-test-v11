<template>
    <!-- <SlideOverMain ref="slideOverMain">


        <template #header>
            <button @click="hideSlideOverMain()" class="mr-2 rounded-full p-2 hover:ring-4"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg></button>
            <h2 class="font-medium text-lg mr-auto">
                Danh sách trường
            </h2>
        </template>
        <template #search>
            <div class="modal-search p-5 border-slate-200\/60 text-slate-500 bg-slate-100">
                <input type="search" name="searchFields" id="searchFields" class="form-control"
                    placeholder="Tìm kiếm...">
            </div>
        </template>
        <template #body>
            <div class="intro-y box shadow-md">
                <div class="p-5 border rounded-md border-slate-200/60 dark:border-darkmode-400">
                    <div
                        class="flex items-center pb-5 text-base font-medium border-b border-slate-200/60 dark:border-darkmode-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-chevron-down-icon stroke-1.5 w-4 h-4 mr-2">
                            <path d="m6 9 6 6 6-6"></path>
                        </svg> Trường mặc định
                    </div>
                    <div class="mt-5">
                        <div class="grid grid-cols-4 gap-4">
                            <div class="col-span-1" @click="handleSelect('Text')">
                                <div class="flex text-black hover:ring-4 hover:rounded cursor-pointer">
                                    <div class="py-2 px-3 bg-slate-100 border shadow-sm border-slate-200 text-slate-600  rounded rounded-r-none" id="input-group-email"> @ </div>
                                    <div id="input1" type="text" class="form-control rounded-l-none" placeholder="Text">Text</div>
                                </div>
                            </div>
                            <div class="col-span-1" @click="handleSelect('Textarea')">
                                <div class="flex text-black hover:ring-4 hover:rounded">
                                    <div class="py-2 px-3 bg-slate-100 border shadow-sm border-slate-200 text-slate-600  rounded rounded-r-none" id="input-group-email"> @ </div>
                                    <div id="input1" type="text" class="form-control rounded-l-none" placeholder="Text">Textarea</div>
                                </div>
                            </div>
                            <div class="col-span-1" @click="handleSelect('Select')">
                                <div class="flex text-black hover:ring-4 hover:rounded">
                                    <div class="py-2 px-3 bg-slate-100 border shadow-sm border-slate-200 text-slate-600  rounded rounded-r-none" id="input-group-email"> @ </div>
                                    <div id="input1" type="text" class="form-control rounded-l-none" placeholder="Text">Select</div>
                                </div>
                            </div>
                            <div class="col-span-1" @click="handleSelect('Number')">
                                <div class="flex text-black hover:ring-4 hover:rounded">
                                    <div class="py-2 px-3 bg-slate-100 border shadow-sm border-slate-200 text-slate-600  rounded rounded-r-none" id="input-group-email"> @ </div>
                                    <div id="input1" type="text" class="form-control rounded-l-none" placeholder="Text">Number</div>
                                </div>
                            </div>




                            <div class="col-span-1" @click="handleSelect('Email')">
                                <div class="flex text-black hover:ring-4 hover:rounded">
                                    <div class="py-2 px-3 bg-slate-100 border shadow-sm border-slate-200 text-slate-600  rounded rounded-r-none" id="input-group-email"> @ </div>
                                    <div id="input1" type="text" class="form-control rounded-l-none" placeholder="Text">Email</div>
                                </div>
                            </div>
                            <div class="col-span-1" @click="handleSelect('Password')">
                                <div class="flex text-black hover:ring-4 hover:rounded">
                                    <div class="py-2 px-3 bg-slate-100 border shadow-sm border-slate-200 text-slate-600  rounded rounded-r-none" id="input-group-email"> @ </div>
                                    <div id="input1" type="text" class="form-control rounded-l-none" placeholder="Text">Password</div>
                                </div>
                            </div>
                            <div class="col-span-1" @click="handleSelect('File')">
                                <div class="flex text-black hover:ring-4 hover:rounded">
                                    <div class="py-2 px-3 bg-slate-100 border shadow-sm border-slate-200 text-slate-600  rounded rounded-r-none" id="input-group-email"> @ </div>
                                    <div id="input1" type="text" class="form-control rounded-l-none" placeholder="Text">File</div>
                                </div>
                            </div>
                            <div class="col-span-1" @click="handleSelect('Tel')">
                                <div class="flex text-black hover:ring-4 hover:rounded">
                                    <div class="py-2 px-3 bg-slate-100 border shadow-sm border-slate-200 text-slate-600  rounded rounded-r-none" id="input-group-email"> @ </div>
                                    <div id="input1" type="text" class="form-control rounded-l-none" placeholder="Text">Tel</div>
                                </div>
                            </div>

                            <div class="col-span-1" @click="handleSelect('Checkbox')">
                                <div class="flex text-black hover:ring-4 hover:rounded">
                                    <div class="py-2 px-3 bg-slate-100 border shadow-sm border-slate-200 text-slate-600  rounded rounded-r-none" id="input-group-email"> @ </div>
                                    <div id="input1" type="text" class="form-control rounded-l-none" placeholder="Text">Checkbox</div>
                                </div>
                            </div>
                            <div class="col-span-1" @click="handleSelect('Radio')">
                                <div class="flex text-black hover:ring-4 hover:rounded">
                                    <div class="py-2 px-3 bg-slate-100 border shadow-sm border-slate-200 text-slate-600  rounded rounded-r-none" id="input-group-email"> @ </div>
                                    <div id="input1" type="text" class="form-control rounded-l-none" placeholder="Text">Radio</div>
                                </div>
                            </div>

                            <div class="col-span-1" @click="handleSelect('Date')">
                                <div class="flex text-black hover:ring-4 hover:rounded">
                                    <div class="py-2 px-3 bg-slate-100 border shadow-sm border-slate-200 text-slate-600  rounded rounded-r-none" id="input-group-email"> @ </div>
                                    <div id="input1" type="text" class="form-control rounded-l-none" placeholder="Text">Date</div>
                                </div>
                            </div>
                            <div class="col-span-1" @click="handleSelect('Time')">
                                <div class="flex text-black hover:ring-4 hover:rounded">
                                    <div class="py-2 px-3 bg-slate-100 border shadow-sm border-slate-200 text-slate-600  rounded rounded-r-none" id="input-group-email"> @ </div>
                                    <div id="input1" type="text" class="form-control rounded-l-none" placeholder="Text">Time</div>
                                </div>
                            </div>
                            <div class="col-span-1" @click="handleSelect('Datetime-local')">
                                <div class="flex text-black hover:ring-4 hover:rounded">
                                    <div class="py-2 px-3 bg-slate-100 border shadow-sm border-slate-200 text-slate-600  rounded rounded-r-none" id="input-group-email"> @ </div>
                                    <div id="input1" type="text" class="form-control rounded-l-none" placeholder="Text">Datetime local</div>
                                </div>
                            </div>
                            <div class="col-span-1" @click="handleSelect('Color')">
                                <div class="flex text-black hover:ring-4 hover:rounded">
                                    <div class="py-2 px-3 bg-slate-100 border shadow-sm border-slate-200 text-slate-600  rounded rounded-r-none" id="input-group-email"> @ </div>
                                    <div id="input1" type="text" class="form-control rounded-l-none" placeholder="Text">Color</div>
                                </div>
                            </div>

                            <div class="col-span-1" @click="handleSelect('Search')">
                                <div class="flex text-black hover:ring-4 hover:rounded">
                                    <div class="py-2 px-3 bg-slate-100 border shadow-sm border-slate-200 text-slate-600  rounded rounded-r-none" id="input-group-email"> @ </div>
                                    <div id="input1" type="text" class="form-control rounded-l-none" placeholder="Text">Search</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="intro-y box shadow-md mt-5" v-if="!props.isFieldLV2">
                <div class="p-5 border rounded-md border-slate-200/60 dark:border-darkmode-400">
                    <div
                        class="flex items-center pb-5 text-base font-medium border-b border-slate-200/60 dark:border-darkmode-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-chevron-down-icon stroke-1.5 w-4 h-4 mr-2">
                            <path d="m6 9 6 6 6-6"></path>
                        </svg> Trường nâng cao
                    </div>
                    <div class="mt-5">
                        <div class="grid grid-cols-4 gap-4">
                            <div class="col-span-1" @click="handleSelect('Repeater')">
                                <div class="flex text-black hover:ring-4 hover:rounded cursor-pointer">
                                    <div class="py-2 px-3 bg-slate-100 border shadow-sm border-slate-200 text-slate-600  rounded rounded-r-none" id="input-group-email"> @ </div>
                                    <div id="input1" type="text" class="form-control rounded-l-none" placeholder="Text">Repeater</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </SlideOverMain> -->

    <SlideOverDetail ref="slideOverDetail">
        <template #header>
            <h2 class="font-medium text-lg mr-auto">
                {{ typeText }}
            </h2>
            <button @click="hideSlideOverDetail()" class="mr-2 hover:ring-4 btn btn-secondary">Huỷ</button>
            <button @click="onSubmit()" class="hover:ring-4 btn btn-primary">Lưu</button>
        </template>
        <template #search>
            <div></div>
        </template>
        <template #body>
            <!-- Default -->
            <div class="intro-y box shadow-md">
                <div class="p-5 border rounded-md border-slate-200/60 dark:border-darkmode-400">
                    <div
                        class="flex items-center pb-5 text-base font-medium border-b border-slate-200/60 dark:border-darkmode-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-chevron-down-icon stroke-1.5 w-4 h-4 mr-2">
                            <path d="m6 9 6 6 6-6"></path>
                        </svg> Thiết lập mặc định
                    </div>
                    <div class="mt-5">
                        <div class="block sm:flex group form-inline mt-5 flex-col items-start pt-5 first:mt-0 first:pt-0 xl:flex-row">
                            <label class="flex-shrink-0 basis-4/12 inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right sm:!mr-10">
                                <div class="text-left">
                                    <div class="flex items-center font-medium">
                                        Nhãn hiển thị
                                        <div class="ml-2 rounded-md bg-slate-200 px-2 py-0.5 text-xs text-slate-600 dark:bg-darkmode-300 dark:text-slate-400">
                                            Bắt buộc
                                        </div>
                                    </div>
                                    <div class="mt-2 text-xs leading-relaxed text-slate-500">
                                        Nhãn của trường được hiển thị ở giao diện admin
                                        
                                    </div>
                                </div>
                            </label>
                            <div class="basis-8/12 mt-3 w-full flex-1 xl:mt-0 xl:text-right">
                                <div class="flex text-black input-form" :class="{ 'has-error': errors.label }">
                                    <input type="text" class="form-control" v-model="form.label" :placeholder="errors.label">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="block sm:flex group form-inline mt-5 flex-col items-start pt-5 first:mt-0 first:pt-0 xl:flex-row align-items-center">
                            <label class="flex-shrink-0 basis-4/12 inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right sm:!mr-10">
                                <div class="text-left">
                                    <div class="flex items-center font-medium">
                                        Tên biến
                                        <div class="ml-2 rounded-md bg-slate-200 px-2 py-0.5 text-xs text-slate-600 dark:bg-darkmode-300 dark:text-slate-400">
                                            Bắt buộc
                                        </div>
                                    </div>
                                    <div class="mt-2 text-xs leading-relaxed text-slate-500">
                                        Tên biến của trường
                                    </div>
                                </div>
                            </label>
                            <div class="basis-8/12 mt-3 w-full flex-1 xl:mt-0 xl:text-right">
                                <div class="flex text-black input-form" :class="{ 'has-error': errors.name }">
                                    <input type="text" class="form-control" v-model="form.name" :placeholder="errors.name">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Custom Main -->
            <div class="intro-y box shadow-md mt-5" v-if="type != 'repeater' && type != 'select' && type != 'file' && type != 'date' && type != 'time' && type != 'datetime-local' && type != 'number' && type != 'radio' && type != 'checkbox'">
                <div class="p-5 border rounded-md border-slate-200/60 dark:border-darkmode-400">
                    <div
                        class="flex items-center pb-5 text-base font-medium border-b border-slate-200/60 dark:border-darkmode-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-chevron-down-icon stroke-1.5 w-4 h-4 mr-2 w-4 h-4 mr-2">
                            <path d="m6 9 6 6 6-6"></path>
                        </svg> Thiết lập nâng cao
                    </div>
                    <div class="mt-5">
                        <div class="block sm:flex group form-inline mt-5 flex-col items-start pt-5 first:mt-0 first:pt-0 xl:flex-row align-items-center">
                            <label class="flex-shrink-0 basis-4/12 inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right sm:!mr-10">
                                <div class="text-left">
                                    <div class="flex items-center font-medium">
                                        Giới hạn ký tự
                                    </div>
                                    <div class="mt-2 text-xs leading-relaxed text-slate-500">
                                        Đặt số lượng ký tự có thể nhập tối đa
                                    </div>
                                </div>
                            </label>
                            <div class="basis-8/12 mt-3 w-full flex-1 xl:mt-0 xl:text-right">
                                <div class="flex text-black input-form" :class="{ 'has-error': errors.maxlength }">
                                    <input type="number" class="form-control" min="1" v-model="form.maxlength" :placeholder="errors.maxlength">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="mt-5">
                        <div class="block sm:flex group form-inline mt-5 flex-col items-start pt-5 first:mt-0 first:pt-0 xl:flex-row align-items-center">
                            <label class="flex-shrink-0 basis-4/12 inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right sm:!mr-10">
                                <div class="text-left">
                                    <div class="flex items-center font-medium">
                                        Bắt buộc nhập
                                    </div>
                                    <div class="mt-2 text-xs leading-relaxed text-slate-500">
                                        Bắt buộc trường phải nhập giá trị
                                    </div>
                                </div>
                            </label>
                            <div class="basis-8/12 mt-3 w-full flex-1 xl:mt-0 xl:text-right">
                                <div class="flex text-black">
                                    <input v-model="form.required" type="checkbox" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;[type='radio']]:checked:bg-primary [&amp;[type='radio']]:checked:border-primary [&amp;[type='radio']]:checked:border-opacity-10 [&amp;[type='checkbox']]:checked:bg-primary [&amp;[type='checkbox']]:checked:border-primary [&amp;[type='checkbox']]:checked:border-opacity-10 [&amp;:disabled:not(:checked)]:bg-slate-100 [&amp;:disabled:not(:checked)]:cursor-not-allowed [&amp;:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&amp;:disabled:checked]:opacity-70 [&amp;:disabled:checked]:cursor-not-allowed [&amp;:disabled:checked]:dark:bg-darkmode-800/50 w-[38px] h-[24px] p-px rounded-full relative before:w-[20px] before:h-[20px] before:shadow-[1px_1px_3px_rgba(0,0,0,0.25)] before:transition-[margin-left] before:duration-200 before:ease-in-out before:absolute before:inset-y-0 before:my-auto before:rounded-full before:dark:bg-darkmode-600 checked:bg-primary checked:border-primary checked:bg-none before:checked:ml-[14px] before:checked:bg-white">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="block sm:flex group form-inline mt-5 flex-col items-start pt-5 first:mt-0 first:pt-0 xl:flex-row align-items-center">
                            <label class="flex-shrink-0 basis-4/12 inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right sm:!mr-10">
                                <div class="text-left">
                                    <div class="flex items-center font-medium">
                                        Giá trị mặc định
                                    </div>
                                    <div class="mt-2 text-xs leading-relaxed text-slate-500">
                                        Giá trị mặc định của trường
                                    </div>
                                </div>
                            </label>
                            <div class="basis-8/12 mt-3 w-full flex-1 xl:mt-0 xl:text-right">
                                <div class="flex text-black">
                                    <input type="text" class="form-control" v-model="form.value">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Custom Repeater -->
            <div class="intro-y box shadow-md mt-5" v-if="type == 'repeater'">
                <div class="p-5 border rounded-md border-slate-200/60 dark:border-darkmode-400">
                    <div
                        class="flex items-center pb-5 text-base font-medium border-b border-slate-200/60 dark:border-darkmode-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-chevron-down-icon stroke-1.5 w-4 h-4 mr-2 w-4 h-4 mr-2">
                            <path d="m6 9 6 6 6-6"></path>
                        </svg> Thiết lập nâng cao
                    </div>
                </div>
            </div>
            <!-- Custom Date,Time,Datetime-local,Number -->
            <div class="intro-y box shadow-md mt-5" v-if="type == 'select' || type == 'file' || type == 'date' || type == 'time' || type == 'datetime-local' || type == 'number' || type == 'radio' || type == 'checkbox'">
                <div class="p-5 border rounded-md border-slate-200/60 dark:border-darkmode-400">
                    <div
                        class="flex items-center pb-5 text-base font-medium border-b border-slate-200/60 dark:border-darkmode-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-chevron-down-icon stroke-1.5 w-4 h-4 mr-2 w-4 h-4 mr-2">
                            <path d="m6 9 6 6 6-6"></path>
                        </svg> Thiết lập nâng cao
                    </div>
                    <div class="mt-5" v-if="type != 'number' && type != 'select' && type != 'date' && type != 'time' && type != 'datetime-local' && type != 'month' && type != 'week' &&  type != 'color' &&  type != 'file' &&  type != 'checkbox' &&  type != 'radio'">
                        <div class="block sm:flex group form-inline mt-5 flex-col items-start pt-5 first:mt-0 first:pt-0 xl:flex-row align-items-center">
                            <label class="flex-shrink-0 basis-4/12 inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right sm:!mr-10">
                                <div class="text-left">
                                    <div class="flex items-center font-medium">
                                        Giới hạn ký tự
                                    </div>
                                    <div class="mt-2 text-xs leading-relaxed text-slate-500">
                                        Đặt số lượng ký tự có thể nhập tối đa
                                    </div>
                                </div>
                            </label>
                            <div class="basis-8/12 mt-3 w-full flex-1 xl:mt-0 xl:text-right">
                                <div class="flex text-black input-form" :class="{ 'has-error': errors.maxlength }">
                                    <input type="number" class="form-control" min="1" v-model="form.maxlength" :placeholder="errors.maxlength">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="mt-5">
                        <div class="block sm:flex group form-inline mt-5 flex-col items-start pt-5 first:mt-0 first:pt-0 xl:flex-row align-items-center">
                            <label class="flex-shrink-0 basis-4/12 inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right sm:!mr-10">
                                <div class="text-left">
                                    <div class="flex items-center font-medium">
                                        Bắt buộc nhập
                                    </div>
                                    <div class="mt-2 text-xs leading-relaxed text-slate-500">
                                        Bắt buộc trường phải nhập giá trị
                                    </div>
                                </div>
                            </label>
                            <div class="basis-8/12 mt-3 w-full flex-1 xl:mt-0 xl:text-right">
                                <div class="flex text-black">
                                    <input v-model="form.required" type="checkbox" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;[type='radio']]:checked:bg-primary [&amp;[type='radio']]:checked:border-primary [&amp;[type='radio']]:checked:border-opacity-10 [&amp;[type='checkbox']]:checked:bg-primary [&amp;[type='checkbox']]:checked:border-primary [&amp;[type='checkbox']]:checked:border-opacity-10 [&amp;:disabled:not(:checked)]:bg-slate-100 [&amp;:disabled:not(:checked)]:cursor-not-allowed [&amp;:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&amp;:disabled:checked]:opacity-70 [&amp;:disabled:checked]:cursor-not-allowed [&amp;:disabled:checked]:dark:bg-darkmode-800/50 w-[38px] h-[24px] p-px rounded-full relative before:w-[20px] before:h-[20px] before:shadow-[1px_1px_3px_rgba(0,0,0,0.25)] before:transition-[margin-left] before:duration-200 before:ease-in-out before:absolute before:inset-y-0 before:my-auto before:rounded-full before:dark:bg-darkmode-600 checked:bg-primary checked:border-primary checked:bg-none before:checked:ml-[14px] before:checked:bg-white">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="block sm:flex group form-inline mt-5 flex-col items-start pt-5 first:mt-0 first:pt-0 xl:flex-row align-items-center">
                            <label class="flex-shrink-0 basis-4/12 inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right sm:!mr-10">
                                <div class="text-left">
                                    <div class="flex items-center font-medium">
                                        Giá trị mặc định
                                    </div>
                                    <div class="mt-2 text-xs leading-relaxed text-slate-500">
                                        Giá trị mặc định của trường
                                    </div>
                                </div>
                            </label>
                            <div class="basis-8/12 mt-3 w-full flex-1 xl:mt-0 xl:text-right">
                                <div class="flex text-black">
                                    <input type="text" class="form-control" v-model="form.value">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Select -->
                    <div class="mt-5" v-if="type == 'select'">
                        <div class="block sm:flex group mt-5 flex-col items-start pt-5 first:mt-0 first:pt-0 xl:flex-row align-items-center">
                            <label class="flex-shrink-0 basis-4/12 inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right sm:!mr-10">
                                <div class="text-left">
                                    <div class="flex items-center font-medium">
                                        Options
                                    </div>
                                    <div class="mt-2 text-xs leading-relaxed text-slate-500">
                                        Các lựa chọn trong danh sách
                                    </div>
                                </div>
                            </label>
                            <div class="basis-8/12 mt-3 w-full flex-1 xl:mt-0 xl:text-right">
                                <div class="flex flex-wrap gap-4 text-black" id="options">
                                    <input placeholder="" type="text" class="flex-1 basis-3/12 form-control" v-for="(item, index) in form.options" :key="item.id" v-model="form.options[index].label">
                                    <button class="btn btn-secondary" @click="addOption()">Thêm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Checkbox -->
                    <div class="mt-5" v-if="type == 'checkbox'">
                        <div class="block sm:flex group mt-5 flex-col items-start pt-5 first:mt-0 first:pt-0 xl:flex-row align-items-center">
                            <label class="flex-shrink-0 basis-4/12 inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right sm:!mr-10">
                                <div class="text-left">
                                    <div class="flex items-center font-medium">
                                        Options
                                    </div>
                                    <div class="mt-2 text-xs leading-relaxed text-slate-500">
                                        Các tuỳ chọn trong checkbox/radio
                                    </div>
                                </div>
                            </label>
                            <div class="basis-8/12 mt-3 w-full flex-1 xl:mt-0 xl:text-right">
                                <div class="flex flex-wrap gap-4 text-black" id="checkboxes">
                                    <input type="text" class="flex-1 basis-3/12 form-control" v-for="(item, index) in form.options" :key="item.id" v-model="form.options[index].label">
                                    <button class="btn btn-secondary" @click="addCheckbox()">Thêm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Radio -->
                    <div class="mt-5" v-if="type == 'radio'">
                        <div class="block sm:flex group mt-5 flex-col items-start pt-5 first:mt-0 first:pt-0 xl:flex-row align-items-center">
                            <label class="flex-shrink-0 basis-4/12 inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right sm:!mr-10">
                                <div class="text-left">
                                    <div class="flex items-center font-medium">
                                        Options
                                    </div>
                                    <div class="mt-2 text-xs leading-relaxed text-slate-500">
                                        Các tuỳ chọn trong checkbox/radio
                                    </div>
                                </div>
                            </label>
                            <div class="basis-8/12 mt-3 w-full flex-1 xl:mt-0 xl:text-right">
                                <div class="flex flex-wrap gap-4 text-black" id="radios">
                                    <input type="text" class="flex-1 basis-3/12 form-control" v-for="(item, index) in form.options" :key="item.id" v-model="form.options[index].label">
                                    <button class="btn btn-secondary" @click="addRadio()">Thêm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- File,Select -->
                    <div class="mt-5" v-if="type == 'select' || type == 'file'">
                        <div class="block sm:flex group form-inline mt-5 flex-col items-start pt-5 first:mt-0 first:pt-0 xl:flex-row">
                            <label class="flex-shrink-0 basis-4/12 inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right sm:!mr-10">
                                <div class="text-left">
                                    <div class="flex items-center font-medium">
                                        Multiple
                                    </div>
                                    <div class="mt-2 text-xs leading-relaxed text-slate-500">
                                        Cho phép chọn nhiều tệp trong trường
                                    </div>
                                </div>
                            </label>
                            <div class="basis-8/12 mt-3 w-full flex-1 xl:mt-0 xl:text-right">
                                <div class="flex text-black input-form" :class="{ 'has-error': errors.multiple }">
                                    <input v-model="form.multiple" type="checkbox" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;[type='radio']]:checked:bg-primary [&amp;[type='radio']]:checked:border-primary [&amp;[type='radio']]:checked:border-opacity-10 [&amp;[type='checkbox']]:checked:bg-primary [&amp;[type='checkbox']]:checked:border-primary [&amp;[type='checkbox']]:checked:border-opacity-10 [&amp;:disabled:not(:checked)]:bg-slate-100 [&amp;:disabled:not(:checked)]:cursor-not-allowed [&amp;:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&amp;:disabled:checked]:opacity-70 [&amp;:disabled:checked]:cursor-not-allowed [&amp;:disabled:checked]:dark:bg-darkmode-800/50 w-[38px] h-[24px] p-px rounded-full relative before:w-[20px] before:h-[20px] before:shadow-[1px_1px_3px_rgba(0,0,0,0.25)] before:transition-[margin-left] before:duration-200 before:ease-in-out before:absolute before:inset-y-0 before:my-auto before:rounded-full before:dark:bg-darkmode-600 checked:bg-primary checked:border-primary checked:bg-none before:checked:ml-[14px] before:checked:bg-white">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Date,Time,Datetime-local,Number -->
                    <div class="mt-5" v-if="type == 'date' || type == 'time' || type == 'datetime-local' || type == 'number'">
                        <div class="block sm:flex group form-inline mt-5 flex-col items-start pt-5 first:mt-0 first:pt-0 xl:flex-row">
                            <label class="flex-shrink-0 basis-4/12 inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right sm:!mr-10">
                                <div class="text-left">
                                    <div class="flex items-center font-medium">
                                        Min
                                    </div>
                                    <div class="mt-2 text-xs leading-relaxed text-slate-500">
                                        Giá trị tối thiểu được phép
                                    </div>
                                </div>
                            </label>
                            <div class="basis-8/12 mt-3 w-full flex-1 xl:mt-0 xl:text-right">
                                <div class="flex text-black input-form" :class="{ 'has-error': errors.min }">
                                    <input v-model="form.max" type="number" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Date,Time,Datetime-local,Number -->
                    <div class="mt-5" v-if="type == 'date' || type == 'time' || type == 'datetime-local' || type == 'number'">
                        <div class="block sm:flex group form-inline mt-5 flex-col items-start pt-5 first:mt-0 first:pt-0 xl:flex-row">
                            <label class="flex-shrink-0 basis-4/12 inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right sm:!mr-10">
                                <div class="text-left">
                                    <div class="flex items-center font-medium">
                                        Max
                                    </div>
                                    <div class="mt-2 text-xs leading-relaxed text-slate-500">
                                        Giá trị tối đa được phép
                                    </div>
                                </div>
                            </label>
                            <div class="basis-8/12 mt-3 w-full flex-1 xl:mt-0 xl:text-right">
                                <div class="flex text-black input-form" :class="{ 'has-error': errors.max }">
                                    <input v-model="form.max" type="number" class="form-control">
                                    <!-- <input type="text" class="form-control"  > -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Additional -->
            <div class="intro-y box shadow-md mt-5" v-if="type!=='repeater'">
                <div class="p-5 border rounded-md border-slate-200/60 dark:border-darkmode-400">
                    <div
                        class="flex items-center pb-5 text-base font-medium border-b border-slate-200/60 dark:border-darkmode-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-chevron-down-icon stroke-1.5 w-4 h-4 mr-2 w-4 h-4 mr-2">
                            <path d="m6 9 6 6 6-6"></path>
                        </svg> Thiết lập bổ sung
                    </div>
                    <!-- Readonly -->
                    <div class="mt-5">
                        <div class="block sm:flex group form-inline mt-5 flex-col items-start pt-5 first:mt-0 first:pt-0 xl:flex-row align-items-center">
                            <label class="flex-shrink-0 basis-4/12 inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right sm:!mr-10">
                                <div class="text-left">
                                    <div class="flex items-center font-medium">
                                        Trường chỉ đọc
                                    </div>
                                    <div class="mt-2 text-xs leading-relaxed text-slate-500">
                                        Người dùng không thể thay đổi giá trị
                                    </div>
                                </div>
                            </label>
                            <div class="basis-8/12 mt-3 w-full flex-1 xl:mt-0 xl:text-right">
                                <div class="flex text-black input-form" :class="{ 'has-error': errors.readonly }">
                                    <input v-model="form.readonly" type="checkbox" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;[type='radio']]:checked:bg-primary [&amp;[type='radio']]:checked:border-primary [&amp;[type='radio']]:checked:border-opacity-10 [&amp;[type='checkbox']]:checked:bg-primary [&amp;[type='checkbox']]:checked:border-primary [&amp;[type='checkbox']]:checked:border-opacity-10 [&amp;:disabled:not(:checked)]:bg-slate-100 [&amp;:disabled:not(:checked)]:cursor-not-allowed [&amp;:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&amp;:disabled:checked]:opacity-70 [&amp;:disabled:checked]:cursor-not-allowed [&amp;:disabled:checked]:dark:bg-darkmode-800/50 w-[38px] h-[24px] p-px rounded-full relative before:w-[20px] before:h-[20px] before:shadow-[1px_1px_3px_rgba(0,0,0,0.25)] before:transition-[margin-left] before:duration-200 before:ease-in-out before:absolute before:inset-y-0 before:my-auto before:rounded-full before:dark:bg-darkmode-600 checked:bg-primary checked:border-primary checked:bg-none before:checked:ml-[14px] before:checked:bg-white">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Disabled -->
                    <div class="mt-5">
                        <div class="block sm:flex group form-inline mt-5 flex-col items-start pt-5 first:mt-0 first:pt-0 xl:flex-row align-items-center">
                            <label class="flex-shrink-0 basis-4/12 inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right sm:!mr-10">
                                <div class="text-left">
                                    <div class="flex items-center font-medium">
                                        Vô hiệu hoá trường
                                    </div>
                                    <div class="mt-2 text-xs leading-relaxed text-slate-500">
                                        Người dùng không thể tương tác
                                    </div>
                                </div>
                            </label>
                            <div class="basis-8/12 mt-3 w-full flex-1 xl:mt-0 xl:text-right">
                                <div class="flex text-black input-form" :class="{ 'has-error': errors.disabled }">
                                    <input v-model="form.disabled" type="checkbox" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;[type='radio']]:checked:bg-primary [&amp;[type='radio']]:checked:border-primary [&amp;[type='radio']]:checked:border-opacity-10 [&amp;[type='checkbox']]:checked:bg-primary [&amp;[type='checkbox']]:checked:border-primary [&amp;[type='checkbox']]:checked:border-opacity-10 [&amp;:disabled:not(:checked)]:bg-slate-100 [&amp;:disabled:not(:checked)]:cursor-not-allowed [&amp;:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&amp;:disabled:checked]:opacity-70 [&amp;:disabled:checked]:cursor-not-allowed [&amp;:disabled:checked]:dark:bg-darkmode-800/50 w-[38px] h-[24px] p-px rounded-full relative before:w-[20px] before:h-[20px] before:shadow-[1px_1px_3px_rgba(0,0,0,0.25)] before:transition-[margin-left] before:duration-200 before:ease-in-out before:absolute before:inset-y-0 before:my-auto before:rounded-full before:dark:bg-darkmode-600 checked:bg-primary checked:border-primary checked:bg-none before:checked:ml-[14px] before:checked:bg-white">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

        </template>
    </SlideOverDetail>

</template>

<script setup>
import * as yup from 'yup';
import { ref, defineEmits, watch, onMounted, reactive } from 'vue';
// import SlideOverMain from '../global/SlideOver.vue';
import SlideOverDetail from '../global/SlideOver.vue';

const props = defineProps({
  fieldOld: {},
  isEdit: false,
});
const slideOverMain = ref(null);
const slideOverDetail = ref(null);
// const slideOverRepeater = ref(null);
const type = ref(null);
const typeText = ref(null);
var form = {
    id: null,
    tag: null,
    type: null,
    label: null,
    name: null,
    maxlength: 255,
    value: null,
    required: false,
    multiple: false,
    options: reactive([{id: Date.now().toString(36), label: null, value: null, selected: null}]),
    min: null,
    max: null,
    readonly: false,
    disabled: false,
    classSize: {class: 'w-full', percent: '100%'},
    data: reactive([]),
};
const errors = ref({});


const show = () => {
    if (slideOverMain.value) {
        slideOverMain.value.show();
    }
};
const showSlideOverDetail = () => {
    if (slideOverDetail.value) {
        slideOverDetail.value.show();
    }
};
const showSlideOverRepeater = () => {
    if (slideOverRepeater.value) {
        slideOverRepeater.value.show();
    }
};
const hideSlideOverMain = () => {
    if (slideOverMain.value) {
        slideOverMain.value.hide();
    }
};
const hideSlideOverDetail = () => {
    if (slideOverDetail.value) {
        errors.value = {};
        slideOverDetail.value.hide();
    }
};
const hideSlideOver = () => {
    if (slideOverRepeater.value) {
        slideOverRepeater.value.hide();
    }
};
const handleSelect = (param_type) => {
    typeText.value = param_type + " Field";

    type.value = param_type.toLowerCase();
    showSlideOverDetail()
};

const addOption = () => {
    form.options.push({id: Date.now().toString(36), label: null, value: null, selected: null});
};

const addRadio = () => {
    form.options.push({id: Date.now().toString(36), label: null, value: null, checked: null});
};

const addCheckbox = () => {
    form.options.push({id: Date.now().toString(36), label: null, value: null, checked: null});
};



const validateForm = async () => {
    // Define Yup schema for validation
    const schema = yup.object().shape({
        label: yup.string().required('Nhãn hiển thị không được để trống').max(255, 'Nhãn hiển thị không quá 255 ký tự'),
        name: yup.string().required('Tên biến không được để trống').max(255, 'Tên biến không quá 255 ký tự'),
        // maxlength: yup.number().required('Giới hạn ký tự không được để trống').min(1, 'Giới hạn ký tự phải lớn hơn 1')
    });
    try {
        // Validate the form data
        await schema.validate(form, { abortEarly: false });
        errors.value = {};
        return true;
    } catch (err) {
        // Collect validation errors
        errors.value = {};
        if (err.inner) {
            err.inner.forEach(error => {
                errors.value[error.path] = error.message;
                form[error.path] = '';
            });
        }
        return false;

    }
};

const onSubmit = async () => {
    const isValid = await validateForm();
    if (isValid) {
        sendData();
    }else{
        console.log(errors);
    }
};

const sendData = () => {
    if (props.isEdit) {
        if(form.type == "select" || form.type == "textarea"){
            form.tag = form.type;
        }else{
            form.tag = "input";
        }
        emit('reField', form);
    }else{
        form.id = Date.now().toString(36);
        form.type = type.value;
        if(type.value == "select" || type.value == "textarea"){
            form.tag = form.type;
        }else{
            form.tag = type.value;
        }
        emit('field', form);
    }
    hideSlideOverMain();
    hideSlideOverDetail();
    form = {
        id: null,
        tag: null,
        type: null,
        label: null,
        name: null,
        maxlength: 255,
        value: null,
        required: false,
        multiple: false,
        options: reactive([{id: Date.now().toString(36), label: null, value: null, selected: null}]),
        min: null,
        max: null,
        readonly: false,
        disabled: false,
        classSize: {class: 'w-full', percent: '100%'},
        data: reactive([]),
    };
};

// Watch sự thay đổi của props fieldOld
watch(() => props.fieldOld, (newValue, oldValue) => {
    if(props.isEdit == true){
        form = Object.assign(form, newValue);
        typeText.value = form.type.toUpperCase() + " Field";
        type.value = form.type.toLowerCase();
        hideSlideOverMain();
        showSlideOverDetail();
        emit('resetOldField');
    }
});

watch(() => props.isEdit, (newValue, oldValue) => {
    if(!props.isEdit){
        form = {
            id: null,
            tag: null,
            type: null,
            label: null,
            name: null,
            maxlength: 255,
            value: null,
            required: false,
            multiple: false,
            options: reactive([{id: Date.now().toString(36), label: null, value: null, selected: null}]),
            min: null,
            max: null,
            readonly: false,
            disabled: false,
            classSize: {class: 'w-full', percent: '100%'},
            data: reactive([]),
        };
    }
});

// onMounted to check the initial value
onMounted(() => {
    // if(props.fieldOld.length > 0){
    //     form = Object.assign(form, props.fieldOld);
    //     hideSlideOverMain();
    //     showSlideOverDetail();
    //     emit('resetOldField');
    // }
});

defineExpose({
    show,
});
const emit = defineEmits(['field', 'reField', 'resetOldField']); 
</script>

<style></style>