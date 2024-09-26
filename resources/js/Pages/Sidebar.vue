<template>
  <div class="sidebar-container">
    <img src="/image/image.png" alt="Logo" class="logo" />
    <nav class="sidebar-nav">
      <router-link to="/dashboard" class="nav-item" :class="{ active: isActive('/dashboard') }">
        <img src="/image/file_icon.png" alt="New Leads" class="icon" /> Dashboard
      </router-link>
      <router-link to="/contacts" class="nav-item" :class="{ active: isActive('/contacts') }">
        <img src="/image/contacts_icon.png" alt="Contacts" class="icon" /> Contacts
      </router-link>
      <router-link to="/pipeline" class="nav-item" :class="{ active: isActive('/pipeline') }">
        <img src="/image/pipeline_icon.png" alt="Pipeline" class="icon" /> Pipeline
      </router-link>
      <router-link to="/calendar" class="nav-item" :class="{ active: isActive('/calendar') }">
        <img src="/image/calendar_icon.png" alt="Calendar" class="icon" /> Calendar
      </router-link>
      <router-link to="/messages" class="nav-item" :class="{ active: isActive('/messages') }">
        <img src="/image/messages_icon.png" alt="Messages" class="icon" /> Messages
      </router-link>
      <router-link to="/profile" class="nav-item" :class="{ active: isActive('/profile') }">
        <img src="/image/profile_icon.png" alt="Profile" class="icon" /> Profile
      </router-link>
    </nav>
  </div>
</template>

<script setup>
import { useRoute } from 'vue-router';

const route = useRoute();

const isActive = (path) => route.path === path;
</script>

<style scoped>
.sidebar-container {
  width: 250px;
  background-color: #f9f9f9;
  padding: 20px;
  border-right: 1px solid #e0e0e0;
  min-height: 100vh;
}

.logo {
  margin-bottom: 40px;
}

.sidebar-nav {
  display: flex;
  flex-direction: column;
}

.nav-item {
  display: flex;
  align-items: center;
  padding: 15px;
  color: #333;
  text-decoration: none;
  margin-bottom: 10px;
  font-size: 16px;
  transition: background-color 0.2s ease;
}

.nav-item .icon {
  margin-right: 15px;
  height: 24px;
}

.nav-item.active {
  background-color: #333;
  color: white;
}

.nav-item:hover {
  background-color: #e0e0e0;
}
</style>
