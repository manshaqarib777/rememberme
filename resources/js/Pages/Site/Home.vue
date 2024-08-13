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
                                                        {{
                                                            profile
                                                                ? profile.title
                                                                : ""
                                                        }}. {{ fullName }}
                                                    </h3>
                                                    <!-- End of name container -->
                                                    <!-- Lifetime container -->
                                                    <div class="my-2 px-0">
                                                        <span
                                                            class="profile-lifetime-text"
                                                            >Relationship:
                                                        </span>
                                                        <span
                                                            class="profile-date-text"
                                                            >{{
                                                                profile
                                                                    ? profile.relationship
                                                                    : ""
                                                            }}</span
                                                        >
                                                    </div>
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
                                                        v-for="(
                                                            file, index
                                                        ) in profile.media"
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
                                                                <YouTubeVideo  theme="dark" :autoPlay="true" :videoLink="file.video_url" videoId="FMOJY4zP9Bo" :mediaId="file.id" v-if="file.type == 'video'" />
                                                                <div
                                                                    class="image-on-media-tab"
                                                                    :style="{
                                                                        backgroundImage: `url(${file.file_path})`,
                                                                    }"
                                                                    v-else
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
    </App>
</template>

<script setup>
import App from "./Layouts/App.vue";
import { Head } from "@inertiajs/vue3";
import { ref, computed } from "vue";
import YouTubeVideo from "@/Components/YouTubeVideo.vue";
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
    props.profile && props.profile.cover_photo ? props.profile.cover_photo : route("home") + "/image-cover.jpg"
);
const profilePictureUrl = computed(() =>
    props.profile && props.profile.profile_picture ? props.profile.profile_picture : route("home") + "/profile-photo.jpeg"
);


const fullName = computed(() => {
    return `${props.profile && props.profile.first_name ? props.profile.first_name : ""} ${
        props.profile && props.profile.middle_name ? props.profile.middle_name : ""
    } ${props.profile && props.profile.last_name ? props.profile.last_name : ""}`;
});

let snackbar = ref(false);
let text = ref("");
</script>

<style>
.profile-avatar {
    margin-top: -35px;
}
</style>
