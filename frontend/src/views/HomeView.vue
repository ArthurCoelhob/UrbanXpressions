<template>
  <div>
    <header-component />
    <content-list-component />
    <footer-component />
  </div>
  
</template>

<script lang="ts">
  import Vue from 'vue'
  import HeaderComponent from '@/components/HeaderComponent.vue';
  import ContentListComponent from '@/components/ContentListComponent.vue';
  import FooterComponent from '@/components/FooterComponent.vue';


  export default Vue.extend({
    name: 'HomeView',

    components: {
      HeaderComponent,
      ContentListComponent,
      FooterComponent,

      
    },
  })
</script>
