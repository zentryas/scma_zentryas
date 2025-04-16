<script setup>

import { onMounted } from 'vue';

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import $ from 'jquery';

import DeleteButton from '@/Components/SweetAlert2/DeleteButton.vue';

defineProps({
  divisi: {
    type: Array,
    default: () => [],
  },
  components: {
    DeleteButton,
  },
});

onMounted(() => {
    $('#list_data').DataTable({
      scrollX:true
    });
});

</script>

<template>
    <Head title="Manage divisi" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Manage Divisi</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <Link href="divisi/create">
                          <button class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Create New Divisi
                          </button>
                        </Link>                       
                        <div class="relative overflow-x-auto sm:rounded-lg">
                            <table id="list_data" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3">No.</th>
                                        <th scope="col" class="px-6 py-3">Nama divisi</th>
                                        <th scope="col" class="px-6 py-3">Kode Divisi</th>
                                        <th scope="col" class="px-6 py-3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(key, index) in divisi" :key="key.id">
                                      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ index + 1 }}.
                                      </th>
                                      <td class="px-6 py-4">{{ key.nama_divisi }}</td>
                                      <td class="px-6 py-4">{{ key.kode_divisi }}</td>
                                      <td class="px-6 py-4">

                                        <Link :href="`divisi/${key.id}/edit`">
                                          <button class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-200 dark:bg-yellow-500 dark:hover:bg-yellow-600 dark:focus:ring-yellow-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                                              <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg> Edit
                                          </button>
                                        </Link>
                                          
                                        <DeleteButton 
                                          :item-id="key.id" 
                                          :item-nama_divisi="key.nama_divisi" 
                                          :delete-url="`/divisi/${key.id}`"/>
                                      </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
