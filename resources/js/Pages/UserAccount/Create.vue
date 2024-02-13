<script setup>
   import { useForm, Link } from '@inertiajs/inertia-vue3';

   const form = useForm({
      name: null,
      email: null,
      password: null,
      password_confirmation: null,
   });

   function register() {
      form.post(route('user-account.store'));
   }
</script>

<template>
   <form @submit.prevent="register">
      <div class="w-1/2 mx-auto">
         <div>
            <label for="name" class="label">Your Name</label>
            <input v-model="form.name" type="text" id="name" class="input" />
            <div v-if="form.errors.name" class="error-message">{{ form.errors.name }}</div>
         </div>
         <div class="mt-4">
            <label for="email" class="label">E-mail</label>
            <input v-model="form.email" type="text" id="email" class="input" />
            <div v-if="form.errors.email" class="error-message">{{ form.errors.email }}</div>
         </div>
         <div class="mt-4">
            <label for="password" class="label">Password</label>
            <input v-model="form.password" type="password" id="password" class="input" />
            <div v-if="form.errors.password" class="error-message">{{ form.errors.password }}</div>
         </div>
         <div class="mt-4">
            <label for="confirm_password" class="label">Confirm Password</label>
            <input v-model="form.password_confirmation" type="password" id="confirm_password" class="input" />
            <div v-if="form.errors.password_confirmation" class="error-message">{{ form.errors.password_confirmation }}</div>
         </div>
         <div class="mt-4">
            <button class="w-full primary-button" type="submit">Register</button>
            <div class="mt-4 text-center">
               <Link :href="route('login')" class="text-gray-500">Already have an account? Click here</Link>
            </div>
         </div>
      </div>
   </form>
</template>