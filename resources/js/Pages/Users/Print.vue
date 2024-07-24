
<template>
  <Head title="Print Qrcode" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Add Qrcode
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2">
          <div class="p-6 text-gray-900">
            {{ qrcode.reference }}

            <img
              class="rotate-45"
              width="250"
              style="position: relative; top: 520px; left: 280px; width: 200px"
              :src="`https://image-charts.com/chart?chs=250x250&color=red&cht=qr&chl=${
                qrcode.url + '/' + qrcode.reference
              }&choe=UTF-8`"
              alt="QR Code"
            />

             

            <img width="100%" :src="cardFront" alt="" />
            <img width="100%" :src="cardBack" alt="" />
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import InputError from "@/Components/InputError.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";

components: {
  Head;
}

defineProps({
  cardFront: Object,
  cardBack: Object,
  qrcode: Object,
});
</script>



