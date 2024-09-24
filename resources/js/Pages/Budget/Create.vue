<template>
    <div>
        <h1>Set Your Daily Ad Budget</h1>
        <form @submit.prevent="submit">
            <div>
                <label for="daily_ad_spend">Daily Ad Spend ($):</label>
                <input v-model="form.daily_ad_spend" type="number" id="daily_ad_spend" min="1" required />
                <span v-if="errors.daily_ad_spend" class="error">{{ errors.daily_ad_spend }}</span>
            </div>
            <button type="submit">Calculate</button>
        </form>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    daily_ad_spend: '',
});

const submit = () => {
    form.post(route('budget.store'));
};
</script>

<style scoped>
/* Add your styles here */
</style>
