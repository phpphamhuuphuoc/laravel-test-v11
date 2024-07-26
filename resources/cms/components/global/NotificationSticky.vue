<template>
  <Notification refKey="basicStickyNotification" :options="{ duration: 3000, }" class="flex justify-start align-items-center">
    <CheckCircleIcon class="text-success" v-if="type=='success'" />
    <XCircleIcon class="text-danger" v-else-if="type=='error'" />
    <XCircleIcon class="text-warning" v-else />
    <div class="ml-4 mr-4">
      <div class="text-black">
        {{ message }}
      </div>
    </div>
  </Notification>
</template>


<script setup>
import { provide, ref } from 'vue';
const props = defineProps({
  message: String,
  type: String,
});
const basicStickyNotification = ref();
provide("bind[basicStickyNotification]", (el) => {
  // Binding
  basicStickyNotification.value = el;
});
const show = (message = '') => {
  // Show notification
  basicStickyNotification.value.showToast();
};
defineExpose({
  show
});
</script>