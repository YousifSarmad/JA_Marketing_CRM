<template>
    <div>
        <h1>Payment Page</h1>
        <!-- Payment logic here -->
        <button @click="makePayment">Start Subscription</button>
    </div>
</template>

<script setup>
const makePayment = () => {
    // Logic to handle payment goes here
    // On success:
    window.location.href = '/dashboard';
};
</script>
