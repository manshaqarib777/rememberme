<template>
    <Head title="Home"></Head>
    <App>
        <main v-if="props.profile">
            <!-- Container START -->
            <div class="container mt-md-4">
                <div class="row g-4 row-application-container">
                    <!-- Right sidebar START -->
                    <div class="col-lg-12">
                        <div class="row g-4 parent_container">
                            <div
                                id="alert_about"
                                class="alert d-none fade col-10"
                                role="alert"
                            ></div>
                            <div class="col-sm-12 col-md-12 col-lg-12 px-0">
                                <div class="card_login_shadow px-0">
                                    <!-- Card header START -->
                                    <div
                                        class="top-card bg-white overflow-hidden"
                                    >
                                        <div role="button" id="coverPhoto">
                                            <div
                                                class="cover-photo-image-container"
                                            >
                                                <img
                                                    style="max-height: 250px"
                                                    :src="coverPictureUrl"
                                                />
                                            </div>
                                        </div>
                                        <!-- Contains all the content in the top section -->
                                        <div
                                            class="container px-0 profile-information-container"
                                        >
                                            <div
                                                class="row g-0 profile-public-view-content-container"
                                            >
                                                <!-- Profile picture container -->
                                                <div
                                                    class="profile-public-view-picture-container"
                                                >
                                                    <!-- Avatar -->
                                                    <div
                                                        role="button"
                                                        id="profileButton"
                                                    >
                                                        <div
                                                            class="profile-picture-container bg_avatar"
                                                        >
                                                            <img
                                                                class="image_profile_avatar"
                                                                alt="profile image"
                                                                style="
                                                                    border: 5px
                                                                        solid
                                                                        #fff;
                                                                    border-radius: 50%;
                                                                "
                                                                :src="
                                                                    profilePictureUrl
                                                                "
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End of profile picture container -->
                                                <!-- Information container -->
                                                <div
                                                    class="profile-public-view-information-container"
                                                >
                                                    <!-- Audio container -->
                                                    <!-- End of Audio container -->
                                                    <!-- Headline text container -->
                                                    <h4
                                                        class="profile-headline-text"
                                                    >
                                                        In Loving Memory of
                                                    </h4>
                                                    <!-- Headline text container -->
                                                    <!-- Name container -->
                                                    <h3
                                                        class="profile-name-text"
                                                    >
                                                        {{ fullName }}
                                                    </h3>
                                                    <!-- End of name container -->
                                                    <!-- Lifetime container -->
                                                    <div class="my-2 px-0">
                                                        <span
                                                            class="profile-lifetime-text"
                                                            >Lifetime:
                                                        </span>
                                                        <span
                                                            class="profile-date-text"
                                                            >{{
                                                                profile
                                                                    ? profile.birth_date
                                                                    : ""
                                                            }}
                                                            -
                                                            {{
                                                                profile
                                                                    ? profile.death_date
                                                                    : ""
                                                            }}</span
                                                        >
                                                    </div>
                                                    <!-- End of lifetime container -->
                                                    <!-- Quote container -->
                                                    <!-- End of quote container -->
                                                    <!-- Mobile veteran container -->
                                                    <div
                                                        class="profile-public-view-veteran-mobile-container"
                                                    ></div>
                                                    <!-- End of mobile veteran container -->
                                                    <!-- Profile buttons container -->
                                                    <!-- <div
                                                        class="profile-buttons-container"
                                                    >
                                                        <button
                                                            id="favorite-profile-button"
                                                            class="profile-pill favorite-button"
                                                        >
                                                            <i
                                                                id="favorite-icon"
                                                                class="fa-solid fa-heart"
                                                            ></i>
                                                            Favorite
                                                        </button>
                                                        <button
                                                            class="profile-pill"
                                                        >
                                                            <i
                                                                class="bi bi-box-arrow-up"
                                                                style="
                                                                    color: #d7a229;
                                                                "
                                                            ></i>
                                                            Share
                                                        </button>
                                                    </div> -->
                                                    <!-- End of profile buttons container -->
                                                </div>
                                                <!-- End of information container -->
                                                <!-- Desktop veteran container -->
                                                <div
                                                    class="profile-public-view-veteran-container"
                                                ></div>
                                                <!-- End of desktop veteran container -->
                                                <!-- Desktop grid item -->
                                                <div
                                                    class="profile-public-view-grid-item"
                                                ></div>
                                                <!-- End of desktop grid item -->
                                            </div>
                                        </div>
                                        <!-- End of contains all the content in the top section -->
                                    </div>
                                    <div
                                        class="col-12 p-2 bg-white bottom-card"
                                    >
                                        <div class="p-3">
                                            <div
                                                class="container-medallion-tab-public-view"
                                            >
                                                <!-- Tab nav line START -->
                                                <ul
                                                    id="tab-list"
                                                    class="nav nav-tabs nav-bottom-line justify-content-center medallion-tab-public-view"
                                                >
                                                    <li class="nav-item">
                                                        <a
                                                            class="nav-link active"
                                                            data-bs-toggle="tab"
                                                            href="#tab-bio"
                                                        >
                                                            Bio
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a
                                                            class="nav-link"
                                                            data-bs-toggle="tab"
                                                            href="#tab-media"
                                                            data-load="media"
                                                        >
                                                            Media
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Tab nav line START -->
                                        </div>
                                        <!-- Album Tab content START -->
                                        <div
                                            id="tabs-content"
                                            class="tab-content mb-0 p-0"
                                        >
                                            <div
                                                class="tab-pane fade active show"
                                                id="tab-bio"
                                            >
                                                <!-- Tab bar -->
                                                <div class="p-3">
                                                    <div
                                                        class="container-medallion-tab-public-view"
                                                    >
                                                        <ul
                                                            class="nav nav-tabs nav-bottom-line medallion-tab-public-view"
                                                            style="border: none"
                                                        >
                                                            <li
                                                                class="nav-item"
                                                            >
                                                                <a
                                                                    class="nav-link active"
                                                                    data-bs-toggle="tab"
                                                                    href="#tab-about-me"
                                                                >
                                                                    {{
                                                                        fullName
                                                                    }}&#39;
                                                                    about info
                                                                </a>
                                                            </li>
                                                            <li
                                                                class="nav-item"
                                                            >
                                                                <a
                                                                    class="nav-link"
                                                                    data-bs-toggle="tab"
                                                                    href="#tab-details"
                                                                    data-load="photos"
                                                                >
                                                                    Details
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- Tab bar content -->
                                                <div
                                                    class="tab-content mb-0 py-0 px-4"
                                                >
                                                    <!-- About me tab -->
                                                    <div
                                                        class="tab-pane fade show active"
                                                        id="tab-about-me"
                                                    >
                                                        <div
                                                            class="row g-3 bio"
                                                        >
                                                            <p>
                                                                {{
                                                                    profile
                                                                        ? profile.bio
                                                                        : ""
                                                                }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <!-- Details tab -->
                                                    <div
                                                        class="tab-pane fade"
                                                        id="tab-details"
                                                    >
                                                        <div
                                                            class="row g-3 bio"
                                                        >
                                                            <p>
                                                                {{
                                                                    profile
                                                                        ? profile.description
                                                                        : ""
                                                                }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="tab-pane fade"
                                                id="tab-media"
                                            >
                                                <div
                                                    class="row g-2"
                                                    id="media-tab-public"
                                                >
                                                <v-col
                                                    v-for="(image, index) in profileImages"
                                                    :key="index"
                                                    cols="12"
                                                    sm="6"
                                                    md="4"
                                                    >

                                                    <div
                                                            class="public-media-container"
                                                        >
                                                            <div
                                                                class="load-media-image-container media-tumbnail-container"
                                                            >
                                                                <div
                                                                    class="image-on-media-tab"
                                                                    :style="{backgroundImage: `url(${image})`}"
                                                                ></div>
                                                            </div>
                                                        </div>


                                                    </v-col>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card News END -->
                    </div>
                </div>
                <!-- Row END -->
            </div>
            <!-- Container END -->
        </main>
        <!-- <v-container>
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
      </v-container> -->
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

const coverPictureUrl = computed(() =>
    props.profile ? props.profile.cover_photo : ""
);
const profilePictureUrl = computed(() =>
    props.profile ? props.profile.profile_picture : ""
);

const profileImages = computed(() => {
    return (profileImages.value = props.profile ? JSON.parse(props.profile.images).map(
        (image) => image.replace("/", "/")
    ) : []);
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
