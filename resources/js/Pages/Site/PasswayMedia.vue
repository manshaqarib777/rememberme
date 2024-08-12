<template>
    <Head title="Passedaway Media"></Head>
    <App>
        <main>
            <!-- Container START -->
            <div class="container mt-md-4">
                <div class="row g-4 row-application-container">
                    <!-- Container START -->
                    <div class="card_login_shadow px-0">
                        <!-- Card START -->
                        <div class="top-card">
                            <!-- Cover photo container START -->
                            <div
                                class="cover-photo-container rounded-top overflow-hidden"
                            >
                                <div class="cover-photo-image-container">
                                    <img
                                        style="max-height: 250px"
                                        :src="coverPictureUrl"
                                    />
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
                            <div
                                class="container px-0 bg-white profile-settings-outer-container"
                            >
                                <!-- Content inner container -->
                                <div class="profile-settings-inner-container">
                                    <!-- Media picture container -->
                                    <div
                                        class="profile-settings-image-container"
                                    >
                                        <div
                                            class="profile-settings-image-and-button-container"
                                        >
                                            <div
                                                class="profile-picture-container bg_avatar"
                                            >
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
                                                <i
                                                    class="bi bi-pencil-fill"
                                                ></i>
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
                                    <div
                                        class="profile-settings-info-container"
                                    >
                                        <!-- Audio container -->
                                        <!-- End of Audio container -->
                                        <h4 class="profile-headline-text">
                                            In Loving Memory of
                                        </h4>
                                        <!-- Headline text container -->
                                        <!-- Name container -->
                                        <h3 class="profile-name-text">
                                            {{
                                                props.profile
                                                    ? props.profile.title
                                                    : ""
                                            }}. {{ fullName }}
                                        </h3>
                                        <!-- End of name container -->
                                        <!-- Lifetime container -->
                                        <div class="my-2 px-0">
                                            <span class="profile-lifetime-text"
                                                >Relationship:
                                            </span>
                                            <span class="profile-date-text">{{
                                                profile
                                                    ? profile.relationship
                                                    : ""
                                            }}</span>
                                        </div>
                                        <div class="my-2 px-0">
                                            <span class="profile-lifetime-text"
                                                >Lifetime:
                                            </span>
                                            <span class="profile-date-text"
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

                                        <!-- Mobile veteran container -->
                                        <div
                                            class="profile-settings-veteran-mobile-container"
                                        ></div>
                                        <!-- End of mobile veteran container -->

                                        <!-- Buttons container -->
                                        <div
                                            class="profile-settings-buttons-container"
                                            v-if="profile && profile.qrcode && profile.qrcode.qrcode"
                                        >
                                            <button
                                                class="profile-pill__active"
                                            >
                                                <a
                                                    :href="route('home')+`?reference=${profile.qrcode.qrcode.reference}`"
                                                >
                                                    <i
                                                        class="bi bi-eye-fill me-2"
                                                    ></i>
                                                    Public view
                                                </a>
                                            </button>
                                        </div>
                                        <!-- End of buttons container -->
                                    </div>
                                    <!-- End of info container -->

                                    <div
                                        class="profile-settings-grid-item"
                                    ></div>
                                </div>
                                <!-- Content inner container -->
                            </div>
                            <!-- End of content outer container -->
                        </div>
                        <!-- Card END -->

                        <!-- Card START -->
                        <div class="container bg-white rounded py-4 px-3">
                            <!-- Card body START -->
                            <div
                                class="col-12"
                                style="display: block; justify-content: center"
                            >
                                <div class="p-3">
                                    <div
                                        class="container-medallion-tab-public-view"
                                    >
                                        <!-- Nav profile pages -->
                                        <ul
                                            class="nav nav-tabs nav-bottom-line justify-content-center medallion-tab-public-view"
                                        >
                                            <li class="nav-item">
                                                <Link
                                                    class="nav-link"
                                                    :href="
                                                        route(
                                                            'passedaway.profile.bio'
                                                        )
                                                    "
                                                >
                                                    Bio
                                                </Link>
                                            </li>
                                            <li class="nav-item">
                                                <Link
                                                    class="nav-link active"
                                                    :href="
                                                        route(
                                                            'passedaway.profile.media'
                                                        )
                                                    "
                                                >
                                                    Media
                                                </Link>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="rounded">
                                    <!-- Card body START -->

                                    <div
                                        class="row px-3 mt-3 mb-4 d-flex align-items-center justify-content-lg-end"
                                    >
                                        <button
                                            type="button"
                                            class="btn add-file-button"
                                            data-bs-toggle="modal"
                                            data-bs-target="#add-media-modal"
                                        >
                                            <i
                                                class="fa-regular fa-plus me-2"
                                            ></i>
                                            Add new file
                                        </button>
                                    </div>
                                    <div class="row g-2" id="media-tab-public">
                                        <v-col
                                            v-for="(
                                                file, index
                                            ) in profile.media"
                                            :key="index"
                                            cols="12"
                                            sm="6"
                                            md="4"
                                        >
                                            <div class="public-media-container">
                                                <div
                                                    class="load-media-image-container media-tumbnail-container"
                                                >
                                                    <div
                                                        class="image-on-media-tab"
                                                        :style="{
                                                            backgroundImage: `url(${file.file_path})`,
                                                        }"
                                                    ></div>
                                                    <div
                                                        class="dropdown"
                                                        style="
                                                            position: absolute;
                                                            top: 5px;
                                                            right: 5px;
                                                        "
                                                    >
                                                        <div
                                                            class="d-flex align-items-center justify-content-center media-dots-icon-container"
                                                            data-bs-auto-close="outside"
                                                            :id="`media-settings-dropdown-${file.id}`"
                                                            data-bs-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false"
                                                        >
                                                            <i
                                                                class="bi bi-three-dots fs-3"
                                                            ></i>
                                                        </div>
                                                        <div
                                                            class="dropdown-menu"
                                                            :aria-labelledby="`media-settings-dropdown-${file.id}`"
                                                            style=""
                                                        >
                                                            <a
                                                                class="dropdown-item edit-media-item edit-video-item"
                                                                @click="
                                                                    openEditModal(
                                                                        file.id
                                                                    )"
                                                            >
                                                                <i
                                                                    class="bi bi-pencil"
                                                                ></i>
                                                                <span
                                                                    class="ps-2 edit-media-text"
                                                                    >Edit</span
                                                                >
                                                            </a>
                                                            <a
                                                                class="dropdown-item delete-media-item delete-video-item"
                                                                @click="
                                                                    deleteMedia(
                                                                        file.id
                                                                    )"
                                                            >
                                                                <i
                                                                    class="bi bi-trash"
                                                                ></i>
                                                                <span
                                                                    class="ps-2 delete-media-text"
                                                                    >Delete</span
                                                                >
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </v-col>
                                    </div>

                                    <div
                                        class="modal fade"
                                        id="add-media-modal"
                                        tabindex="-1"
                                        aria-labelledby="exampleModalLabel"
                                        aria-hidden="true"
                                        ref="modalRef"
                                    >
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div
                                                        class="border-bottom border-dark border-1 d-flex py-2 mb-3"
                                                    >
                                                        <h5
                                                            class="modal-title flex-grow-1"
                                                            id="add-media-modal-label"
                                                        >
                                                            {{
                                                                mediaForm.id
                                                                    ? "Edit Media"
                                                                    : "New Post"
                                                            }}
                                                        </h5>
                                                        <button
                                                            type="button"
                                                            class="btn-close"
                                                            data-bs-dismiss="modal"
                                                            aria-label="Close"
                                                            @click="resetForm"
                                                        ></button>
                                                    </div>
                                                    <label
                                                        >Type of content:</label
                                                    >
                                                    <form
                                                        @submit.prevent="
                                                            handleSubmit
                                                        "
                                                        enctype="multipart/form-data"
                                                    >
                                                        <div
                                                            class="d-flex align-items-center gap-2 mb-2"
                                                        >
                                                            <div
                                                                class="d-flex align-items-center gap-2 p-2 select-media-container"
                                                            >
                                                                <input
                                                                    class="m-0 custom-media-checkbox"
                                                                    type="radio"
                                                                    id="upload-image-checkbox"
                                                                    name="mediaType"
                                                                    @change="
                                                                        toggleForm(
                                                                            'image'
                                                                        )
                                                                    "
                                                                    :checked="
                                                                        mediaForm.type ===
                                                                        'image'
                                                                    "
                                                                />
                                                                <label
                                                                    class="m-0"
                                                                    for="upload-image-checkbox"
                                                                    >Photo</label
                                                                >
                                                            </div>
                                                            <div
                                                                class="d-flex align-items-center gap-2 p-2 select-media-container"
                                                            >
                                                                <input
                                                                    class="m-0 custom-media-checkbox"
                                                                    type="radio"
                                                                    id="upload-video-checkbox"
                                                                    name="mediaType"
                                                                    @change="
                                                                        toggleForm(
                                                                            'video'
                                                                        )
                                                                    "
                                                                    :checked="
                                                                        mediaForm.type ===
                                                                        'video'
                                                                    "
                                                                />
                                                                <label
                                                                    class="m-0"
                                                                    for="upload-video-checkbox"
                                                                    >Video</label
                                                                >
                                                            </div>
                                                        </div>

                                                    <!-- Unified Form for Image or Video -->
                                                        <div class="mb-3">
                                                            <label
                                                                for="media-title"
                                                                >Title:</label
                                                            >
                                                            <input
                                                                v-model="
                                                                    mediaForm.title
                                                                "
                                                                type="text"
                                                                id="media-title"
                                                                class="form-control"
                                                                required
                                                            />
                                                        </div>

                                                        <div class="mb-3">
                                                            <label
                                                                for="media-description"
                                                                >Description:</label
                                                            >
                                                            <textarea
                                                                v-model="
                                                                    mediaForm.summary
                                                                "
                                                                id="media-description"
                                                                class="form-control"
                                                                rows="3"
                                                            ></textarea>
                                                        </div>

                                                        <!-- Conditional Inputs -->
                                                        <div
                                                            v-if="
                                                                mediaForm.type ===
                                                                'image'
                                                            "
                                                            class="mb-3"
                                                        >
                                                            <label for="image"
                                                                >Upload
                                                                Image:</label
                                                            >
                                                            <input
                                                                ref="fileInputRef"
                                                                type="file"
                                                                id="image"
                                                                class="form-control"
                                                                accept="image/png, image/jpeg"
                                                                @change="
                                                                    handleFileChange
                                                                "
                                                                :required="
                                                                    !mediaForm.id
                                                                "
                                                            />
                                                        </div>

                                                        <div
                                                            v-if="
                                                                mediaForm.type ===
                                                                'video'
                                                            "
                                                            class="mb-3"
                                                        >
                                                            <label
                                                                for="video_url"
                                                                >Youtube
                                                                URL:</label
                                                            >
                                                            <input
                                                                v-model="
                                                                    mediaForm.video_url
                                                                "
                                                                type="text"
                                                                id="video_url"
                                                                class="form-control"
                                                                required
                                                            />
                                                        </div>

                                                        <button
                                                            type="submit"
                                                            class="btn btn-lg btn-gold-100 w-100"
                                                        >
                                                            <i
                                                                class="fa-solid fa-upload me-2"
                                                                aria-hidden="true"
                                                            ></i>
                                                            {{
                                                                mediaForm.id
                                                                    ? "Update"
                                                                    : "Upload"
                                                            }}
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card body END -->
                        </div>
                        <!-- Card END -->
                    </div>
                </div>
                <!-- Right sidebar END -->
                <!-- Container END -->
            </div>
        </main>
    </App>
</template>

<script setup>
import { Head, useForm, usePage, Link } from "@inertiajs/vue3";
import { ref, computed } from "vue";
import axios from "axios";
import App from "./Layouts/App.vue";

components: {
    Head, App;
}

let props = defineProps({
    profile: Object,
});

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
                console.log("Media picture uploaded successfully");
            },
            onError: (errors) => {
                console.error("Media picture upload failed:", errors);
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
                console.log("Cover photo uploaded successfully");
            },
            onError: (errors) => {
                console.error("Cover photo upload failed:", errors);
            },
        });
    }
};

// Reactive reference to toggle visibility
// const selectedType = ref("image");

// Inertia form for adding either an image or a video
const fileInputRef = ref(null);
const modalRef = ref(null);


const mediaForm = useForm({
    id: null,
    title: "",
    summary: "",
    image: null,
    video_url: "",
    type: "image",
    passedaway_id: props.profile ? props.profile.id : null,
});

// Function to handle form submission
const handleSubmit = () => {
    mediaForm.post(route("passedaway.profile.storeMedia"), {
        onSuccess: () => {
            resetForm();
            console.log("Media uploaded successfully");
        },
        onError: (errors) => {
            console.error("Media upload failed:", errors);
        },
    });
};

// Function to handle file input changes
const handleFileChange = (event) => {
    mediaForm.image = event.target.files[0];
};

// Function to toggle between image and video
const toggleForm = (type) => {
    mediaForm.type = type;
};

// Function to open the edit modal and populate the form
const openEditModal = async (mediaId) => {
    try {
        const response = await axios.get(route("passedaway.profile.getMedia",mediaId));
        const media = response.data;

        // Populate the form with the fetched data
        mediaForm.id = media.id;
        mediaForm.title = media.title;
        mediaForm.summary = media.summary;
        if (media.type === "image") {
            mediaForm.type = "image";
        } else if (media.type === "video") {
            mediaForm.type = "video";
            mediaForm.video_url = media.video_url;
        }

        $('#add-media-modal').modal('show'); // Use jQuery to hide the modal

    } catch (error) {
        console.error("Error fetching media:", error);
    }
};

// Function to reset the form for a new entry
const resetForm = () => {
    mediaForm.reset();
    mediaForm.type = "image"; // Default to image
    if(fileInputRef.value){
        fileInputRef.value.value = null;
    }

    closeModal();

};


// Function to close the modal
const closeModal = () => {
    $('#add-media-modal').modal('hide'); // Use jQuery to hide the modal
};

// Reference to manage media deletion
const deleteForm = useForm({});

// Function to delete media
const deleteMedia = (mediaId) => {
    if (confirm("Are you sure you want to delete this media?")) {
        $(`#media-settings-dropdown-${mediaId}`).dropdown('hide'); // This will close the dropdown
        deleteForm.delete(route("passedaway.profile.deleteMedia",mediaId), {
            onSuccess: () => {
                console.log('Media deleted successfully');
                resetForm();
            },
            onError: () => {
                console.error('Failed to delete media');
            }
        });
    }
};

</script>
