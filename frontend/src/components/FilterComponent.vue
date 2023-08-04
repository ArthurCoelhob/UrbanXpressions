<template>
    <v-row justify="center" class="mb-4">
      <v-col cols="12" md="8">
        <v-text-field
          v-model="searchTerm"
          label="Busca por tipo de produto"
          outlined
          class="search-input"
          hide-details
          dense
          clearable
          @input="applyFilter"
        ></v-text-field>
        <v-select
          v-model="filterOption"
          :items="filterOptions"
          label="Filtrar por"
          outlined
          class="filter-select"
          dense
          @change="applyFilter"
        ></v-select>
      </v-col>
    </v-row>
  </template>
  
  <script lang="ts">
  import { Vue, Component, Prop } from 'vue-property-decorator';
  
  @Component
  export default class FilterComponent extends Vue {
    @Prop() items!: any[];
  
    searchTerm  = '';
    filterOption  = 'tipo';
  
    filterOptions: string[] = ['Calça', 'Blusa'];
  
    applyFilter(): void {
      this.$emit('filter-items', this.searchTerm.trim().toLowerCase(), this.filterOption);
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
  