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
            <QrcodeStream
              v-if="cameraActive"
              @detect="onDetect"
              id="video-container"
            />
          </v-card>
          <v-btn
            @click="toggleCamera"
            prepend-icon="mdi-camera"
            rounded="lg"
            size="x-large"
            class="mt-2"
          >
            <template v-slot:prepend>
              <v-icon color="black">mdi-camera</v-icon>
            </template>
            {{ cameraActive ? "Disconnect" : "Connect Now" }}
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
  <!-- Dialog to show the qrcode information -->
  <v-dialog v-model="dialog" width="auto">
    <v-card>
      <v-card-title>QR Code Information</v-card-title>
      <v-card-text>
        <div v-if="qrCodeData">
          <p><strong>Reference:</strong> {{ qrCodeData.reference }}</p>
          <!-- Add other fields as necessary -->

          <!-- Additional QR code details can be added here -->
        </div>
        <div v-else>
          <p>No data found for this reference.</p>
        </div>
      </v-card-text>
      <v-card-actions>
        <v-btn
          v-if="qrCodeData"
          color="primary"
          @click="assignQrCode"
          :loading="loading"
          :disabled="loading"
        >
          Connect
        </v-btn>

        <v-btn class="ms-auto" color="red" text="Close" @click="dialog = false"></v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>

  <!-- End dialog -->
  <v-snackbar v-model="snackbar" :timeout="4000">
    {{ text }}

    <template v-slot:actions>
      <v-btn color="pink" variant="text" @click="snackbar = false">
        Close
      </v-btn>
    </template>
  </v-snackbar>
</template>

  <script setup>
import { ref } from "vue";
import App from "./Layouts/App.vue";
import { Head, usePage } from "@inertiajs/vue3";
import { QrcodeStream } from "vue3-qrcode-reader";
import axios from "axios";

const cameraActive = ref(false);

function toggleCamera() {
  cameraActive.value = !cameraActive.value;
}

const snackbar = ref(false);
const text = ref("");
const dialog = ref(false);
const loading = ref(false);
const qrCodeData = ref(null);

async function onDetect(promiseResult) {
  try {
    const result = await promiseResult;
    const content = result.content;
    console.log(content);

    const urlStr = content.startsWith("http") ? content : `http://${content}`;

    const url = new URL(urlStr);
    const reference = url.searchParams.get("reference");
    console.log(reference);

    // Fetch information using the reference
    const response = await axios.get(`/qrcode_reference/${reference}`);
    console.log("response",response);
    if (response.data.error) {
      text.value = response.data.error;
      snackbar.value = true;
    } else {
      qrCodeData.value = response.data;
      dialog.value = true;
    }
  } catch (error) {

    text.value = error.response.data.error || "Invalid URL";
    snackbar.value = true;


    console.error("Error:", error);
  }
}

const { props } = usePage();

async function assignQrCode() {
  loading.value = true; // Start the loading state

  try {
    const response = await axios.post('/link_qrcode', {
      userId: props.auth.user.id,
      qrcode_id: qrCodeData.value.id
    });
    text.value = "QR code connected successfully";
    snackbar.value = true;
    dialog.value = false; // Close the dialog
    cameraActive.value = false;
  } catch (error) {
    text.value = error.response.data.error || "Failed to assign QR code";
    snackbar.value = true;
    console.error("Error:", error);
  } finally {
    loading.value = false; // End the loading state
  }
}
</script>

  <style scoped>
#video-container,
.v-card {
  width: 100%;
  max-width: 640px;
  margin: auto;
}
</style>
