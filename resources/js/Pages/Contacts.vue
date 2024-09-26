<template>
    <div class="contacts">
      <Sidebar />
      <div class="contacts-content">
        <header>
          <h1>Contacts</h1>
        </header>
        <section v-if="contacts.length === 0">
          <p>No Contacts Available</p>
        </section>
        <section v-else>
          <ul>
            <li v-for="contact in contacts" :key="contact.id">{{ contact.name }}</li>
          </ul>
        </section>
      </div>
    </div>
  </template>
  
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
  