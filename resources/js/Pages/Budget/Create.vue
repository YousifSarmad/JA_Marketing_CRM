<template>
    <div class="calculator-background">
      <div class="calculator-container">
        <img src="/image/image.png" alt="Logo" class="logo" />
        <h2>Calculate Your Budget</h2>
  
        <!-- Form for user inputs -->
        <form @submit.prevent="calculateBudget">
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
  
          <button type="submit" class="calculate-btn">Calculate</button>
          <button class="payment-btn">Next: Payment</button>
        </form>
  
        <!-- Output -->
        <div v-if="estimatedLeads || estimatedRevenue" class="results">
          <h3>Results</h3>
          <p>Estimated Number of Leads: {{ estimatedLeads }}</p>
          <p>Estimated Daily Revenue: ${{ estimatedRevenue }}</p>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  // Variables to hold form inputs and calculated outputs
  const dailySpend = ref(0);
  const costPerLead = ref(0);
  const closeRate = ref(10); // Default value as 10%
  const averageSale = ref(500); // Default value as $500
  const estimatedLeads = ref(0);
  const estimatedRevenue = ref(0);
  
  // Function to calculate estimated leads and revenue
  const calculateBudget = () => {
    // 66.7% of daily spend is used for ad costs
    const spendForLeads = dailySpend.value * 0.667;
  
    // Calculate the estimated leads based on cost per lead
    estimatedLeads.value = spendForLeads / costPerLead.value;
  
    // Calculate the estimated daily revenue
    estimatedRevenue.value = estimatedLeads.value * (closeRate.value / 100) * averageSale.value;
  
    // Ensure values are rounded to two decimals
    estimatedLeads.value = estimatedLeads.value.toFixed(2);
    estimatedRevenue.value = estimatedRevenue.value.toFixed(2);
  };
  </script>
  
  <style scoped>
  .calculator-background {
    background-color: #000;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  
  .calculator-container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
  }
  
  input {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  
  button {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
  }
  
  .calculate-btn {
    background-color: #007bff;
    color: #fff;
  }
  
  .payment-btn {
    background-color: #28a745;
    color: #fff;
    margin-top: 10px;
  }
  
  .results {
    margin-top: 20px;
  }
  
  .logo {
    display: block;
    margin: 0 auto 20px;
    height: 60px;
  }
  </style>
  