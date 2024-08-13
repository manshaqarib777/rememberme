<template>
    <Head title="Passedaway Profile"></Head>
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
                            <div
                                class="container px-0 bg-white profile-settings-outer-container"
                            >
                                <!-- Content inner container -->
                                <div class="profile-settings-inner-container">
                                    <!-- Profile picture container -->
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
                                                    {{ props.profile ? props.profile.title : "" }}. {{ fullName }}
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
                                                            >{{ profile ? profile.relationship : "" }}</span
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


                                        <!-- Mobile veteran container -->
                                        <div
                                            class="profile-settings-veteran-mobile-container"
                                        ></div>
                                        <!-- End of mobile veteran container -->

                                        <!-- Buttons container -->
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
                                                    class="nav-link active"
                                                    :href="route('passedaway.profile.bio')"
                                                >
                                                    Bio
                                                </Link>
                                            </li>
                                            <li class="nav-item">
                                                <Link
                                                    class="nav-link"
                                                    :href="route('passedaway.profile.media')"
                                                >
                                                    Media
                                                </Link>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="rounded">
                                    <!-- Card body START -->

                                    <div class="card rounded px-4">
                                        <v-form @submit.prevent="submitForm">
                                             <!-- Error handling -->
                                            <div class="mt-2" v-if="Object.keys(ProfileForm.errors).length">
                                                <v-alert
                                                    title="Error"
                                                    type="error"
                                                    v-for="(error, key) in ProfileForm.errors" :key="key"
                                                >
                                                    {{ error }}
                                                </v-alert>
                                            </div>

                                            <!--begin::Personal information-->
                                            <div
                                                class="mt-3 mb-3 py-2 border-bottom border-3"
                                            >
                                                <h5 class="fw-normal mb-0">
                                                    Personal information
                                                </h5>
                                            </div>
                                            <div class="row p-2">
                                                <div
                                                    class="col-md-4 mb-3 input-group-lg"
                                                >
                                                    <label>First name:</label>
                                                    <input
                                                        class="form-control"
                                                        style="
                                                            margin-block-start: 0px;
                                                        "
                                                        type="text"
                                                        value="Jane"
                                                        v-model="ProfileForm.first_name"
                                                        id="account_first_name"
                                                    />
                                                </div>
                                                <div
                                                    class="col-md-4 mb-3 input-group-lg"
                                                >
                                                    <label>Middle name:</label>
                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        value="Daniel"
                                                        v-model="ProfileForm.middle_name"
                                                        id="account_middle_name"
                                                    />
                                                </div>
                                                <div
                                                    class="col-md-4 mb-3 input-group-lg"
                                                >
                                                    <label>Last name:</label>
                                                    <input
                                                        class="form-control"
                                                        style="
                                                            margin-block-start: 0px;
                                                        "
                                                        type="text"
                                                        value="Sue"
                                                        v-model="ProfileForm.last_name"
                                                        id="account_last_name"
                                                    />
                                                </div>
                                                <div
                                                    class="col-md-6 mb-3 input-group-lg"
                                                >
                                                    <label>Title:</label>
                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        value="Mr"
                                                        v-model="ProfileForm.title"
                                                        id="account_title_text"
                                                    />
                                                    <div class="mt-2">
                                                        <small
                                                            class="text-black"
                                                            >(Example Jr -
                                                            Sr)</small
                                                        >
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-md-6 mb-3 input-group-lg"
                                                >
                                                    <label>Relationship:</label>
                                                    <select
                                                        class="form-control"
                                                        v-model="ProfileForm.relationship"
                                                        id="account_bonding"
                                                    >
                                                        <option value="Aunt">
                                                            Aunt
                                                        </option>
                                                        <option
                                                            value="Boyfriend"
                                                        >
                                                            Boyfriend
                                                        </option>
                                                        <option value="Brother">
                                                            Brother
                                                        </option>
                                                        <option value="Cousin">
                                                            Cousin
                                                        </option>
                                                        <option
                                                            value="Daughter"
                                                        >
                                                            Daughter
                                                        </option>
                                                        <option value="Father">
                                                            Father
                                                        </option>
                                                        <option
                                                            selected="selected"
                                                            value="Friend"
                                                        >
                                                            Friend
                                                        </option>
                                                        <option
                                                            value="Girlfriend"
                                                        >
                                                            Girlfriend
                                                        </option>
                                                        <option
                                                            value="Granddaughter"
                                                        >
                                                            Granddaughter
                                                        </option>
                                                        <option
                                                            value="Grandfather"
                                                        >
                                                            Grandfather
                                                        </option>
                                                        <option
                                                            value="Grandmother"
                                                        >
                                                            Grandmother
                                                        </option>
                                                        <option
                                                            value="Grandson"
                                                        >
                                                            Grandson
                                                        </option>
                                                        <option
                                                            value="Great grandfather"
                                                        >
                                                            Great grandfather
                                                        </option>
                                                        <option
                                                            value="Great grandmother"
                                                        >
                                                            Great grandmother
                                                        </option>
                                                        <option value="Husband">
                                                            Husband
                                                        </option>
                                                        <option value="Mother">
                                                            Mother
                                                        </option>
                                                        <option value="Nephew">
                                                            Nephew
                                                        </option>
                                                        <option value="Niece">
                                                            Niece
                                                        </option>
                                                        <option value="Sister">
                                                            Sister
                                                        </option>
                                                        <option value="Son">
                                                            Son
                                                        </option>
                                                        <option value="Uncle">
                                                            Uncle
                                                        </option>
                                                        <option value="Wife">
                                                            Wife
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--end::Personal information-->


                                            <!--begin::Obituary information-->
                                            <div
                                                class="mt-3 mb-3 py-2 border-bottom border-3"
                                            >
                                                <h5 class="fw-normal mb-0">
                                                    Obituary information
                                                </h5>
                                            </div>
                                            <div class="row p-2">
                                                <div
                                                    class="col-md-12 mb-3 input-group-lg"
                                                >
                                                    <label
                                                        >Bio information:</label
                                                    >
                                                    <textarea
                                                        class="form-control"
                                                        rows="5"
                                                        v-model="ProfileForm.bio"
                                                        id="account_bio"
                                                    ></textarea>
                                                </div>
                                                <div
                                                    class="col-md-12 mb-3 input-group-lg"
                                                >
                                                    <label
                                                        >Description:</label
                                                    >
                                                    <textarea
                                                        class="form-control"
                                                        rows="5"
                                                        v-model="ProfileForm.description"
                                                        id="account_description"
                                                    ></textarea>
                                                </div>
                                            </div>
                                            <!--end::Obituary information-->
                                            <!--begin::Location before death-->
                                            <div
                                                class="mt-3 mb-3 py-2 border-bottom border-3"
                                            >
                                                <h5 class="fw-normal mb-0">
                                                    Location before death
                                                </h5>
                                            </div>
                                            <div class="row p-2">
                                                <div
                                                    class="col-md-6 mb-3 input-group-lg"
                                                >
                                                    <label>City:</label>
                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        v-model="ProfileForm.city"
                                                        id="account_city"
                                                    />
                                                </div>

                                                <div
                                                    class="col-md-6 mb-3 input-group-lg"
                                                >
                                                    <label>State:</label>
                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        v-model="ProfileForm.state"
                                                        id="account_state"
                                                    />
                                                </div>
                                            </div>
                                            <!--end::Location before death-->
                                            <!--begin::Lifetime-->
                                            <div
                                                class="mt-3 mb-3 py-2 border-bottom border-3"
                                            >
                                                <h5 class="fw-normal mb-0">
                                                    Lifetime
                                                </h5>
                                            </div>
                                            <div class="row p-2">
                                                <div
                                                    class="col-md-6 mb-3 input-group-lg"
                                                >
                                                    <label>Birth date:</label>
                                                    <input
                                                        class="form-control"
                                                        type="date"
                                                        v-model="ProfileForm.birth_date"
                                                        id="account_dob"
                                                    />
                                                </div>

                                                <div
                                                    class="col-md-6 mb-3 input-group-lg"
                                                >
                                                    <label>Death date:</label>
                                                    <input
                                                        class="form-control"
                                                        type="date"
                                                        v-model="ProfileForm.death_date"
                                                        id="account_dod"
                                                    />
                                                </div>
                                            </div>
                                            <!--end::Lifetime-->

                                            <!-- Button -->
                                            <div class="row mb-4">
                                                <div class="col-md-12">
                                                    <button
                                                        type="submit"
                                                        id="btnEditAccount"
                                                        class="btn btn-gold rounded-pill float-end px-5"
                                                    >
                                                        Save changes
                                                    </button>
                                                </div>
                                            </div>
                                        </v-form>
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
import { Head, useForm, usePage,Link } from "@inertiajs/vue3";
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

const ProfileForm = useForm({
    first_name: props.profile ? props.profile.first_name : "",
    middle_name: props.profile ? props.profile.middle_name : "",
    last_name: props.profile ? props.profile.last_name : "",
    title: props.profile ? props.profile.title : "",
    relationship: props.profile ? props.profile.relationship : "",
    description: props.profile ? props.profile.description : "",
    bio: props.profile ? props.profile.bio : "",
    birth_date: props.profile ? props.profile.birth_date : null,
    death_date: props.profile ? props.profile.death_date : null,
    city: props.profile ? props.profile.city : null,
    state: props.profile ? props.profile.state : null,
    allow_comments: props.profile ? props.profile.allow_comments : false,
});
// Helper function to format date
const formatDate = (date) => {
    return date ? new Date(date).toISOString().split("T")[0] : null;
};

const submitForm = async () => {
    ProfileForm.post(route('passedaway.profile.store'), {
        onSuccess: () => {
            console.log('Profile updated successfully');
            // Optionally, you can clear the form or redirect after success
        },
        onError: (errors) => {
            console.error('Form submission failed:', errors);
            // Handle form validation errors
        },
    });
};


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

        profileForm.post(route('passedaway.profile.upload-profile-photo'), {
            onSuccess: () => {
                console.log('Profile picture uploaded successfully');
            },
            onError: (errors) => {
                console.error('Profile picture upload failed:', errors);
            },
        });
    }
};

const uploadCoverPhoto = (event) => {
    const file = event.target.files[0];
    if (file) {
        coverForm.cover_photo = file;

        coverForm.post(route('passedaway.profile.upload-cover-photo'), {
            onSuccess: () => {
                console.log('Cover photo uploaded successfully');
            },
            onError: (errors) => {
                console.error('Cover photo upload failed:', errors);
            },
        });
    }
};

</script>
