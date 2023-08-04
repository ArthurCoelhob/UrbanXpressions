<template>
    <v-container>

        <FilterComponent @filter-items="filterItems" />
      <v-row justify="center" class="mb-5">
        <v-col cols="12" md="8">
          <v-divider class="mt-2 mb-4"></v-divider>
        </v-col>
      </v-row>
  
      <v-row justify="center">
        <v-col cols="12" md="4" lg="3" v-for="(item, index) in items" :key="index">
          <v-card class="mb-4">
            <v-img :src="item.image" height="200"></v-img>
            <v-card-title class="text-h6">{{ item.title }}</v-card-title>
            <v-card-subtitle class="text-body-2">{{ item.subtitle }}</v-card-subtitle>
            <v-card-text class="text-body-1">{{ item.description }}</v-card-text>
  
            
            <v-card-actions class="justify-center">
              <v-btn icon @click="addToCart(index)">
                <v-icon>mdi-cart</v-icon>
              </v-btn>
              <v-btn icon @click="likeItem(index)">
                <v-icon>mdi-heart</v-icon>
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </template>
  
  <script lang="ts">
  import { Vue, Component } from 'vue-property-decorator';
  import FilterComponent from './FilterComponent.vue';
  
  interface ContentItem {
    image: string;
    title: string;
    subtitle: string;
    description: string;
  }
  
  @Component({
  components: {
    FilterComponent,
  },
})
  export default class ContentListComponent extends Vue {
    items: ContentItem[] = [];
    filteredItems: ContentItem[] = [];
    created() {
      
      this.generateItems(10);
    }
    //exemplo para criação de itens
    generateItems(count: number): void {
      for (let i = 1; i <= count; i++) {
        this.items.push({
          image: `https://source.unsplash.com/random/400x400?item=${i}`,
          title: `Item ${i}`,
          subtitle: `Subtitle ${i}`,
          description: `Description for item ${i}.`
        });
      }
    }
  
    addToCart(index: number): void {
      
      console.log('Item adicionado ao carrinho:', this.items[index]);
    }
  
    likeItem(index: number): void {
      
      console.log('Usuário gostou do item:', this.items[index]);
    }

    filterItems(searchTerm: string): void {
    if (!searchTerm) {
      this.filteredItems = this.items;
    } else {
      this.filteredItems = this.items.filter(
        (item) =>
          item.title.toLowerCase().includes(searchTerm) ||
          item.subtitle.toLowerCase().includes(searchTerm) ||
          item.description.toLowerCase().includes(searchTerm)
      );
    }
  }

  }
  </script>
  
  <style>
  </style>
  