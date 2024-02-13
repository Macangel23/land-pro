<template>
   <section class="p-4 border-2 border-gray-200 rounded-md shadow-sm dark:border-gray-600 dark:text-gray-300">
      <div class="font-medium text-gray-500">
         <slot name="header"/>
      </div>
      <slot />
   </section>
</template>