<template>
    <div class="calendar">
      <Sidebar />
      <div class="calendar-content">
        <header>
          <h1>Calendar</h1>
        </header>
        <p>No events on your calendar yet.</p>
      </div>
    </div>
  </template>
  
  <script setup>
  import Sidebar from './Sidebar.vue';
  </script>
  
  <style scoped>
  .calendar {
    display: flex;
  }
  
  .calendar-content {
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
  