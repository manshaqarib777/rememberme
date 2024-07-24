<template>
  <v-layout>
    <v-app-bar color="primary" prominent>
      <v-app-bar-nav-icon
        variant="text"
        @click.stop="drawer = !drawer"
      ></v-app-bar-nav-icon>

      <v-toolbar-title class="text-center">Remeber Me</v-toolbar-title>

      <v-btn variant="tonal" v-if="$page.props.auth.user">
        <Link :href="route('logout')" method="post" as="button" class="mr-2"
          >Logout</Link
        >
        <v-icon>mdi-export</v-icon>
        <v-tooltip activator="parent" location="bottom">Logout</v-tooltip>
      </v-btn>

      <v-btn variant="tonal" v-else>
        <Link href="login" as="button" class="mr-2"
          >Login</Link
        >
        <v-icon>mdi-export</v-icon>
        <v-tooltip activator="parent" location="bottom">Login</v-tooltip>
      </v-btn>
    </v-app-bar>

    <v-navigation-drawer
      v-model="drawer"
      :location="$vuetify.display.mobile ? 'left' : undefined"
      temporary
    >
      <v-list nav>
<!--
        <v-list-item
          prepend-icon="mdi-account-supervisor-circle"
          value="Home"
        >
          <Link href="/"> Home </Link>
        </v-list-item> -->

        <v-list-item
          prepend-icon="mdi-account-supervisor-circle"
          value="My Profile"
        >
          <Link href="/profile"> My Profile </Link>
        </v-list-item>

        <v-list-item prepend-icon="mdi-account-supervisor-circle" value="Remember Me">
          <Link href="/remember-me"> Remember Me </Link>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-main>
      <v-container>
        <slot />
      </v-container>
    </v-main>
  </v-layout>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { onMounted, ref } from "vue";
components: {
  Link;
}

const drawer = ref(false);
const items = ref([
  {
    title: "Foo",
    value: "foo",
  },
  {
    title: "Bar",
    value: "bar",
  },
  {
    title: "Fizz",
    value: "fizz",
  },
  {
    title: "Buzz",
    value: "buzz",
  },
]);

onMounted(() => {
  drawer.value = false;
});
</script>


