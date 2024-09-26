<template>
    <div class="pipeline">
      <Sidebar />
      <div class="pipeline-content">
        <header>
          <h1>Pipeline</h1>
        </header>
        <p>No data available yet for your pipeline.</p>
      </div>
    </div>
  </template>
  
  <script setup>
  import Sidebar from './Sidebar.vue';
  </script>
  
  <style scoped>
  .pipeline {
    display: flex;
  }
  
  .pipeline-content {
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
  