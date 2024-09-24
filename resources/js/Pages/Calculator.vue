<template>
    <div class="calculator">
      <h2>Ad Spend Calculator</h2>
      
      <label for="dailyAdSpend">Enter Daily Ad Spend:</label>
      <input v-model="dailyAdSpend" type="number" id="dailyAdSpend" placeholder="Enter amount">
  
      <p>Estimated Amount of Leads: {{ estimatedLeads }}</p>
      <p>Estimated Revenue: {{ estimatedRevenue }}</p>
  
      <div>
        <label for="closeRate">Close Rate (default 10%):</label>
        <input v-model="closeRate" type="number" step="0.01" id="closeRate" placeholder="Close rate" />
      </div>
      
      <div>
        <label for="avgSale">Average Sale (default $500):</label>
        <input v-model="avgSale" type="number" id="avgSale" placeholder="Average sale" />
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        dailyAdSpend: 0,
        closeRate: 0.10, // Default close rate
        avgSale: 500, // Default average sale
        costPerLead: 10 // Update this with real data when needed
      };
    },
    computed: {
      estimatedLeads() {
        return (this.dailyAdSpend * 0.667) / this.costPerLead;
      },
      estimatedRevenue() {
        return this.estimatedLeads * this.closeRate * this.avgSale;
      }
    }
  }
  </script>
  
  <style scoped>
  /* Add some basic styles */
  .calculator {
    max-width: 600px;
    margin: 0 auto;
  }
  input {
    display: block;
    margin: 10px 0;
  }
  </style>
  