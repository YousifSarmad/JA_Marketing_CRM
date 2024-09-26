<template>
    <div class="leads-page">
      <h2>New Leads</h2>
      <div class="no-leads">
        <img src="/image/No_leads_icon.png" alt="No Leads Icon" class="no-leads-icon" />
        <p>No New Leads Yet</p>
        <small>
          As soon as you receive a new lead, it will appear here. Keep your communication tools ready!
        </small>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'LeadsPage',
  };
  </script>
  
  <style scoped>
  .leads-page {
    padding: 40px;
  }
  
  .no-leads {
    text-align: center;
    margin-top: 50px;
  }
  
  .no-leads-icon {
    height: 120px;
    margin-bottom: 20px;
  }
  
  p {
    font-size: 24px;
    font-weight: 600;
  }
  
  small {
    color: #7d7d7d;
  }
  </style>
  