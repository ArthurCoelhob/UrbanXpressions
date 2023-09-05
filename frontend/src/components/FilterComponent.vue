<template>
    <v-row justify="center" class="mb-4">
      <v-col cols="12" md="8">
        <v-select
          v-model="filterOption"
          :items="filterOptions"
          label="Filtrar por"
          outlined
          class="filter-select"
          dense
          @change="applyFilter"
        >
      </v-select>
      </v-col>
    </v-row>
  </template>
  
  <script lang="ts">
  import { Vue, Component, Prop } from 'vue-property-decorator';
  import axios from 'axios';

  @Component
  export default class FilterComponent extends Vue {
    @Prop() items!: any[];
    
    filterOptions: { text: string; value: string }[] = [];
    filterOption  = 'tipo';

    async created() {
    await this.loadFilterOptions();
  }

  async loadFilterOptions() {
    try {
      const response = await axios.get('http://127.0.0.1:8000/api/categories');
      this.filterOptions = response.data;
      this.filterOptions = response.data.map((category: any) => ({ text: category.name, value: category.id }));
    } catch (error) {
      console.error('Erro ao carregar opções de filtro:', error);
    }
  }
  
    applyFilter(): void {
      this.$emit('filter-products', this.filterOption);
    }
  }
  </script>
  
  <style scoped>

  .search-input {
    background-color: #f5f5f5;
    border-radius: 8px;
    padding: 8px;
  }
  
  .search-input .v-input__icon {
    color: #757575;
  }
  
  .search-input input {
    font-size: 16px;
    color: #222;
  }
  
  .filter-select {
    background-color: #f5f5f5;
    border-radius: 8px;
    padding: 4px 8px;
  }
  </style>
  