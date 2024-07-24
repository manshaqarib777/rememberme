<template>
  <Head title="Profile"></Head>
  <App>
    <h1 class="text-[30px] font-bold text-center">Manage</h1>
    <p class="text-center mt-3">
      Set up your account and manage your information.
    </p>
    <v-container>
    <v-row justify="end">
      <v-col cols="auto">

        <Link :href="route('LinkQrcode')" class="text-white">
              <v-btn color="primary" class="right">
                Create New
              </v-btn>
            </Link>
      </v-col>
    </v-row>
  </v-container>
    <v-card class="mt-5">
      <v-tabs v-model="tab" align-tabs="center" color="deep-purple-accent-4">
        <v-tab :value="1" @click="changeTab(1)">Profile</v-tab>
        <v-tab :value="2" @click="changeTab(2)">Remember Me</v-tab>
      </v-tabs>

      <div :value="1" v-show="show && tab === 1">
        <v-container fluid>
          <form @submit.prevent="updateProfile" class="mt-6">
            <v-text-field v-model="profile.name" label="Name"></v-text-field>
            <InputError :message="profile.errors.name" class="text-red" />
            <v-text-field
              v-model="profile.email"
              readonly=""
              label="E-mail"
            ></v-text-field>
            <InputError :message="profile.errors.email" class="text-red" />
            <v-text-field
              v-model="profile.contact"
              label="Phone Number"
            ></v-text-field>
            <v-text-field
              v-model="profile.address"
              label="Address"
            ></v-text-field>
            <v-text-field v-model="profile.state" label="State"></v-text-field>
            <v-text-field v-model="profile.city" label="City"></v-text-field>

            <v-btn
              class="me-4"
              type="submit"
              color="primary"
              :disabled="profileloading"
              :loading="profileloading"
            >
              submit
            </v-btn>
          </form>

          <hr class="mt-6" />
          <h2 class="text-lg font-medium text-gray-900 mt-4">
            Update Password
          </h2>
          <form @submit.prevent="updatePassword" class="mb-6">
            <div>
              <InputLabel for="current_password" value="Current Password" />

              <v-text-field
                id="current_password"
                ref="currentPasswordInput"
                v-model="form.current_password"
                type="password"
                autocomplete="current-password"
              />

              <InputError
                :message="form.errors.current_password"
                class="text-red"
              />
            </div>

            <div>
              <InputLabel for="password" value="New Password" />

              <v-text-field
                id="password"
                ref="passwordInput"
                v-model="form.password"
                type="password"
                autocomplete="new-password"
              />

              <InputError :message="form.errors.password" class="text-red" />
            </div>

            <div>
              <InputLabel
                for="password_confirmation"
                value="Confirm Password"
              />

              <v-text-field
                id="password_confirmation"
                v-model="form.password_confirmation"
                type="password"
                autocomplete="new-password"
              />
              <InputError
                :message="form.errors.password_confirmation"
                class="text-red"
              />
            </div>

            <div class="flex items-center gap-4">
              <v-btn
                class="me-4"
                type="submit"
                color="primary"
                :disabled="loading"
                :loading="loading"
              >
                submit
              </v-btn>
            </div>
          </form>
        </v-container>
      </div>
      <div :value="2" v-show="show && tab === 2">
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
      </div>
    </v-card>

    <v-snackbar v-model="snackbar" :timeout="2000">
      {{ text }}

      <template v-slot:actions>
        <v-btn color="pink" variant="text" @click="snackbar = false">
          Close
        </v-btn>
      </template>
    </v-snackbar>
  </App>
</template>


<script setup>
import App from "./Layouts/App.vue";

import { Head, Link, useForm, usePage } from "@inertiajs/vue3";

components: {
  App;
}

let props = defineProps({
  qrcodes: Object,
});

console.log(props.qrcodes);

import { ref } from "vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";

const tab = ref(2);
const show = ref(true);

const changeTab = (newTab) => {
  tab.value = newTab;
  show.value = true;
};
const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
  current_password: "",
  password: "",
  password_confirmation: "",
});

const user = usePage().props.auth.user;

const profile = useForm({
  name: user.name,
  email: user.email,
  contact: user.contact,
  address: user.address,
  city: user.city,
  state: user.state,
});

const snackbar = ref(false);
const text = ref("");
let loading = ref(false);
let profileloading = ref(false);
const updateProfile = () => {
  profileloading.value = true;

  profile.post(route("customer.profile.update"), {
    preserveScroll: true,

    onSuccess: () => {
      text.value = "Profile updated successfully";
      snackbar.value = true;
      profileloading.value = false;
    },
    onError: () => {
      text.value = "Something went wrong";
      snackbar.value = true;
      profileloading.value = false;
    },
  });
};

const updatePassword = () => {
  loading.value = true;
  form.put(route("password.update"), {
    preserveScroll: true,
    onSuccess: () => {
      text.value = "Password updated successfully";
      snackbar.value = true;
      form.reset();
      loading.value = false;
    },
    onError: () => {
      loading.value = false;
      if (form.errors.password) {
        form.reset("password", "password_confirmation");
        passwordInput.value.focus();
      }
      if (form.errors.current_password) {
        form.reset("current_password");
        currentPasswordInput.value.focus();
      }
    },
  });
};
</script>
