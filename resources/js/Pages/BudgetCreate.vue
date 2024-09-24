<template>
    <div>
      <h1>Set Your Daily Budget</h1>
      <form @submit.prevent="submitBudget">
        <div>
          <label for="amount">Daily Budget:</label>
          <input v-model="amount" type="number" id="amount" required />
        </div>
        <button type="submit">Submit</button>
      </form>
    </div>
  </template>
  
  <script>
  import { Inertia } from '@inertiajs/inertia';
  
  export default {
    data() {
      return {
        amount: 0
      };
    },
    methods: {
      submitBudget() {
        Inertia.post('/budget', {
          amount: this.amount
        });
      }
    }
  }
  </script>
  
  <style scoped>
  /* Style as needed */
  </style>
  