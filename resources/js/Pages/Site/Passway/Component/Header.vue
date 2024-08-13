<template>
    <!-- Card START -->
    <div class="top-card">
        <!-- Cover photo container START -->
        <div class="cover-photo-container rounded-top overflow-hidden">
            <div class="cover-photo-image-container">
                <img style="max-height: 250px" :src="coverPictureUrl" />
            </div>
            <!-- Cover photo buttons desktop -->
            <div class="cover-photo-buttons">
                <button
                    class="btn cover-photo-button"
                    id="edit_cover_photo"
                    @click="triggerFileInputCover"
                >
                    <i class="bi bi-upload me-1"></i>
                    Update Cover Photo
                </button>
                <input
                    ref="fileInputCover"
                    id="file_open_account_cover_photo"
                    type="file"
                    accept="image/*"
                    class="d-none input-cover-photo"
                    @change="uploadCoverPhoto"
                />
            </div>
            <!-- Cover photo buttons mobile -->
            <div class="cover-photo-buttons-mobile">
                <button
                    class="btn cover-photo-button"
                    id="edit_cover_photo_mobile"
                    @click="triggerFileInputCover"
                >
                    <i class="bi bi-upload"></i>
                </button>
                <input
                    id="file_open_account_cover_photo"
                    type="file"
                    accept="image/*"
                    class="d-none input-cover-photo"
                />
            </div>
        </div>
        <!-- Cover photo container END -->

        <!-- Content outer container -->
        <div class="container px-0 bg-white profile-settings-outer-container">
            <!-- Content inner container -->
            <div class="profile-settings-inner-container">
                <!-- Media picture container -->
                <div class="profile-settings-image-container">
                    <div class="profile-settings-image-and-button-container">
                        <div class="profile-picture-container bg_avatar">
                            <img
                                class="image_profile_avatar"
                                alt="profile image"
                                style="
                                    border: 5px solid #fff;
                                    border-radius: 50%;
                                "
                                :src="profilePictureUrl"
                            />
                        </div>
                        <button
                            type="button"
                            id="edit_account_image"
                            class="edit_image_account settings_update_photo"
                            @click="triggerFileInputProfile"
                        >
                            <i class="bi bi-pencil-fill"></i>
                        </button>
                    </div>
                    <input
                        id="file_open_account_image"
                        type="file"
                        accept="image/*"
                        class="d-none input-account-image"
                        ref="fileInputProfile"
                        @change="uploadProfilePhoto"
                    />
                </div>
                <!-- End of profile picture container -->

                <!-- Veteran icon on desktop view -->
                <!-- End of veteran icon on desktop view -->

                <!-- Info container -->
                <div class="profile-settings-info-container">
                    <!-- Audio container -->
                    <!-- End of Audio container -->
                    <h4 class="profile-headline-text">In Loving Memory of</h4>
                    <!-- Headline text container -->
                    <!-- Name container -->
                    <h3 class="profile-name-text">
                        {{ props.profile ? props.profile.title : "" }}.
                        {{ fullName }}
                    </h3>
                    <!-- End of name container -->
                    <!-- Lifetime container -->
                    <div class="my-2 px-0">
                        <span class="profile-lifetime-text"
                            >Relationship:
                        </span>
                        <span class="profile-date-text">{{
                            profile ? profile.relationship : ""
                        }}</span>
                    </div>
                    <div class="my-2 px-0">
                        <span class="profile-lifetime-text">Lifetime: </span>
                        <span class="profile-date-text"
                            >{{ profile ? profile.birth_date : "" }}
                            -
                            {{ profile ? profile.death_date : "" }}</span
                        >
                    </div>

                    <!-- Mobile veteran container -->
                    <div
                        class="profile-settings-veteran-mobile-container"
                    ></div>
                    <!-- End of mobile veteran container -->

                    <!-- Buttons container -->
                    <div
                        class="profile-settings-buttons-container"
                        v-if="
                            profile && profile.qrcode && profile.qrcode.qrcode
                        "
                    >
                        <button class="profile-pill__active">
                            <a
                                :href="
                                    route('home') +
                                    `?reference=${profile.qrcode.qrcode.reference}`
                                "
                            >
                                <i class="bi bi-eye-fill me-2"></i>
                                Public view
                            </a>
                        </button>
                    </div>
                    <!-- End of buttons container -->
                </div>
                <!-- End of info container -->

                <div class="profile-settings-grid-item"></div>
            </div>
            <!-- Content inner container -->
        </div>
        <!-- End of content outer container -->
    </div>
    <!-- Card END -->
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import { ref, computed } from "vue";

import { globalMixin } from "@/mixins/globalMixin";
const { handleError, handleSuccess } = globalMixin.methods;

let props = defineProps({
    profile: Object,
});

const coverPictureUrl = computed(() =>
    props.profile && props.profile.cover_photo
        ? props.profile.cover_photo
        : route("home") + "/image-cover.jpg"
);
const profilePictureUrl = computed(() =>
    props.profile && props.profile.profile_picture
        ? props.profile.profile_picture
        : route("home") + "/profile-photo.jpeg"
);

const fullName = computed(() => {
    return `${
        props.profile && props.profile.first_name
            ? props.profile.first_name
            : ""
    } ${
        props.profile && props.profile.middle_name
            ? props.profile.middle_name
            : ""
    } ${
        props.profile && props.profile.last_name ? props.profile.last_name : ""
    }`;
});

// Set up Inertia forms for profile and cover photos
const profileForm = useForm({
    profile_picture: null,
});

const coverForm = useForm({
    cover_photo: null,
});

// Trigger the file input when the button is clicked
const fileInputProfile = ref(null);
const fileInputCover = ref(null);

const triggerFileInputProfile = () => fileInputProfile.value?.click();
const triggerFileInputCover = () => fileInputCover.value?.click();

const uploadProfilePhoto = (event) => {
    const file = event.target.files[0];
    if (file) {
        profileForm.profile_picture = file;

        profileForm.post(route("passedaway.profile.upload-profile-photo"), {
            onSuccess: () => {
                handleSuccess("Media picture uploaded successfully");
            },
            onError: (errors) => {
                handleError(errors);
            },
        });
    }
};

const uploadCoverPhoto = (event) => {
    const file = event.target.files[0];
    if (file) {
        coverForm.cover_photo = file;

        coverForm.post(route("passedaway.profile.upload-cover-photo"), {
            onSuccess: () => {
                handleSuccess("Cover photo uploaded successfully");
            },
            onError: (errors) => {
                handleError(errors);
            },
        });
    }
};


</script>
