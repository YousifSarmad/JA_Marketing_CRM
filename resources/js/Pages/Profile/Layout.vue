<template>
    <div class="layout-container">
      <Sidebar /> <!-- Sidebar component included here -->
      <main class="main-content">
        <router-view /> <!-- Dynamically loads the page content based on the route -->
      </main>
    </div>
  </template>
  
  <script>
  import Sidebar from './Sidebar.vue'; // Import your Sidebar component
  
  export default {
    components: {
      Sidebar, // Register the Sidebar component
    },
  };
  </script>
  
  <style scoped>
  .layout-container {
    display: flex;
  }
  
  .main-content {
    flex: 1;
    padding: 20px;
  }
  </style>
  