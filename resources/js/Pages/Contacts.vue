<template>
    <div class="page-container">
      <h1>Contacts</h1>
      <p>No contacts available yet.</p>
    </div>
  </template>
  
  <style scoped>
  .page-container {
    text-align: center;
  }
  </style>
  <script setup>
  import Sidebar from './Sidebar.vue';
  import { ref } from 'vue';
  
  const contacts = ref([]); // Dummy contacts array for now
  </script>
  
  <style scoped>
  .contacts {
    display: flex;
  }
  
  .contacts-content {
    margin-left: 240px;
    padding: 20px;
    background-color: #fff;
    height: 100vh;
    width: 100%;
  }
  
  header {
    display: flex;
    justify-content: space-between;
    padding-bottom: 20px;
    border-bottom: 1px solid #eee;
  }
  
  h1 {
    font-size: 1.5em;
  }
  </style>
  