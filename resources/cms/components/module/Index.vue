<template>
    <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row mt-5">
        <div class="text-2xl font-medium group-[.mode--light]:text-white">{{ this.route.titleUcfirst }}</div>
        <div class="flex flex-col sm:flex-row gap-x-3 gap-y-2 md:ml-auto">
            <router-link :to="{ name: route.nameComponentCreate }"
                class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200 group-[.mode--light]:!border-transparent">
                Create {{ this.route.titleUcfirst }}
            </router-link>
        </div>
    </div>
    <div class="ring-opacity-5 shadow mt-5 flex flex-col box box--stacked rounded-xl shadow-md overflow-hidden">
        <div id="filter-section" class="flex flex-col p-5 sm:items-center sm:flex-row gap-y-2 border-b border-dashed">
            <div>
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"
                        class="lucide lucide-search absolute inset-y-0 left-0 z-10 w-4 h-4 my-auto ml-3 stroke-[1.3] text-slate-500">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </svg>
                    <input @input="setFilter(this.paginate.currentPage)" v-model="filters.title" type="text" placeholder="Tìm kiếm..."
                        class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-300/60 shadow-sm placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 pl-9 sm:w-64 rounded-[0.5rem]">
                </div>
            </div>
        </div>
        <div id="data-section">
            <div class="overflow-auto xl:overflow-visible">
                <table class="w-full text-left border-b border-slate-200/60">
                    <thead class="" v-if="data.length > 0">
                        <tr class="">
                            <td
                                class="px-5 border-b dark:border-darkmode-300 w-5 py-4 font-medium border-t bg-slate-50 border-slate-200/60 text-slate-500">
                                <input type="checkbox" @click="selectedAllItem()"
                                    class="transition-all duration-100 ease-in-out shadow-sm border-slate-300/80 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;[type='radio']]:checked:bg-primary/60 [&amp;[type='radio']]:checked:border-primary/50 [&amp;[type='radio']]:checked:border-opacity-10 [&amp;[type='checkbox']]:checked:bg-primary/60 [&amp;[type='checkbox']]:checked:border-primary/50 [&amp;[type='checkbox']]:checked:border-opacity-10 [&amp;:disabled:not(:checked)]:bg-slate-100 [&amp;:disabled:not(:checked)]:cursor-not-allowed [&amp;:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&amp;:disabled:checked]:opacity-70 [&amp;:disabled:checked]:cursor-not-allowed [&amp;:disabled:checked]:dark:bg-darkmode-800/50">
                            </td>
                            <td
                                class="px-5 border-b dark:border-darkmode-300 py-4 font-medium border-t bg-slate-50 border-slate-200/60 text-slate-500">
                                <template v-if="!show.actionBulkTable">
                                    Tiêu đề
                                </template>
                                <template v-else>
                                    <button @click="toggleModalDestroy()" class="text-xs transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-secondary text-slate-500 dark:border-darkmode-100/40 dark:text-slate-300 [&:hover:not(:disabled)]:bg-secondary/20 [&:hover:not(:disabled)]:dark:bg-darkmode-100/10 cursor-pointer w-full sm:w-auto">
                                        Xoá tất cả
                                    </button>
                                </template>
                            </td>
                            <td
                                class="px-5 border-b dark:border-darkmode-300 py-4 font-medium border-t bg-slate-50 border-slate-200/60 text-slate-500">
                                Mô tả
                            </td>
                            <td
                                class="px-5 border-b dark:border-darkmode-300 py-4 font-medium border-t bg-slate-50 border-slate-200/60 text-slate-500">
                                Bản thiết kế
                            </td>
                            <td
                                class="px-5 border-b dark:border-darkmode-300 py-4 font-medium text-center border-t w-36 bg-slate-50 border-slate-200/60 text-slate-500">
                                <!-- Hành động -->
                            </td>
                        </tr>
                    </thead>
                    <thead v-else>
                        <tr class="text-center">
                            <td class="px-5 border-b dark:border-darkmode-300 py-4 border-dashed dark:bg-darkmode-600">Không có dữ liệu</td>
                        </tr>
                    </thead>
                    <thead v-if="data" ref="dataTable">
                        <tr v-for="item in data" :key="item">
                            <td class="px-5 border-b dark:border-darkmode-300 py-4 border-dashed dark:bg-darkmode-600">
                                <input :value="item.id" @change="selectedItem()" v-model="selectedItems"
                                    type="checkbox" class="inputCheckBox transition-all duration-100 ease-in-out shadow-sm border-slate-300/80 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;[type='radio']]:checked:bg-primary/60 [&amp;[type='radio']]:checked:border-primary/50 [&amp;[type='radio']]:checked:border-opacity-10 [&amp;[type='checkbox']]:checked:bg-primary/60 [&amp;[type='checkbox']]:checked:border-primary/50 [&amp;[type='checkbox']]:checked:border-opacity-10 [&amp;:disabled:not(:checked)]:bg-slate-100 [&amp;:disabled:not(:checked)]:cursor-not-allowed [&amp;:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&amp;:disabled:checked]:opacity-70 [&amp;:disabled:checked]:cursor-not-allowed [&amp;:disabled:checked]:dark:bg-darkmode-800/50">
                            </td>
                            <td class="px-5 border-b dark:border-darkmode-300 py-4 border-dashed dark:bg-darkmode-600">
                                <router-link :to="{ name: route.nameComponentEdit, params: { id: item.id } }" class="font-medium whitespace-nowrap">{{ item.title_admin }}</router-link>
                                <!-- <a :href="baseURL + '/cms/collection/edit/' + item.id" class="font-medium whitespace-nowrap">{{ item.title }}</a> -->
                            </td>
                            <td class="px-5 border-b dark:border-darkmode-300 py-4 border-dashed dark:bg-darkmode-600 ">
                                <div class="whitespace-nowrap overflow-hidden text-ellipsis block max-w-[200px]">{{ item.desc }}</div>
                            </td>
                            <td v-if="item.design" class="px-5 border-b dark:border-darkmode-300 relative py-4 border-dashed dark:bg-darkmode-600">
                                <router-link :to="{ name: 'cms.design.edit', params: { id: item.design.id } }" class="whitespace-nowrap overflow-hidden text-ellipsis block max-w-[200px]">{{ item.design.title }}</router-link>
                                <!-- <div class="whitespace-nowrap overflow-hidden text-ellipsis block max-w-[200px]">{{ item.design.title }}</div> -->
                            </td>
                            <td
                                class="px-5 border-b dark:border-darkmode-300 relative py-4 border-dashed dark:bg-darkmode-600">
                                <div class="flex items-center justify-center">
                                    <div class="relative h-5" >
                                        <Dropdown placement="bottom-end">
                                            <button
                                                class="focus:rotate-90 focus:transition-all focus:ring-4 focus:rounded-full dropdown-toggle cursor-pointer w-5 h-5 text-slate-500" type="button" aria-expanded="false" data-tw-toggle="dropdown">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-more-vertical stroke-[1] w-5 h-5 stroke-slate-400/70 fill-slate-400/70">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="12" cy="5" r="1"></circle>
                                                    <circle cx="12" cy="19" r="1"></circle>
                                                </svg>
                                            </button>
                                            <DropdownMenu class="w-40">
                                                <DropdownContent>
                                                    <DropdownItem>
                                                        <router-link :to="{ name: route.nameComponentEdit, params: { id: item.id } }">Chỉnh sửa</router-link>
                                                        <!-- <a :href="this.baseURL + '/cms/collection/edit/' + item.id">Chỉnh sửa</a> -->
                                                    </DropdownItem>
                                                    <DropdownItem @click="destroy(item.id)">Xoá</DropdownItem>
                                                </DropdownContent>
                                            </DropdownMenu>
                                        </Dropdown>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
            <div v-if="paginate && paginate.totalPage > 1" class="flex flex-col-reverse flex-wrap items-center p-5 flex-reverse gap-y-2 sm:flex-row">
                <nav class="flex-1 w-full mr-auto sm:w-auto">
                    <ul class="flex w-full mr-0 sm:w-auto sm:mr-auto justify-end">

                        <li class="flex-1 sm:flex-initial" v-if="paginate.currentPage > 1">
                            <a
                                class="transition duration-200 border py-2 rounded-md cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed min-w-0 sm:min-w-[40px] font-normal flex items-center justify-center text-slate-800 sm:mr-2 dark:text-slate-300 px-1 sm:px-3 shadow-none border-transparent"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-chevron-left stroke-[1] w-4 h-4">
                                    <path d="m15 18-6-6 6-6"></path>
                                </svg>
                            </a>
                        </li>
                        <li class="flex-1 sm:flex-initial" v-for="number in range" :key="number" @click="setFilter(number)">
                            <a  :class="{ 'border': paginate.currentPage === number, 'border-transparent': paginate.currentPage !== number }" class="transition duration-200 border py-2 rounded-md cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed min-w-0 sm:min-w-[40px] font-normal flex items-center justify-center text-slate-800 sm:mr-2 dark:text-slate-300 px-1 sm:px-3 shadow-none">{{ number }}</a>
                        </li>

                        <li class="flex-1 sm:flex-initial"  v-if="paginate.currentPage < paginate.totalPage">
                            <a
                                class="transition duration-200 border py-2 rounded-md cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed min-w-0 sm:min-w-[40px] font-normal flex items-center justify-center text-slate-800 sm:mr-2 dark:text-slate-300 px-1 sm:px-3 shadow-none border-transparent"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-chevron-right stroke-[1] w-4 h-4">
                                    <path d="m9 18 6-6-6-6"></path>
                                </svg>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <Modal :show="show.deleteModalPreview" @hidden="show.deleteModalPreview = false">
        <ModalBody class="p-0">
        <div class="p-5 text-center">
            <XCircleIcon class="w-16 h-16 text-danger mx-auto mt-3" />
            <div class="text-3xl mt-5">Xác nhận hệ thống</div>
            <div class="text-slate-500 mt-2">
            Mọi dữ liệu khó có thể khôi phục
            </div>
        </div>
        <div class="px-5 pb-8 text-center">
            <button @click="toggleModalDestroy()" type="button" class="btn btn-outline-secondary w-24 mr-1">
            Huỷ
            </button>
            <button @click="destroySelectedData()" type="button" class="btn btn-danger w-24">
            Xoá
            </button>
        </div>
        </ModalBody>
    </Modal>
    <NotificationSticky ref="notificationSticky" :message="'Xoá thành công'" :type="'success'"></NotificationSticky>
</template>

<script>
import axios from "axios";
import NotificationSticky from '../global/NotificationSticky.vue'
import {getRouteIndex} from '../../helper/URL'
export default {
    components: {
        NotificationSticky
    },
    inject: ["baseURL"],
    data() {
        return {
            route: {},
            data: [],
            paginate: {
                currentPage: null,
                totalPage: null,
            },
            filters: {
                page: null,
                title: null,
            },
            selectedItems: [],
            show :{
                actionBulkTable: false,
                deleteModalPreview: false,
                isFilter: false,
            }
        };
    },
    methods: {
        setFilter(page) {
            this.filters.page = page;



            this.paginate.currentPage = page;
            this.show.isFilter = true;
            this.load();
        },
        selectedAllItem() {
            let that = this;
            var dataTable = this.$refs.dataTable;

            var inputCheckBoxes = dataTable.querySelectorAll('input.inputCheckBox');
            if (this.show.actionBulkTable) {
                this.selectedItems = [];
            } else {
                inputCheckBoxes.forEach((element) => {
                    if (!this.selectedItems.includes(element.value)) {
                        this.selectedItems.push(element.value);
                    }
                });
            }
            this.show.actionBulkTable = !this.show.actionBulkTable;
        },
        selectedItem() {
            this.show.actionBulkTable = this.selectedItems.length > 0;
        },
        destroySelectedData() {
            this.toggleModalDestroy();
            let that = this;
            this.selectedItems.forEach(function(value){
                that.destroy(value);
            });
            this.showNotificationSticky();
        },
        toggleModalDestroy() {
            this.show.deleteModalPreview = !this.show.deleteModalPreview;
        },
        showNotificationSticky() {
            this.$refs.notificationSticky.show();
        },




        load() {
            console.log(this.route);
            axios
                .get(`${this.baseURL}/${this.route.nameAPI}`, {
                    params: this.filters,
                })
                .then((response) => {
                    this.data = response.data.data.data;
                    this.paginate.currentPage = response.data.data.current_page;
                    this.paginate.totalPage = response.data.data.last_page;
                    console.log(this.data);
                })
                .catch((error) => {
                    console.error("Error fetching data:", error);
                });
        },
        destroy(id) {
            axios.delete(`${this.baseURL}/${this.route.nameAPI}/${id}`)
            .then((response) => {
                console.log("Deleted successfully:", response.data);
                this.load(this.paginate.currentPage);
            })
            .catch((error) => {
                console.error("Error deleting record:", error);
            });

        },
        getRoute(current){
            this.route = current;
            this.route = getRouteIndex(this.route)
        },
    },
    computed: {
        range() {
            return Array.from({ length: this.paginate.totalPage }, (_, i) => i + 1);
        }
    },
    created() {
        this.getRoute(this.$route)
        console.log(this.route);
        this.load();
    },
    watch: {
        $route(to, from) {
            this.getRoute(to)
            this.load();
        },
    },
};
</script>
