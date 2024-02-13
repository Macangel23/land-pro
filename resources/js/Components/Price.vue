<script setup>
   import { computed } from 'vue';

   const props = defineProps({
      price: {
         type: [Number, String],
         default: null
      }
   })

   const formattedPrice = computed(() => Number(props.price).toLocaleString('en-US', {
         style: 'currency',
         currency: 'USD',
         maximumFractionDigits: 0,
      })
   );
</script>


<template>
   <span>{{ formattedPrice }}</span>
</template>