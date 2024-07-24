<template>
  <Head title="Home"></Head>
  <App>
    <v-container>
      <h2 class="text-4xl">Remember Me</h2>
    </v-container>

    <v-container class="d-flex justify-center align-center fill-height">
      <v-card style="width: 100%" class="elevation-5">
        <v-img
          :src="coverPictureUrl"
          style="width: 100%"
          class="cover-photo"
        ></v-img>
        <v-avatar size="96" class="elevation-10 profile-avatar">
          <img class="mt-0" :src="profilePictureUrl" />
        </v-avatar>
        <v-card-text class="text-center card-content">
          <h3 class="headline mb-1">{{ fullName }}</h3>
          <div class="grey--text">{{ profile ? profile.title : "" }}</div>
        </v-card-text>
        <v-card class="mt-5" v-if="profile">
          <v-tabs
            v-model="tab"
            align-tabs="center"
            color="deep-purple-accent-4"
          >
            <v-tab :value="1" @click="changeTab(1)">Bio</v-tab>
            <v-tab :value="2" @click="changeTab(2)">Media</v-tab>
          </v-tabs>

          <div :value="1" v-show="tab === 1">
            <v-container fluid class="text-center">
              <v-list dense>
                <v-list-item>
                  <v-list-item-content>
                    <h2>Bio</h2>
                    <v-list-item-title>{{
                      profile ? profile.bio : ""
                    }}</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>

                <v-divider></v-divider>

                <v-list-item>
                  <v-row justify="space-between">
                    <v-col cols="6">
                      <strong>Birth Date:</strong>
                    </v-col>
                    <v-col cols="6" class="text-right">
                      {{ profile ? profile.birth_date : "" }}
                    </v-col>
                  </v-row>
                </v-list-item>

                <v-divider></v-divider>

                <v-list-item>
                  <v-row justify="space-between">
                    <v-col cols="6">
                      <strong>Death Date:</strong>
                    </v-col>
                    <v-col cols="6" class="text-right">
                      {{ profile ? profile.death_date : "" }}
                    </v-col>
                  </v-row>
                </v-list-item>

                <v-divider></v-divider>

                <v-list-item>
                  <v-row justify="space-between">
                    <v-col cols="6">
                      <strong>Description:</strong>
                    </v-col>
                    <v-col cols="6" class="text-right">
                      {{ profile ? profile.description : "" }}
                    </v-col>
                  </v-row>
                </v-list-item>

                <v-divider></v-divider>

                <v-list-item>
                  <v-row justify="space-between">
                    <v-col cols="6">
                      <strong>Relationship:</strong>
                    </v-col>
                    <v-col cols="6" class="text-right">
                      {{ profile ? profile.relationship : "" }}
                    </v-col>
                  </v-row>
                </v-list-item>
              </v-list>


            </v-container>
          </div>

          <!-- Media Tab -->
          <div :value="2" v-show="tab === 2">
            <v-container fluid class="text-center">
              <v-row>
                <v-col
                  v-for="(image, index) in profileImages"
                  :key="index"
                  cols="12"
                  sm="6"
                  md="4"
                >

                  <v-img
                    :src="image"
                    aspect-ratio="1"
                    contain
                    class="gallery-item"
                    @click="image"
                  >
                    <template v-slot:placeholder>
                      <v-row
                        class="fill-height ma-0"
                        align="center"
                        justify="center"
                      >
                        <v-progress-circular
                          indeterminate
                          color="grey lighten-5"
                        ></v-progress-circular>
                      </v-row>
                    </template>
                  </v-img>
                </v-col>
              </v-row>
            </v-container>
          </div>
        </v-card>
      </v-card>
    </v-container>
  </App>
</template>

<script setup>
import App from "./Layouts/App.vue";
import { Head } from "@inertiajs/vue3";
import { ref, computed } from "vue";
components: {
  App, Head;
}

let props = defineProps({
  profile: Object,
});

const tab = ref(1);
const show = ref(true);

const changeTab = (newTab) => {
  tab.value = newTab;
  show.value = true;
};
console.log(props.profile);

const coverPictureUrl = computed(() =>
  props.profile ? props.profile.cover_photo : ""
);
const profilePictureUrl = computed(() =>
  props.profile ? props.profile.profile_picture : ""
);

const profileImages = computed(() => {
  return (profileImages.value = JSON.parse(props.profile.images).map((image) =>
    image.replace("/", "/")
  ));
});

const fullName = computed(() => {
  return `${props.profile ? props.profile.first_name : ""} ${
    props.profile ? props.profile.middle_name : ""
  } ${props.profile ? props.profile.last_name : ""}`;
});

let snackbar = ref(false);
let text = ref("");
</script>

<style>
.profile-avatar {
  margin-top: -35px;
}
</style>


