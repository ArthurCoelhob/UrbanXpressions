<template>
    <v-container>

        <FilterComponent @filter-products="filterProducts" />
      <v-row justify="center" class="mb-5">
        <v-col cols="12" md="8">
          <v-divider class="mt-2 mb-4"></v-divider>
        </v-col>
      </v-row>
  
      <v-row justify="center">
        <v-col cols="12" md="4" lg="3" v-for="(product, index) in products" :key="index">
          <v-card class="mb-4">
            <v-img :src="product.image" height="200"></v-img>
            <v-card-title class="text-h6">{{ product.title }}</v-card-title>
            <v-card-subtitle class="text-body-2">{{ product.subtitle }}</v-card-subtitle>
            <v-card-text class="text-body-1">{{ product.description }}</v-card-text>
  
            
            <v-card-actions class="justify-center">
              <v-btn icon @click="addToCart(index)">
                <v-icon>mdi-cart</v-icon>
              </v-btn>
              <v-btn icon @click="likeProduct(index)">
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
  import axios from 'axios';
  
  interface ContentProduct {
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
    products: ContentProduct[] = [];
    filteredItems: ContentProduct[] = [];
    created() {
      this.getProductsAll();
    }

    private async getProductsAll() {
    try {
      const response = await axios.get('http://127.0.0.1:8001/api/products');
      this.products = response.data;
    } catch (error) {
      console.error('Erro ao buscar os produtos:', error);
    }
  }
  
    addToCart(index: number): void {
      
      console.log('Item adicionado ao carrinho:', this.products[index]);
    }
  
    likeProduct(index: number): void {
      
      console.log('Usuário gostou do item:', this.products[index]);
    }

    filterProducts(searchTerm: string): void {
    if (!searchTerm) {
      this.filteredItems = this.products;
    } else {
      this.filteredItems = this.products.filter(
        (product) =>
          product.title.toLowerCase().includes(searchTerm) ||
          product.subtitle.toLowerCase().includes(searchTerm) ||
          product.description.toLowerCase().includes(searchTerm)
      );
    }
  }

  }
  </script>
  
  <style>
  </style>
  