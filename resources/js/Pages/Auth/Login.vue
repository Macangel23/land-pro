<script setup>
   import { useForm, Link } from '@inertiajs/inertia-vue3';

   const form = useForm({
      email: null,
      password: null
   });

   function login() {
      form.post(route('login.store'));
   }

</script>

<template>
   <form @submit.prevent="login">
      <div class="w-1/2 mx-auto">
         <div>
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
            <button class="w-full primary-button" type="submit">Login</button>
            <div class="mt-4 text-center">
               <Link :href="route('user-account.create')" class="text-gray-500 ">Need an account? Click here</Link>
            </div>
         </div>
      </div>
   </form>
</template>