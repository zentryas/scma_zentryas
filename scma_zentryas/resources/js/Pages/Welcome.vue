<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

// Props dari controller Laravel
defineProps({
    karyawan: Array,
    jabatan: Array,
    divisi: Array
});

const form = useForm({
  tgl_pengajuan: "",
  kategori: "",
  karyawan_id: "",
  divisi_id: "",
  jabatan_id: "",
});

const submit = () => {
  form.post("/submit-form");
};
</script>


<template>
    <Head title="Form Pengajuan" />

    <GuestLayout>

        <div class="py-12">
            <div class="grid justify-items-stretch gap-6 lg:grid-cols-1 lg:gap-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg p-8 w-full md:w-1/2 mx-auto">
                    <h4>Form Pengajuan Peringatan Karyawan</h4>
                    <form @submit.prevent="submit" class="mt-5">
                        <div class="grid gap-6 mb-6">
                            <div>
                                <label for="tgl_pengajuan" class="block mb-2 text-sm font-medium text-gray-900">Tgl Pengajuan</label>
                                <input type="date" name="tgl_pengajuan" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" v-model="form.tgl_pengajuan">
                                <small v-if="form.errors.tgl_pengajuan" class="text-red-600">{{ form.errors.tgl_pengajuan }}</small>
                            </div>
                            <div>
                                <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900">Kategori Pengajuan</label>
                                <select name="kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" v-model="form.kategori">
                                    <option value="" disabled selected>Pilihan</option>
                                    <option value="Teguran Tertulis">Teguran Tertulis</option>
                                    <option value="SP1">SP1</option>
                                    <option value="SP2">SP2</option>
                                    <option value="SP3">SP3</option>
                                </select>
                                <small v-if="form.errors.kategori" class="text-red-600">{{ form.errors.kategori }}</small>
                            </div>
                            <div>
                                <label for="karyawan" class="block mb-2 text-sm font-medium text-gray-900">Karyawan</label>
                                <select name="karyawan_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" v-model="form.karyawan_id">
                                    <option value="" disabled selected>Pilihan</option>
                                    <option v-for="item in karyawan" :key="item.id" :value="item.id">{{ item.nama_karyawan }}</option>
                                </select>
                                <small v-if="form.errors.karyawan_id" class="text-red-600">{{ form.errors.karyawan_id }}</small>
                            </div>

                            <div>
                                <label for="company" class="block mb-2 text-sm font-medium text-gray-900">Divisi</label>
                                <select name="divisi_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" v-model="form.divisi_id">
                                    <option value="" disabled selected>Pilihan</option>
                                    <option v-for="item in divisi" :key="item.id" :value="item.id">{{ item.nama_divisi }}</option>
                                </select>
                                <small v-if="form.errors.divisi_id" class="text-red-600">{{ form.errors.divisi_id }}</small>
                            </div>  
                            <div>
                                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Jabatan</label>
                                <select name="jabatan_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" v-model="form.jabatan_id">
                                    <option value="" disabled selected>Pilihan</option>
                                    <option v-for="item in jabatan" :key="item.id" :value="item.id">{{ item.nama_jabatan }}</option>
                                </select>
                                <small v-if="form.errors.jabatan_id" class="text-red-600">{{ form.errors.jabatan_id }}</small>
                            </div>
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
