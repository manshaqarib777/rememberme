<template>
    <div class="p-3">
        <div class="container-medallion-tab-public-view">
            <!-- Nav profile pages -->
            <ul
                class="nav nav-tabs nav-bottom-line justify-content-center medallion-tab-public-view"
            >
                <li class="nav-item">
                    <Link
                        :class="{'nav-link': true, 'active': isActive('passedaway.profile.bio')}"
                        :href="route('passedaway.profile.bio')"
                    >
                        Bio
                    </Link>
                </li>
                <li class="nav-item">
                    <Link
                        :class="{'nav-link': true, 'active': isActive('passedaway.profile.media')}"
                        :href="route('passedaway.profile.media')"
                    >
                        Media
                    </Link>
                </li>
                <li class="nav-item">
                    <Link
                        :class="{'nav-link': true, 'active': isActive('passedaway.profile.account')}"
                        :href="route('passedaway.profile.account')"
                    >
                        Account
                    </Link>
                </li>
                <li class="nav-item">
                    <Link
                        :class="{'nav-link': true, 'active': isActive('passedaway.profile.qrcode')}"
                        :href="route('passedaway.profile.qrcode')"
                    >
                        QR Code
                    </Link>
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { route } from 'ziggy-js'; // Assuming you have Ziggy's Vue package

const currentRoute = route().current();

// Function to determine if the link should be active
const isActive = (routeName) => {
    return currentRoute === routeName;
};
</script>
