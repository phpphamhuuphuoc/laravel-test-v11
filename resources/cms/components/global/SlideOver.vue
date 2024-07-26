<template>
    <Modal size="modal-xl modal-2xl" :slideOver="true" :show="superlargeSlideOverSizePreview"
        @hidden="superlargeSlideOverSizePreview = false">
        <ModalHeader class="p-5">
            <slot name="header">
                <button @click="hide()" class="mr-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg></button>
                <h2 class="font-medium text-lg mr-auto">
                    Default Header
                </h2>
            </slot>
        </ModalHeader>
        <slot name="search">
            <div class="modal-search p-5 border-slate-200\/60 text-slate-500 bg-slate-100">
                <input type="search" name="searchFields" id="searchFields" class="form-control"
                    placeholder="Tìm kiếm...">
            </div>
        </slot>

        <ModalBody>
            <slot name="body">
                Default Body
            </slot>
        </ModalBody>
    </Modal>
</template>


<script setup>
import { ref } from 'vue';
const props = defineProps({

});
const superlargeSlideOverSizePreview = ref(false);

const show = () => {
    // Show notification
    superlargeSlideOverSizePreview.value = true;
};

const hide = () => {
    // Show notification
    superlargeSlideOverSizePreview.value = false;
};

defineExpose({
    show,
    hide
});
</script>
