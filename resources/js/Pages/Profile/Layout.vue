<template>
  <div class="layout">
    <Sidebar />
    <router-view :key="$route.fullPath" /> <!-- Add the key here -->
  </div>
</template>

<script setup>
import Sidebar from '../Sidebar.vue';
</script>

<style scoped>
.layout {
  display: flex;
}
</style>
