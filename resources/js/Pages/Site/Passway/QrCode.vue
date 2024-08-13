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
                                        <Profile :qrcodes="qrcodes" />
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
import Profile from "@/Pages/Site/Profile.vue";

let props = defineProps({
    profile: Object,
    qrcodes: Object,
});


</script>
