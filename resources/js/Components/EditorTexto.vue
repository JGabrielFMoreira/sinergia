<template>
  <QuillEditor
    theme="snow"
    toolbar="toolbarOptions"
    v-model:content="state.content"
    @textChange="$emit('update:modelValue', state.content)"
    contentType="html"
  ></QuillEditor>
</template>

<script setup>
import { ref, defineProps, defineEmits, reactive } from "vue";
import { QuillEditor } from "@vueup/vue-quill";
import "@vueup/vue-quill/dist/vue-quill.snow.css";
const toolbarOptions = [{ header: 3 }];
const content = ref({});
const state = reactive({ content: "" });

defineProps(["modelValue"]);
defineEmits(["update:modelValue"]);
</script>

<style scoped>
</style>
