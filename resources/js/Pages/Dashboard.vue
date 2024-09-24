<template>
  <div class="lead-card">
    <div class="lead-info">
      <h3>{{ lead.name }}</h3>
      <p>{{ lead.time_ago }}</p>
      <div class="lead-contact">
        <span><i class="fas fa-calendar"></i> {{ lead.date_received }}</span>
        <span><i class="fas fa-phone"></i> {{ lead.phone }}</span>
        <span><i class="fas fa-envelope"></i> {{ lead.email }}</span>
      </div>
    </div>
    <div class="actions">
      <button @click="callLead(lead)">Call</button>
      <button @click="emailLead(lead)">Email</button>
      <button @click="smsLead(lead)">SMS</button>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    lead: Object
  },
  methods: {
    callLead(lead) {
      console.log(`Calling ${lead.phone}`);
      // Add actual call logic here, e.g., using Twilio
    },
    emailLead(lead) {
      console.log(`Emailing ${lead.email}`);
      // Add email logic here
    },
    smsLead(lead) {
      console.log(`Sending SMS to ${lead.phone}`);
      // Add SMS logic here
    }
  }
};
</script>

<style scoped>
/* Add your styles */
</style>
