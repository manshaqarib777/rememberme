<template>
        <v-container fluid class="text-center">
          <template v-if="!qrcodes || qrcodes.length === 0">
            <h2 class="mt-3 text-center">No Soul Star <br />created</h2>

            <Link :href="route('LinkQrcode')" class="text-white">
              <v-btn rounded="lg" class="mt-4" color="darkblue" size="large">
                Create New
              </v-btn>
            </Link>
          </template>

          <!-- Render qrcodes in a table if they exist -->
          <template v-else>
            <v-table fixed-header>
              <thead>
                <tr>
                  <th class="text-center">Reference</th>
                  <th class="text-center">Qrcode</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="qrcode in qrcodes" :key="qrcode.id">
                  <td>{{ qrcode.qrcode.reference }}</td>
                  <td>
                    <img
                      width="100"
                      :src="`https://image-charts.com/chart?chs=250x250&cht=qr&chl=${
                        qrcode.qrcode.url + '?reference=' + qrcode.qrcode.reference
                      }&choe=UTF-8`"
                      alt="QR Code"
                    />
                  </td>
                </tr>
              </tbody>
            </v-table>
          </template>
        </v-container>
</template>

<script setup>

import { Link} from "@inertiajs/vue3";
let props = defineProps({
    qrcodes: Object,
});
</script>
