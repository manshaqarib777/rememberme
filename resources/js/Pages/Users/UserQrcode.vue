
<template>
  <Head title="Qrcodes" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Qrcodes ({{ user.name }})
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <v-row class="ml-1">
          <v-dialog v-model="dialog" persistent width="1024">
            <template v-slot:activator="{ props }">
              <v-btn
                variant="elevated"
                color="primary"
                v-bind="props"
                class="mb-2"
              >
                Assign New
              </v-btn>
            </template>
            <v-card>
              <v-card-title>
                <span class="text-h5">User({{ user.name }})</span>
              </v-card-title>
              <form @submit.prevent="AddAssignQrcode">
                <div class="w- ml-3 mr-3">
                  <label
                    for="qrcode"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                  >
                    Select a QR code
                  </label>
                  <select
                    v-model="form.qrcode_id"
                    id="qrcode"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  >
                    <option disabled value="">Choose a QR code</option>
                    <option
                      v-for="qrcode in qrcodes"
                      :key="qrcode.id"
                      :value="qrcode.id"
                    >
                      {{ qrcode.reference }}
                    </option>
                  </select>
                  <InputError :message="form.errors.qrcode_id" class="mt-2" />
                </div>

                <v-card-actions>
                  <v-spacer></v-spacer>
                  <v-btn
                    color="blue-darken-1"
                    variant="text"
                    @click="dialog = false"
                  >
                    Close
                  </v-btn>
                  <v-btn color="blue-darken-1" variant="text" type="submit">
                    Save
                  </v-btn>
                </v-card-actions>
              </form>
            </v-card>
          </v-dialog>
        </v-row>


        <v-snackbar v-model="snackbar" :timeout="2000">
          {{ text }}

          <template v-slot:actions>
            <v-btn color="pink" variant="text" @click="snackbar = false">
              Close
            </v-btn>
          </template>
        </v-snackbar>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2">
          <div class="p-6 text-gray-900">
            <div class="text-1xl font-bold">User ({{ user.name }}) Qrcodes</div>
            <table
              class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
            >
              <thead
                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
              >
                <tr>
                  <th scope="col" class="px-6 py-3">#</th>
                  <th scope="col" class="px-6 py-3">Date</th>
                  <th scope="col" class="px-6 py-3">Qrcode</th>
                  <th scope="col" class="px-6 py-3">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr
                      v-for="(qrcode, i) in user_qrcodes"
                      :key="qrcode.id"
                      class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                    >
                      <th
                        scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                      >
                        {{ i + 1 }}
                      </th>
                      <th
                        scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                      >
                        {{ qrcode.created_at }}
                      </th>

                      <th
                        scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                      >
                        {{ qrcode.qrcode.reference }}
                      </th>


                      <td
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                      >
                        <button
                          @click="deleteRecord(qrcode.id)"
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

            <!-- <Pagination :links="users.links" class="mt-3" /> -->
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

  <script setup>
import InputError from "@/Components/InputError.vue";
import Pagination from "@/Components/Pagination.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { ref } from "vue";

components: {
  Head;
}
let dialog = ref(false);

let props = defineProps({
  user: Object,
  qrcodes: Array,
  user_qrcodes: Object,
});


const form = useForm({
  userId: props.user.id,
  qrcode_id: "",
});

const snackbar = ref(false);
const text = ref("");

function AddAssignQrcode() {
  form.post(route("user.assign.store"), {
    onSuccess: () => {
      text.value = "QR code assigned successfully";
      snackbar.value = true;
      dialog.value = false;
      form.reset("qrcode_id");
    },
    onError: (errors) => {
      if (errors.qrcode_id) {
        text.value = errors.qrcode_id;
        snackbar.value = true;
      }
    },
  });
}

const deleteRecord = (id) => {
  if (confirm("Are you sure you want to delete this record?")) {
    console.log(id)
    form.get(route("user.qrcode.delete", id), {
      onSuccess: () => {
        text.value = "QR code deleted successfully";
        snackbar.value = true;
      },
      onError: (errors) => {
        text.value = "Failed to delete the QR code";
        snackbar.value = true;
      }
    });
  }
};

</script>


