<template>
  <div class="dashboard-container">
    <header class="dashboard-header">
      <img src="/image/image.png" alt="Logo" class="logo" />
      <h1>Welcome, {{ user.name }}</h1>
    </header>

    <!-- Budget Information -->
    <section class="budget-section">
      <h2>Your Budget</h2>
      <p><strong>Total Budget:</strong> ${{ budget.toFixed(2) }}</p>
    </section>

    <!-- Leads Information -->
    <section class="leads-section">
      <h2>Your Leads</h2>
      <div v-if="leads.length">
        <ul class="leads-list">
          <li v-for="lead in leads" :key="lead.id" class="lead-card">
            <h3>{{ lead.name }}</h3>
            <p>Received: {{ lead.time_ago }}</p>
            <div class="lead-contact">
              <span><i class="fas fa-calendar"></i> {{ lead.date_received }}</span>
              <span><i class="fas fa-phone"></i> {{ lead.phone }}</span>
              <span><i class="fas fa-envelope"></i> {{ lead.email }}</span>
            </div>
            <div class="actions">
              <button @click="callLead(lead)">Call</button>
              <button @click="emailLead(lead)">Email</button>
              <button @click="smsLead(lead)">SMS</button>
            </div>
          </li>
        </ul>
      </div>
      <div v-else>
        <p>No leads available.</p>
      </div>
    </section>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';

// Get user, budget, and leads data from backend
const { user, budget, leads } = usePage().props;

// Functions for actions
const callLead = (lead) => {
  console.log(`Calling ${lead.phone}`);
  // Add API integration for calling
};

const emailLead = (lead) => {
  console.log(`Emailing ${lead.email}`);
  // Add API integration for sending email
};

const smsLead = (lead) => {
  console.log(`Sending SMS to ${lead.phone}`);
  // Add API integration for sending SMS
};
</script>

<style scoped>
.dashboard-container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
  background-color: #fff;
}

.dashboard-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #333;
  color: white;
  padding: 20px;
  border-radius: 10px;
}

.leads-list {
  list-style-type: none;
  padding: 0;
}

.lead-card {
  background-color: #f9f9f9;
  padding: 15px;
  margin-bottom: 10px;
  border-radius: 5px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.actions button {
  margin-right: 10px;
  padding: 10px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.actions button:hover {
  background-color: #0056b3;
}
</style>
