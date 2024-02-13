<!-- Exclusive for index component only -->

<script setup>
   import { Link, usePage } from '@inertiajs/inertia-vue3';
   import ListingAddress from '@/Components/ListingAddress.vue';
   import Box from '@/Components/UI/Box.vue';
   import ListingSpace from '@/Components/ListingSpace.vue';
   import Price from '@/Components/Price.vue';
   import { useMonthlyPayment } from '@/Composables/useMonthlyPayment';
   import { computed } from 'vue';

   const props = defineProps({
      list: {
         type: Object,
         default: () => {}
      }
   });

   const page = usePage();
   const user = computed(() => page.props.value.user);

   const interestRate = 2.5; 
   const duration = 25;
   const { monthlyPayment } = useMonthlyPayment(props.list.price, interestRate, duration);

</script>

<template>
   <Box>
      <Link :href="route('listing.show', list.id)">
         <div class="flex items-center gap-1">
            <Price :price="list.price" class="text-2xl font-bold"/>
            <div class="text-xs text-gray-500">
               <Price :price="monthlyPayment" /> pm
            </div>
         </div>
         <ListingSpace :list="list" class="text-lg" />
         <ListingAddress :list="list"/>
      </Link>
      <div class="flex space-x-2" v-if="user">
         <Link :href="route('listing.edit', list.id)" class="px-2 py-1 text-sm border-dark">Edit</Link>
         <Link :href="route('listing.destroy', list.id)" method="delete" as="button" class="px-2 py-1 text-sm border-dark">Delete</Link>
      </div>
   </Box>
</template>