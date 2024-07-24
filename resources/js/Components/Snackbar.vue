<template>
  <div class="text-center">
    <v-snackbar
      v-model="snackbar"
      color="success"
    >
      {{ text }}

      <template v-slot:actions>
        <v-btn
          color="white"
          variant="text"
          @click="snackbar = false"
        >
          Close
        </v-btn>
      </template>
    </v-snackbar>
  </div>
</template>

<script setup>
import { ref } from "vue";
const props = defineProps({
    snackbar: Boolean,
    text: String
});
let snackbar = ref(props.snackbar)
</script>

