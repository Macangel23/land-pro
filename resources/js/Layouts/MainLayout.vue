<script setup>
   import { Link, usePage } from '@inertiajs/inertia-vue3';
   import { computed } from 'vue';

   const page = usePage();

   const flashMessage = computed(() => page.props.value.flash.success)
   const user = computed(() => page.props.value.user);
   // const timer = ref(0);
   // setInterval(() => {
   //    if(timer.value < 10) {
   //       timer.value++
   //    };
   // }, 1000);
</script>

<template>
   <!-- <Link href="/">Main Page</Link> &nbsp;
   <Link href="/listing">Listings Pages</Link> -->

   <header class="w-full bg-white border-b border-gray-200 dark:border-gray-700 dark:bg-gray-900">
      <div class="container mx-auto">
         <nav class="flex items-center justify-between p-4">
            <!-- <ul>
               <li>
                  <Link :href="route('listing.index')">Listings</Link>
               </li>
               <li>
                  <Link :href="route('listing.index')">LaraZillow</Link>
               </li>
            </ul> -->
            <div class="text-lg font-medium">
               <Link :href="route('listing.index')">Listings</Link>
            </div>
            <div class="text-xl font-bold text-center text-indigo-600 dark:text-indigo-300">
               <Link :href="route('listing.index')">LaraZillow</Link>
            </div>
            <div>
               <div class="flex items-center gap-4" v-if="user">
                  <span class="text-sm font-medium text-gray-500">{{ user.name }}</span>
                  <Link :href="route('listing.create')" class="primary-button">+ New Listing</Link>
                  <Link :href="route('logout')" class="text-gray-500" as="button" method="delete">Logout</Link>
               </div>
               <div v-else class="flex items-center gap-4">
                  <Link :href="route('login')">Sign In</Link>
                  <Link :href="route('user-account.create')">Register</Link>
               </div>
            </div>
            <!-- <Link class="text-lg font-medium" :href="route('listing.index')">Listings</Link>
            <Link :href="route('listing.index')">LaraZillow</Link>
            <Link :href="route('listing.index')">Login</Link> -->
         </nav>
      </div>
   </header>

   <main class="container w-full p-4 mx-auto">
      <div v-if="flashMessage" class="p-2 mb-4 border border-green-200 rounded-md shadow-sm dark:border-green-800 bg-green-50 dark:bg-green-900">
          {{ flashMessage }}
      </div>
      <slot />
   </main>

</template>