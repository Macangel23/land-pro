<script setup>
   import { ref } from 'vue';
   import  { useForm } from '@inertiajs/inertia-vue3';

   const form = useForm({
      beds: null,
      baths: null,
      area: null,
      city: null,
      code: null,
      street: null,
      street_number: null,
      price: null
   });

   function handleSubmitForm() {
      form.post(route('listing.store'));
   }
</script>

<template>
   <form @submit.prevent="handleSubmitForm">
      <section class="grid grid-cols-6 gap-4">
         <div class="col-span-6 md:col-span-2">
            <label for="beds" class="label">Beds</label>
            <input type="number" v-model.number="form.beds" name="beds" class="input" />
            <div v-if="form.errors.beds" class="error-message"> {{ form.errors.beds }}</div>
         </div>

         <div class="col-span-6 md:col-span-2">
            <label for="baths" class="label">Baths</label>
            <input type="number" v-model.number="form.baths" name="baths" class="input"/>
            <div v-if="form.errors.baths" class="error-message"> {{ form.errors.baths }}</div>
         </div>

         <div class="col-span-6 md:col-span-2">
            <label for="area" class="label">Area</label>
            <input type="number" v-model.number="form.area" name="area" class="input"/>
            <div v-if="form.errors.area" class="error-message"> {{ form.errors.area }}</div>
         </div>

         <div class="col-span-6 md:col-span-4 xl:col-span-2">
            <label for="city" class="label">City</label>
            <input type="text" v-model="form.city" name="city" class="input"/>
            <div v-if="form.errors.city" class="error-message"> {{ form.errors.city }}</div>
         </div>

         <div class="col-span-6 md:col-span-2">
            <label for="code" class="label">Postal Code</label>
            <input type="text" v-model="form.code" name="code" class="input"/>
            <div v-if="form.errors.code" class="error-message"> {{ form.errors.code }}</div>
         </div>

         <div class="col-span-6 md:col-span-4 xl:col-span-2">
            <label for="street" class="label">Street</label>
            <input type="text" v-model="form.street" name="street" class="input"/>
            <div v-if="form.errors.street" class="error-message"> {{ form.errors.street }}</div>
         </div>

         <div class="col-span-6 md:col-span-2">
            <label for="street_number" class="label">Street Number</label>
            <input type="number" v-model.number="form.street_number" name="street_number" class="input"/>
            <div v-if="form.errors.street_number" class="error-message"> {{ form.errors.street_number }}</div>
         </div>

         <div class="col-span-6 xl:col-span-2">
            <label for="price" class="label">Price</label>
            <input type="number" step="0.01" v-model.number="form.price" name="price" class="input"/>
            <div v-if="form.errors.price" class="error-message"> {{ form.errors.price }}</div>
         </div>
      </section>
      <section class="mt-4">
         <button type="submit" class="primary-button">Create</button>
      </section>
   </form>
</template>