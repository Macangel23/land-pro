<script setup>
   import { Link } from '@inertiajs/inertia-vue3';
   defineProps({
      message: {
         type: String,
         default: ''
      }
   });

</script>

<template>
      <div>
         <h4>Index Page Body</h4>
      </div>
      <div>
         <h5>The message is {{ message }}</h5>
      </div>
   
</template>