<template>
<v-app>
  <v-main>
    <v-container fluid>
    <router-view></router-view>
    </v-container>
  </v-main>
</v-app>
</template>

<script lang="ts">
import Vue from 'vue';

export default Vue.extend({
  name: 'App',

  data: () => ({
    //
  }),
});
</script>
