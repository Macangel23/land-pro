<script setup>
   import { Link } from '@inertiajs/inertia-vue3';
   import { ref } from 'vue';
   import Box from '@/Components/UI/Box.vue';
   import ListingAddress from '@/Components/ListingAddress.vue';
   import Price from '@/Components/Price.vue';
   import ListingSpace from '@/Components/ListingSpace.vue';
   import { useMonthlyPayment } from '@/Composables/useMonthlyPayment';

   const props = defineProps({
      list: {
         type: Object,
         default: () => {}
      }
   })

   
   const interestRate = ref(2.5);
   const duration = ref(25);
   const { monthlyPayment, totalPaid, totalInterest } = useMonthlyPayment(props.list.price, interestRate, duration);
</script>

<template>
   <Link :href="route('listing.index')" class="primary-button"> Go back to listings </Link>

   <div class="flex flex-col-reverse gap-4 mt-4 md:grid-cols-12 md:grid">
      <Box class="flex items-center w-full md:col-span-7">
         <div class="w-full text-center text-gray-500 font-meduim">No Images</div>
      </Box>
      <div class="flex flex-col gap-4 md:col-span-5">
         <Box>
            <template #header>
               Basic Info
            </template>
            <Price :price="list.price" class="text-2xl font-bold"/>
            <ListingSpace :list="list" class="text-lg" />
            <ListingAddress :list="list"/>
         </Box>
         <Box>
            <template #header>
               Monthly Payment
            </template>
            <div>
               <label for="interest" class="label">Interest Rate ({{ interestRate }}%)</label>
               <input v-model.number="interestRate" type="range" name="interest" min="0.1" max="30" step="0.1" class="w-full h-4 bg-gray-300 rounded-md outline-none appearance-none cursor-pointer dark:bg-gray-400">
               
               <label for="duration" class="label">Duration ({{ duration }} years)</label>
               <input v-model.number="duration" type="range" name="duration" min="3" max="35" step="1" class="w-full h-4 bg-gray-300 rounded-md outline-none appearance-none cursor-pointer dark:bg-gray-400">
            </div>

            <div class="mt-2 text-gray-600 dark:text-gray-300">
               <div class="text-gray-400">Your monthly payment</div>
               <Price :price="monthlyPayment" class="text-xl" />
            </div>

            <div class="mt-2 text-gray-500">
               <div class="flex justify-between">
                  <div>Total Paid</div>
                  <div>
                     <Price :price="totalPaid" class="font-medium" />
                  </div>
               </div>
               <div class="flex justify-between">
                  <div>Principal Paid</div>
                  <div>
                     <Price :price="list.price" class="font-medium" />
                  </div>
               </div>

               <div class="flex justify-between">
                  <div>Interest Paid</div>
                  <div>
                     <Price :price="totalInterest" class="font-medium" />
                  </div>
               </div>
            </div>
            
         </Box>
      </div>
   </div>
</template>