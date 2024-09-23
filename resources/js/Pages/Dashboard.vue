<template>
    <div class="dashboard-container">
        <header class="dashboard-header">
            <img src="/images/logo.png" alt="Logo" class="logo" />
            <h1>Welcome, {{ user.name }}</h1>
        </header>

        <section class="budget-section">
            <h2>Your Budget</h2>
            <p>${{ budget }}</p>
        </section>

        <section class="leads-section">
            <h2>Your Leads</h2>
            <div v-if="leads.length">
                <ul class="leads-list">
                    <li v-for="lead in leads" :key="lead.id">
                        <h3>{{ lead.title }}</h3>
                        <p>{{ lead.description }}</p>
                        <p><strong>Value:</strong> ${{ lead.lead_value }}</p>
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
import { usePage } from '@inertiajs/vue3';

const { user, budget, leads } = usePage().props;
</script>

<style scoped>
.dashboard-container {
    padding: 20px;
    background-color: #f9f9f9;
}

.dashboard-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.logo {
    height: 50px;
}

.budget-section,
.leads-section {
    margin-top: 20px;
}

.leads-list {
    list-style: none;
    padding: 0;
}

.leads-list li {
    background-color: #fff;
    padding: 20px;
    margin-bottom: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}
</style>
