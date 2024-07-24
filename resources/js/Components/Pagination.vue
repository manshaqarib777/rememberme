<template>
  <div>
    <template v-for="link in links">
      <Link
        v-if="link.url"
        :key="link.id"
        :href="link.url"
        v-html="link.label"
        :class="{ 'font-bold': link.active }"
        class="pagination-link bg-white m-1 rounded p-3"
      ></Link>
      <span
        v-else
        :key="link.id"
        class="pagination-link bg-white rounded p-3"
        v-html="link.label"
      >
      </span>
    </template>
  </div>
</template>

    <script setup>
import { Link } from "@inertiajs/vue3";
defineProps({
  links: Array,
});
</script>
