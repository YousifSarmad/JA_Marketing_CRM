<template>
  <div class="dashboard-container">
    <!-- Sidebar -->
    <aside class="sidebar">
      <img src="/image/image.png" alt="Logo" class="logo" />
      <nav>
        <ul>
          <li><router-link to="/leads">New Leads</router-link></li>
          <li><router-link to="/contacts">Contacts</router-link></li>
          <li><router-link to="/pipeline">Pipeline</router-link></li>
          <li><router-link to="/calendar">Calendar</router-link></li>
          <li><router-link to="/messages">Messages</router-link></li>
          <li><router-link to="/profile">Profile</router-link></li>
        </ul>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
      <header class="dashboard-header">
        <h1>New Leads</h1>
        <p v-if="leads.length === 0">No New Leads Yet</p>
        <p v-else>Your Leads: {{ leads.length }}</p>
      </header>
      
      <!-- Leads display placeholder -->
      <section class="leads-section">
        <div v-if="leads.length === 0" class="no-leads">
          <img src="/image/no-leads.png" alt="No Leads">
          <p>No New Leads Yet</p>
          <p>As soon as you receive a new lead, it will appear here!</p>
        </div>
      </section>
    </main>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';

// Fetching user and leads
const { leads } = usePage().props;
</script>

<style scoped>
.dashboard-container {
  display: flex;
  height: 100vh;
}

.sidebar {
  width: 250px;
  background-color: #f9f9f9;
  padding: 20px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.logo {
  display: block;
  margin-bottom: 30px;
}

nav ul {
  list-style: none;
  padding: 0;
}

nav ul li {
  margin-bottom: 20px;
}

nav ul li a {
  text-decoration: none;
  color: #333;
  font-size: 18px;
}

.main-content {
  flex-grow: 1;
  padding: 30px;
}

.dashboard-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
}

.leads-section {
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  text-align: center;
}

.no-leads img {
  width: 150px;
  margin-bottom: 20px;
}

.no-leads p {
  color: #666;
  font-size: 16px;
  margin: 5px 0;
}
</style>
