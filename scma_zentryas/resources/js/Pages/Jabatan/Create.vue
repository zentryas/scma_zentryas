<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, Link } from "@inertiajs/vue3";

const form = useForm({
  nama_jabatan: "",
  kode_jabatan: "",
});

const submit = () => {
  form.post("/jabatan");
};
</script>

<template>
    <Head title="Create jabatan" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create jabatan</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <Link href="/jabatan">
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
                                <label for="nama_jabatan" class="block text-gray-700 text-sm font-bold mb-2">Nama jabatan:</label>
                                <input id="nama_jabatan" type="text" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="Enter nama_jabatan" v-model="form.nama_jabatan" />
                                <small v-if="form.errors.nama_jabatan" class="text-red-600">{{ form.errors.nama_jabatan }}</small>
                            </div>
                            <div class="mb-4">
                                <label for="kode_jabatan" class="block text-gray-700 text-sm font-bold mb-2">Kode Jabatan:</label>
                                <input id="kode_jabatan" type="text" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="Enter kode_jabatan" v-model="form.kode_jabatan" />
                                <small v-if="form.errors.kode_jabatan" class="text-red-600">{{ form.errors.kode_jabatan }}</small>
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
