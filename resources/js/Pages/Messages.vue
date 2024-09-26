<template>
    <div class="messages-container">
      <h1>Messages</h1>
      <p>No messages yet.</p>
      <!-- Add functionality for listing messages later -->
    </div>
  </template>
  
  <script>
  export default {
    name: 'Messages',
    data() {
      return {
        // You can add message data here
      };
    },
  };
  </script>
  
  <style scoped>
  .messages-container {
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    max-width: 800px;
    margin: 0 auto;
  }
  
  h1 {
    font-size: 24px;
    color: #333;
  }
  
  p {
    color: #777;
  }
  </style>
  