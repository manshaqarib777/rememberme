<template>
  <Head title="Passedaway Profile"></Head>
  <App>
    <h1 class="text-[30px] font-bold text-center">Rememberme Profile</h1>

    <v-card class="mt-5">
      <v-container>
        <v-form @submit.prevent="submitForm">
          <!-- First Name -->
          <v-row>
            <v-col cols="12" sm="6">
              <v-text-field
                v-model="form.first_name"
                label="First Name"
                required
              ></v-text-field>
            </v-col>
            <!-- Middle Name -->
            <v-col cols="12" sm="6">
              <v-text-field
                v-model="form.middle_name"
                label="Middle Name"
              ></v-text-field>
            </v-col>
          </v-row>

          <!-- Last Name -->
          <v-row>
            <v-col cols="12" sm="6">
              <v-text-field
                v-model="form.last_name"
                label="Last Name"
                required
              ></v-text-field>
            </v-col>
            <!-- Title -->
            <v-col cols="12" sm="6">
              <v-text-field v-model="form.title" label="Title"></v-text-field>
            </v-col>
          </v-row>

          <!-- Relationship -->
          <v-row>
            <v-col cols="12">
              <v-text-field
                v-model="form.relationship"
                label="Relationship"
              ></v-text-field>
            </v-col>
          </v-row>

          <!-- Profile Picture -->
          <v-row>
            <v-col cols="12">
              <v-file-input
                v-model="form.profile_picture"
                label="Profile Picture"
                accept="image/*"
                ref="profileInput"
                @change="handleprofileFileChange"
              ></v-file-input>
              <img :src="props.profile ? props.profile.profile_picture : ''" />
            </v-col>
          </v-row>

          <!-- Description -->
          <v-row>
            <v-col cols="12">
              <v-textarea
                v-model="form.description"
                label="Description"
              ></v-textarea>
            </v-col>
          </v-row>

          <!-- Bio -->
          <v-row>
            <v-col cols="12">
              <v-textarea v-model="form.bio" label="Bio"></v-textarea>
            </v-col>
          </v-row>

          <!-- Birth Date -->
          <v-row>
            <v-col cols="12" sm="6">
              <label for="">Birth Date</label>
              <input
                type="date"
                class="date"
                v-model="form.birth_date"
                label="Birth Date"
              />
            </v-col>
            <!-- Death Date -->
            <v-col cols="12" sm="6">
              <label for="">Death Date</label>
              <input
                type="date"
                class="date"
                v-model="form.death_date"
                label="Death Date"
              />
            </v-col>
          </v-row>

          <!-- Allow Comments -->
          <v-row>
            <v-col cols="12">
              <v-checkbox
                v-model="form.allow_comments"
                label="Allow Comments"
              ></v-checkbox>
            </v-col>
          </v-row>

          <!-- Append Images -->
          <v-row>
            <v-col cols="12">
              <v-file-input
                v-model="form.images"
                label="Select Photos"
                multiple
                accept="image/*"
              ></v-file-input>
              <div v-if="props.profile">
                <img
                  v-for="image in props.profile.images"
                  :key="image"
                  :src="image"
                  alt="Image"
                  class="gallery-image"
                />

              </div>
            </v-col>
          </v-row>

          <!-- Background Image -->
          <v-row>
            <v-col cols="12">
              <v-file-input
                v-model="form.cover_photo"
                label="Cover Photo"
                accept="image/*"
                ref="coverfileInput"
                @change="handlecoverFileChange"
              ></v-file-input>
              <img :src="props.profile ? props.profile.cover_photo : ''" />
            </v-col>
          </v-row>

          <!-- Submit Button -->
          <v-row>
            <v-col cols="12">
              <v-btn type="submit" color="primary">Submit</v-btn>
            </v-col>
          </v-row>
        </v-form>
      </v-container>
    </v-card>

    <v-snackbar v-model="snackbar" :timeout="2000">
      {{ text }}
      <template v-slot:actions>
        <v-btn color="pink" variant="text" @click="snackbar = false"
          >Close</v-btn
        >
      </template>
    </v-snackbar>
  </App>
</template>

  <script setup>
import { Head, useForm, usePage } from "@inertiajs/vue3";
import { ref } from "vue";
import axios from "axios";
import App from "./Layouts/App.vue";

components: {
  Head, App;
}

const { props } = usePage();
const form = useForm({
  first_name: props.profile ? props.profile.first_name : "",
  middle_name: props.profile ? props.profile.middle_name : "",
  last_name: props.profile ? props.profile.last_name : "",
  title: props.profile ? props.profile.title : "",
  relationship: props.profile ? props.profile.relationship : "",
  profile_picture: null,
  description: props.profile ? props.profile.description : "",
  bio: props.profile ? props.profile.bio : "",
  birth_date: props.profile ? props.profile.birth_date : null,
  death_date: props.profile ? props.profile.death_date : null,
  allow_comments: props.profile ? props.profile.allow_comments : false,
  images: [],
  cover_photo: null,
});

const profileInput = ref(null);
const handleprofileFileChange = () => {
  form.profile_picture = profileInput.value.files[0];
};

const coverfileInput = ref(null);
const handlecoverFileChange = () => {
  form.cover_photo = coverfileInput.value.files[0];
};

const snackbar = ref(false);
const text = ref("");

const submitForm = async () => {
  try {
    const formData = new FormData();
    const birth_date = new Date(form.birth_date).toISOString().split("T")[0];
    const death_date = new Date(form.death_date).toISOString().split("T")[0];
    console.log(birth_date);
    formData.append("first_name", form.first_name);
    formData.append("middle_name", form.middle_name);
    formData.append("last_name", form.last_name);
    formData.append("title", form.title);
    formData.append("relationship", form.relationship);
    formData.append("user_id", props.auth.user.id);

    if (form.profile_picture) {
      formData.append("profile_picture", form.profile_picture);
    }
    formData.append("description", form.description);
    formData.append("bio", form.bio);
    formData.append("birth_date", birth_date);
    formData.append("death_date", death_date);
    formData.append("allow_comments", form.allow_comments);

    if (form.images && form.images.length) {
      for (let i = 0; i < form.images.length; i++) {
        formData.append("images[]", form.images[i]);
      }
    }

    if (form.cover_photo) {
      formData.append("cover_photo", form.cover_photo);
    }

    let response;
    if (props.profile) {
      response = await axios.post(
        route("passedaway.profile.store", { id: props.profile.id }),
        formData,
        {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        }
      );
    } else {
      response = await axios.post(route("passedaway.profile.store"), formData, {
        headers: {
          "Content-Type": "multipart/form-data",
        },
      });
    }

    text.value = "Profile saved successfully";
    snackbar.value = true;
  } catch (error) {
    text.value = "Failed to save profile";
    snackbar.value = true;
    console.error("Error:", error);
  }
};
</script>

<style>
.date {
  border: 1px solid gray;
  border-radius: 5px;
  padding: 5px;
  width: 100%;
}
</style>
