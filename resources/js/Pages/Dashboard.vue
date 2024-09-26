<template>
  <div class="dashboard-container">
    <header class="dashboard-header">
      <h2>Dashboard</h2>
    </header>

    <section class="dashboard-content">
      <div class="budget-section">
        <h3>Your Budget: ${{ budget }}</h3>
        <p>Your Leads: {{ leads.length }}</p>
      </div>

      <div class="no-leads-section">
        <img src="/image/no_leads_icon.png" alt="No Leads" />
        <h4>No New Leads Yet</h4>
        <p>
          As soon as you receive a new lead, it will appear here! Keep your
          communication tools ready.
        </p>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  props: {
    budget: Number,
    leads: Array
  }
};
</script>

<style scoped>
.dashboard-container {
  max-width: 1000px;
  margin: 0 auto;
  padding: 20px;
}

.dashboard-header {
  text-align: center;
  margin-bottom: 30px;
}

.budget-section {
  text-align: center;
  margin-bottom: 40px;
}

.no-leads-section {
  text-align: center;
  padding: 40px;
  background-color: #fff;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
}

.no-leads-section img {
  max-width: 150px;
  margin-bottom: 20px;
}

.no-leads-section h4 {
  margin-bottom: 10px;
  font-size: 1.5rem;
}
</style>
