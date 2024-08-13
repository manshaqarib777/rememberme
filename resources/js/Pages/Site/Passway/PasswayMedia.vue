<template>
    <Head title="Passedaway Media"></Head>
    <App>
        <main>
            <!-- Container START -->
            <div class="container mt-md-4">
                <div class="row g-4 row-application-container">
                    <!-- Container START -->
                    <div class="card_login_shadow px-0">
                        <Header :profile="profile" />

                        <!-- Card START -->
                        <div class="container bg-white rounded py-4 px-3">
                            <!-- Card body START -->
                            <div
                                class="col-12"
                                style="display: block; justify-content: center"
                            >
                                <Topbar />

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
                                                    <YouTubeVideo  theme="dark" :autoPlay="true" :videoLink="file.video_url" videoId="FMOJY4zP9Bo" :mediaId="file.id" v-if="file.type == 'video'" />
                                                    <div
                                                        class="image-on-media-tab"
                                                        :style="{
                                                            backgroundImage: `url(${file.file_path})`,
                                                        }"
                                                        v-else
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
                                                        <!-- <div class="mb-3">
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
                                                        </div> -->

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
import { Head, useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import axios from "axios";

import App from "../Layouts/App.vue";
import Header from "@/Pages/Site/Passway/Component/Header.vue";
import Topbar from "@/Pages/Site/Passway/Component/Topbar.vue";
import YouTubeVideo from "@/Components/YouTubeVideo.vue";

import { globalMixin } from "@/mixins/globalMixin";
const { handleError,handleSuccess } = globalMixin.methods;


let props = defineProps({
    profile: Object,
});


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
            handleSuccess('Media uploaded successfully!');
        },
        onError: (errors) => {
            handleError(errors);
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
        handleError(error);
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
                resetForm();
                handleSuccess('Media deleted successfully');
            },
            onError: (errors) => {
                handleError(errors);
            }
        });
    }
};

</script>
