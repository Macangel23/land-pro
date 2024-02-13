<script setup>
   defineProps({
      list: {
         type: Object,
         default: () => {}
      }
   })
</script>

<template>
   <div>
      <span class="font-bold"> {{ list.beds }}</span> bds <span class="text-gray-400 dark:text-gray-300">| </span>
      <span class="font-bold">{{ list.baths }}</span> ba <span class="text-gray-400 dark:text-gray-300">| </span> 
      <span class="font-bold">{{ list.area }}</span> sqr. mtr.
   </div>
</template>