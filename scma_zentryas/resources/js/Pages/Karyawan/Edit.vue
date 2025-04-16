<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, Link } from "@inertiajs/vue3";

const props = defineProps({
  karyawan: {
    type: Object,
    default: null,
  },
});

const form = useForm({
  nama_karyawan: props.karyawan.nama_karyawan,
  nik: props.karyawan.nik,
});

const submit = () => {
  const formData = new FormData();
  
  formData.append('nama_karyawan', form.nama_karyawan);
  formData.append('nik', form.nik);

  
  form.post(`/karyawan-update/${props.karyawan.id}`, { data: formData });
};

</script>

<template>
    <Head title="Edit Karyawan" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Karyawan</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <Link href="/karyawan">
                    <button class="px-3 py-2 text-xs font-medium text-center inline-flex items-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                        </svg> Back
                    </button>
                </Link>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">                        
                        <form @submit.prevent="submit">
                            <div class="mb-4">
                                <label for="nama_karyawan" class="block text-gray-700 text-sm font-bold mb-2">Nama Karyawan:</label>
                                <input id="nama_karyawan" type="text" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="Enter nama_karyawan" v-model="form.nama_karyawan" />
                                <small v-if="form.errors.nama_karyawan" class="text-red-600">{{ form.errors.nama_karyawan }}</small>
                            </div>
                            <div class="mb-4">
                                <label for="nik" class="block text-gray-700 text-sm font-bold mb-2">Nik:</label>
                                <input id="nik" type="text" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="Enter nik" v-model="form.nik" />
                                <small v-if="form.errors.nik" class="text-red-600">{{ form.errors.nik }}</small>
                            </div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3 text-white">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
