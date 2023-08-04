<template>
  <v-app-bar app color="primary" dark>
    <v-toolbar-title>
      <span class="ml-2">UrbanXpressions</span>
    </v-toolbar-title>

    
    <v-spacer></v-spacer>

    <div class="d-flex justify-center">
      <v-btn text to="/shop">Loja</v-btn>
      <v-btn text @click="openDiscordLink">Comunidade</v-btn>
    </div>

    <v-spacer></v-spacer>
    
    <v-btn icon @click="openCart">
      <v-icon>mdi-cart</v-icon>
    </v-btn>
   
    <v-btn icon @click="openCart">
      <v-icon>mdi-heart</v-icon>
    </v-btn>
  </v-app-bar>
</template>

<script lang="ts">
import { Vue, Component } from 'vue-property-decorator';

@Component
export default class HeaderComponent extends Vue {
  openCart(): void {
    // todo
  }

  openDiscordLink(): void {
    // todo
  }
}
</script>

<style lang="scss">
</style>
