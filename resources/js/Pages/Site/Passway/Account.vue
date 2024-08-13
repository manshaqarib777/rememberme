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
                                            <!--begin::Personal Details-->
                                            <div
                                                class="mt-3 mb-3 py-2 border-bottom border-3"
                                            >
                                                <h5 class="fw-normal mb-0">
                                                    Personal Details
                                                </h5>
                                            </div>
                                            <div class="row p-2">
                                                <div
                                                    class="col-md-6 mb-3 input-group-lg"
                                                >
                                                    <label>Name:</label>
                                                    <input
                                                        class="form-control"
                                                        style="
                                                            margin-block-start: 0px;
                                                        "
                                                        type="text"
                                                        value="Jane"
                                                        v-model="form.name"
                                                        id="account_name"
                                                    />
                                                </div>
                                                <div
                                                    class="col-md-6 mb-3 input-group-lg"
                                                >
                                                    <label>Email:</label>
                                                    <input
                                                        class="form-control"
                                                        type="email"
                                                        value="Daniel"
                                                        v-model="form.email"
                                                        id="account_email"
                                                    />
                                                </div>
                                                <div
                                                    class="col-md-6 mb-3 input-group-lg"
                                                >
                                                    <label>Phone Number:</label>
                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        v-model="form.contact"
                                                        id="contact"
                                                    />
                                                </div>
                                                <div
                                                    class="col-md-6 mb-3 input-group-lg"
                                                >
                                                    <label>Address:</label>
                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        v-model="form.address"
                                                        id="address"
                                                    />
                                                </div>
                                                <div
                                                    class="col-md-6 mb-3 input-group-lg"
                                                >
                                                    <label>City:</label>
                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        v-model="form.city"
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
                                                        v-model="form.state"
                                                        id="account_state"
                                                    />
                                                </div>

                                            </div>
                                            <!--end::Personal Details-->

                                            <!--begin::Update Password-->
                                            <div
                                                class="mt-3 mb-3 py-2 border-bottom border-3"
                                            >
                                                <h5 class="fw-normal mb-0">
                                                    Update Password
                                                </h5>
                                            </div>
                                            <div class="row p-2">
                                                <div
                                                    class="col-md-6 mb-3 input-group-lg"
                                                >
                                                    <label>New Password:</label>
                                                    <input
                                                        class="form-control"
                                                        type="password"
                                                        v-model="form.password"
                                                        id="account_password"
                                                        autocomplete="false"
                                                    />
                                                </div>

                                                <div
                                                    class="col-md-6 mb-3 input-group-lg"
                                                >
                                                    <label>Confirm Password:</label>
                                                    <input
                                                        class="form-control"
                                                        type="password"
                                                        v-model="form.password_confirmation"
                                                        id="account_password_confirmation"
                                                        autocomplete="false"
                                                    />
                                                </div>
                                            </div>
                                            <!--end::Update Password-->

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
import { Head, useForm, usePage } from "@inertiajs/vue3";

import App from "../Layouts/App.vue";
import Header from "@/Pages/Site/Passway/Component/Header.vue";
import Topbar from "@/Pages/Site/Passway/Component/Topbar.vue";
import { globalMixin } from "@/mixins/globalMixin";
const { handleError,handleSuccess } = globalMixin.methods;


let props = defineProps({
    profile: Object,
});
const user = usePage().props.auth.user;


const form = useForm({
    name: user ? user.name : "",
    email: user ? user.email : "",
    last_name: user ? user.last_name : "",
    contact: user ? user.contact : "",
    address: user ? user.address : "",
    city: user ? user.city : null,
    state: user ? user.state : null,
    password:  null,
    password_confirmation: null
});

const submitForm = async () => {
    form.post(route('passedaway.profile.storeProfile'), {
        onSuccess: () => {
            handleSuccess("Profile updated successfully");
        },
        onError: (errors) => {
            handleError(errors);
        },
    });
};

</script>
