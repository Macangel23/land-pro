<script setup>
   import Listing from '@/Pages/Listing/Index/Components/Listing.vue';
   import Filters from '@/Pages/Listing/Index/Components/Filters.vue';
   import Pagination from '@/Components/UI/Pagination.vue';
   
   defineProps({
      listings: {
         type: Object,
         default: []
      }
   })
</script>

<template>
   <Filters />
   <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-3">
      <Listing v-for="(list, index) in listings.data" :key="index" :list="list">
      </Listing>
   </div>
   <div class="flex justify-center w-full mt-4 mb-4" v-if="listings.data.length > 0">
      <Pagination :links="listings.links" />
   </div>
</template>