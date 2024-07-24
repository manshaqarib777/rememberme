
<template>
  <Head title="Update File" />

  <AuthenticatedLayout>
    <template>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Update File
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2">
          <div class="p-6 text-gray-900">
            <form
              class="w-full"
              @submit.prevent="form.post(route('file.update'))"
            >
              <div class="mb-5">
                <label
                  for="file"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                  >File</label
                >

                <input
                  type="file"
                  id=""
                  @input="form.file = $event.target.files[0]"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder=""
                  :class="{ 'border-red-500': form.errors.file }"
                />
                <img :src="getImageUrl('files',file.file)" alt="File Image" class="w-20 h-20 mt-2 object-cover rounded">
                <progress
                  v-if="form.progress"
                  :value="form.progress.percentage"
                  max="100"
                >
                  {{ form.progress.percentage }}%
                </progress>
                <div class="text-red-700" v-if="form.errors.file">
                  {{ form.errors.file }}
                </div>
              </div>

              <button
                type="submit"
                class="text-white bg-blue-700 mt-2 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                :disabled="form.processing"
              >
                Submit
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { getImageUrl } from "../../Components/FileUtils.vue";

components: {
  Head,getImageUrl
}

const props = defineProps(['file'])
console.log(props.file)
const form = useForm({
  fileId: props.file.id,
  file: props.file.file,
});
</script>


