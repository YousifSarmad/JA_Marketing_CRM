<template>
    <div class="profile">
      <Sidebar />
      <div class="profile-content">
        <header>
          <h1>Profile</h1>
        </header>
        <p>This is your profile page.</p>
      </div>
    </div>
  </template>
  
  <script setup>
  import Sidebar from './Sidebar.vue';
  </script>
  
  <style scoped>
  .profile {
    display: flex;
  }
  
  .profile-content {
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
  