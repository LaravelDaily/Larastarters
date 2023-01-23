<template>
  <Head title="Users" />

  <AuthenticatedLayout>
    <div class="w-full px-4">
      <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
        <div class="rounded-t mb-0 px-4 py-3 border-0">
          <div class="flex flex-wrap items-center">
            <div class="relative w-full px-4 max-w-full flex-grow flex-1">
              <h3 class="font-semibold text-lg text-slate-700">
                Users
              </h3>
            </div>
          </div>
        </div>


        <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-sky-500">
          <span class="inline-block align-middle">
              Sample table page
          </span>
        </div>

        <div class="block w-full overflow-x-auto">
          <table class="items-center w-full bg-transparent border-collapse">
            <thead>
              <tr>
                <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-slate-50 text-slate-500 border-slate-100">
                  Name
                </th>
                <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-slate-50 text-slate-500 border-slate-100">
                  Email
                </th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="user in users.data" :key="user.id">
                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                  {{ user.name }}
                </td>
                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                  {{ user.email }}
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <pagination :links="users.links" />
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue'
import { Head } from '@inertiajs/vue3';

const props = defineProps({
  users: Object
})
</script>
