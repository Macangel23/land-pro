<script setup>
   import { useForm } from '@inertiajs/inertia-vue3';

   const props = defineProps({
      filters: {
         type: Object,
         default: () => {}
      }
   });
   const filterForm = useForm({
      priceFrom: props.filters.priceFrom ?? null,
      priceTo: props.filters.priceTo ?? null,
      beds: props.filters.beds ?? null,
      baths: props.filters.baths ?? null,
      areaFrom: props.filters.areaFrom ?? null,
      areaTo: props.filters.areaTo ?? null
   })

   function handleFilter() {
      filterForm.get(
         route('listing.index'),
         {
            preserveState: true,
            preserveScroll: true
         }
      )
   }

   function clearFilter() {
         filterForm.priceFrom = null
         filterForm.priceTo = null,
         filterForm.beds = null,
         filterForm.baths = null,
         filterForm.areaFrom = null,
         filterForm.areaTo = null
         handleFilter()
   }
</script>

<template>
   <form @submit.prevent="handleFilter">
      <div class="flex flex-wrap gap-2 mt-4 mb-8">
         <div class="flex items-center flex-nowrap">
            <input v-model.number="filterForm.priceFrom" type="text" class="input-filter-l w-28" placeholder="Price from" />
            <input v-model.number="filterForm.priceTo" type="text" class="input-filter-r w-28" placeholder="Price to"/>
         </div>
         <div class="flex items-center flex-nowrap">
            <select v-model.number="filterForm.beds" name="beds" id="beds" class="input-filter-l w-28">
               <option :value="null">Beds</option>
               <option v-for="count in 5" :key="count" :value="count">{{ count }}</option>
               <option>6+</option>
            </select>
            <select v-model.number="filterForm.baths" name="baths" id="baths" class="input-filter-r w-28">
               <option :value="null">Baths</option>
               <option v-for="count in 5" :key="count" :value="count">{{ count }}</option>
               <option>6+</option>
            </select>
         </div>
         <div class="flex items-center flex-nowrap">
            <input v-model.number="filterForm.areaFrom" type="text" class="input-filter-l w-28" placeholder="Area from" />
            <input v-model.number="filterForm.areaTo" type="text" class="input-filter-r w-28" placeholder="Area to" />
         </div>

         <button type="submit" class="primary-button">Filter</button>
         <button type="reset" @click="clearFilter">Clear</button>
      </div>
   </form>
</template>