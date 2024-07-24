<template>
  <div>
    <Head title="Link Qrcode" />
    <App>
      <div class="mt-5 mx-auto">
        <div class="text-center">
          <h1>Your Soul Star has <br />not been linked yet.</h1>
          <p class="mt-5 mb-4">
            Please scan the QR-Code to link your account to the Soul Star.
          </p>
          <v-card class="v-card">
            <QrcodeStream @detect="onDetect" id="video-container" />
          </v-card>
          <v-btn prepend-icon="mdi-camera" rounded="lg" size="x-large">
            <template v-slot:prepend>
              <v-icon color="black">mdi-camera</v-icon>
            </template>
            Connect Now
          </v-btn>

          <div class="mt-7 mb-6">or</div>

          <h1>Don't have a <br />Soul Star yet?</h1>
          <p class="my-4">
            Order now and link it to your account to create a memorial page.
          </p>
          <a
            href="https://rememberme.com.my/"
            target="_blank"
            class="text-white"
          >
            <v-btn rounded="lg" color="darkblue" size="x-large">
              Buy Now
            </v-btn>
          </a>
        </div>
      </div>
    </App>
  </div>
</template>

<script setup>
import { onMounted, ref } from "vue";
import App from "./Layouts/App.vue";
import { Head } from "@inertiajs/vue3";
import { QrcodeStream } from "vue3-qrcode-reader";

components: {
  QrcodeStream;
}

function onDetect(decodeString) {
  console.log(decodeString);
}


// onMounted(() => {
//     onDetect();
// });
</script>

<style scoped>
#video-container,
.v-card {
  width: 100%;
  max-width: 640px;
  margin: auto;
}
</style>
