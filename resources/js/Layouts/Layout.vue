<template>
    <div class="layout-container">
      <aside class="sidebar">
        <img src="/image/image.png" alt="Logo" class="logo" />
        <nav class="nav-links">
          <router-link to="/leads" class="nav-item">New Leads</router-link>
          <router-link to="/contacts" class="nav-item">Contacts</router-link>
          <router-link to="/pipeline" class="nav-item">Pipeline</router-link>
          <router-link to="/calendar" class="nav-item">Calendar</router-link>
          <router-link to="/messages" class="nav-item">Messages</router-link>
          <router-link to="/profile" class="nav-item">Profile</router-link>
        </nav>
      </aside>
      <main class="main-content">
        <router-view /> <!-- This will dynamically render the component based on the route -->
      </main>
    </div>
  </template>
  
  <script>
  export default {};
  </script>
  
  <style scoped>
  .layout-container {
    display: flex;
  }
  
  .sidebar {
    width: 250px;
    background-color: #333;
    color: white;
    padding: 20px;
    height: 100vh;
  }
  
  .logo {
    display: block;
    margin: 0 auto 20px;
  }
  
  .nav-links {
    display: flex;
    flex-direction: column;
  }
  
  .nav-item {
    margin-bottom: 10px;
    color: white;
    text-decoration: none;
  }
  
  .nav-item:hover {
    text-decoration: underline;
  }
  
  .main-content {
    padding: 20px;
    flex: 1;
  }
  </style>
  