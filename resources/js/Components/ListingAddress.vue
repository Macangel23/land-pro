<script setup>
   defineProps({
      list: {
         type: Object,
         default: () => {}
      }
   })
</script>

<template>
   <div class="flex items-center mb-2 space-x-2 text-gray-500 dark:text-gray-400">
      <h1 class="text-xl">{{ list.city }}</h1>,
      <p class="mt-1 text-md">{{ list.street_number }}</p>
      <p class="mt-1 text-md">{{ list.street }}</p>
   </div>
</template>