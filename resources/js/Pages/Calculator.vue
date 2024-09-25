<template>
  <div class="login-container">
    <!-- Logo -->
    <img class="logo" src="/images/logo.png" alt="Logo" />

    <h2>Calculate Your Budget</h2>

    <!-- Form for user inputs -->
    <form @submit.prevent="calculateBudget" class="form">
      <div class="input-group">
        <label for="dailySpend">Daily Ad Spend</label>
        <input v-model="dailySpend" type="number" id="dailySpend" placeholder="Enter daily ad spend" required />
      </div>

      <div class="input-group">
        <label for="costPerLead">Average Cost Per Lead (CPL)</label>
        <input v-model="costPerLead" type="number" id="costPerLead" placeholder="Enter average CPL" required />
      </div>

      <div class="input-group">
        <label for="closeRate">Close Rate (%)</label>
        <input v-model="closeRate" type="number" id="closeRate" placeholder="Enter close rate" required />
      </div>

      <div class="input-group">
        <label for="averageSale">Average Sale</label>
        <input v-model="averageSale" type="number" id="averageSale" placeholder="Enter average sale" required />
      </div>

      <!-- Slider for Adjusting Leads -->
      <div class="input-group slider">
        <label for="numberOfLeads">Adjust Leads:</label>
        <input v-model="estimatedLeads" type="range" min="0" max="100" step="1" id="numberOfLeads" />
        <p>{{ estimatedLeads }} leads</p>
      </div>

      <button type="submit" class="submit-btn">Calculate</button>
    </form>

    <!-- Output -->
    <div v-if="estimatedLeads || estimatedRevenue" class="results">
      <h3>Results</h3>
      <p><strong>Total Budget:</strong> ${{ totalBudget }}</p>
      <p><strong>Daily Budget:</strong> ${{ dailySpend }}</p>
      <p><strong>Estimated Leads:</strong> {{ estimatedLeads }}</p>
      <p><strong>Estimated Daily Revenue:</strong> ${{ estimatedRevenue }}</p>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

// Variables for form inputs and outputs
const dailySpend = ref(0);
const costPerLead = ref(0);
const closeRate = ref(10); // Default value set to 10%
const averageSale = ref(500); // Default value set to $500
const estimatedLeads = ref(42); // Default leads
const estimatedRevenue = ref(0);
const totalBudget = ref(0);

// Function to calculate estimated leads and revenue
const calculateBudget = () => {
  const spendForLeads = dailySpend.value * 0.667;
  estimatedLeads.value = spendForLeads / costPerLead.value;
  estimatedRevenue.value = estimatedLeads.value * (closeRate.value / 100) * averageSale.value;
  totalBudget.value = dailySpend.value * 30; // Assuming budget for 30 days.
};
</script>

<style scoped>
/* Style similar to the login page */
.login-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background-color: #f7f8fa;
  padding: 20px;
}

.logo {
  width: 150px;
  margin-bottom: 20px;
}

h2 {
  font-size: 24px;
  color: #333;
  margin-bottom: 20px;
}

.form {
  width: 100%;
  max-width: 400px;
  background-color: white;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.input-group {
  margin-bottom: 15px;
}

input {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.slider {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

input[type="range"] {
  flex-grow: 1;
  margin: 0 10px;
}

.submit-btn {
  width: 100%;
  padding: 10px;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
}

.results {
  margin-top: 20px;
  text-align: center;
}

.results p {
  font-size: 16px;
}
</style>
