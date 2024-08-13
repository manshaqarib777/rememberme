<template>
    <Head title="Passedaway Profile"></Head>
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

                                    <div class="card rounded px-4">
                                        <v-form @submit.prevent="submitForm">
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
import { Head, useForm } from "@inertiajs/vue3";

import App from "../Layouts/App.vue";
import Header from "@/Pages/Site/Passway/Component/Header.vue";
import Topbar from "@/Pages/Site/Passway/Component/Topbar.vue";
import { globalMixin } from "@/mixins/globalMixin";
const { handleError,handleSuccess } = globalMixin.methods;


let props = defineProps({
    profile: Object,
});

// Function to close the modal
const convertDateFormat = (dateString) => {
    if (!dateString) return '';

    // Split the date string by '/'
    const [day, month, year] = dateString.split('/');

    // Join the parts with '-'
    return `${year}-${month}-${day}`;
};


const ProfileForm = useForm({
    first_name: props.profile ? props.profile.first_name : "",
    middle_name: props.profile ? props.profile.middle_name : "",
    last_name: props.profile ? props.profile.last_name : "",
    title: props.profile ? props.profile.title : "",
    relationship: props.profile ? props.profile.relationship : "",
    description: props.profile ? props.profile.description : "",
    bio: props.profile ? props.profile.bio : "",
    birth_date: props.profile ? convertDateFormat(props.profile.birth_date) : null,
    death_date: props.profile ? convertDateFormat(props.profile.death_date) : null,
    city: props.profile ? props.profile.city : null,
    state: props.profile ? props.profile.state : null,
    allow_comments: props.profile ? props.profile.allow_comments : false,
});

const submitForm = async () => {
    ProfileForm.post(route('passedaway.profile.store'), {
        onSuccess: () => {
            handleSuccess("Profile updated successfully");
        },
        onError: (errors) => {
            handleError(errors);
        },
    });
};

</script>
