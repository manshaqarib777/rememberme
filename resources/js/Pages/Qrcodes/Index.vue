

<template>
  <Head title="Qrcodes" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Qrcodes</h2>
    </template>

    <div class="py-3">
        <div class="max-fw-7xl mx-auto sm:px-6 lg:px-8">


        <Snackbar :snackbar="snackbar" :text="text" />
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-3">
          <div class="p-6 text-gray-900">
            <div
              v-if="$page.props.flash.success"
              class="container text-blue-700 font-bold mt-2 text-start bg-sky-200 rounded p-2"
            >
              {{ $page.props.flash.success }}
            </div>
            <div class="flex justify-between align-middle mb-3">
                <div class="text-2xl font-bold">Qrcodes</div>
                <Link
                    :href="route('qrcodes.create')"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    >
                    Add Qrcode
                </Link>
            </div>


            <div class=" overflow -auto">
              <table
                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
              >
                <thead
                  class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                >
                  <tr>
                    <th scope="col" class="px-6 py-3">#</th>
                    <th scope="col" class="px-6 py-3">URL</th>
                    <th scope="col" class="px-6 py-3">Reference</th>
                    <th scope="col" class="px-6 py-3">Qrocde</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="(qrcode, i) in qrcodes.data"
                    :key="qrcode.id"
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                  >
                    <th
                      scope="row"
                      class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                    >
                      {{ i + 1 }}
                    </th>

                    <th
                      scope="row"
                      class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                    >
                      {{ qrcode.url }}
                    </th>
                    <th
                      scope="row"
                      class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                    >
                      {{ qrcode.reference }}
                    </th>
                    <td>
                        <img width="100" :src="`https://image-charts.com/chart?chs=250x250&cht=qr&chl=${qrcode.url+'?reference='+qrcode.reference}&choe=UTF-8`" alt="QR Code" />

                    </td>

                    <td class="flex items-center my-3">
                        <a target="_blank"
                  :href="route('qrcodes.print_single', { reference: qrcode.reference })"
                  class="bg-gray-400 rounded px-3 py-1.5 hover:bg-gray-500 font-bold mr-1 text-white"
                >
               Print
                </a>


                      <button
                       @click="deleteQrcode(qrcode.id)"
                        class="bg-red-700 rounded px-2 py-1 hover:bg-red-800 font-bold text-white"
                      >
                      <svg
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke-width="1.5"
                          stroke="currentColor"
                          class="size-6"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"
                          />
                        </svg>
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>

                <Pagination :links="qrcodes.links" class="mt-3" />

            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { useForm, usePage } from "@inertiajs/vue3";
import { ref } from "vue";

import Snackbar from "../../Components/Snackbar.vue";
import Pagination from "../../Components/Pagination.vue";

const { inertia } = usePage();

let snackbar = ref(false);
let text = ref("");

defineProps({
  qrcodes: Object,
});

components: {
  Link, Head;
}

const form = useForm({
  id: "",
  name: "",
});



const deleteQrcode = (id) => {
  if (confirm("Are you sure you want to delete this record?")) {
    return form.get(route("qrcodes.delete", id));
  }
};
</script>

