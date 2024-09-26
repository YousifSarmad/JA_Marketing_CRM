<template>
    <div class="leads">
      <Sidebar />
      <div class="leads-content">
        <header>
          <h1>New Leads</h1>
        </header>
        <section v-if="leads.length === 0">
          <p>No New Leads Yet</p>
          <p>Keep your communication tools ready to connect with clients.</p>
        </section>
        <section v-else>
          <ul>
            <li v-for="lead in leads" :key="lead.id">{{ lead.name }}</li>
          </ul>
        </section>
      </div>
    </div>
  </template>
  
  <script setup>
  import Sidebar from './Sidebar.vue';
  import { ref } from 'vue';
  
  const leads = ref([]); // Dummy leads array for now
  </script>
  
  <style scoped>
  .leads {
    display: flex;
  }
  
  .leads-content {
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
  