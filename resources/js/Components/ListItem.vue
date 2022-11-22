<template>
  <div class="flex flex-row bg-white shadow-md rounded relative">
    <div class="min-h-full rounded-l w-2" :class="estilo"></div>
    <slot></slot>

    <div class="absolute top-4 right-2">
      <div class="self-start"></div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    estilo: String,
  },
};
</script>

<style scoped>
.subtitle {
  font-size: 0.8rem;
}
</style>
