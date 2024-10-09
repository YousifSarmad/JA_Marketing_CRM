<template>
    <div class="register-container">
      <div class="register-box">
        <img class="logo" src="/image/image.png" alt="Logo" />
        <h2>Create an Account</h2>
  
        <form @submit.prevent="register">
          <div>
            <InputLabel for="name" value="Full Name" />
            <TextInput
              id="name"
              type="text"
              class="mt-1 block w-full"
              v-model="form.name"
              required
            />
            <InputError class="mt-2" :message="form.errors.name" />
          </div>
  
          <div class="mt-4">
            <InputLabel for="email" value="Email Address" />
            <TextInput
              id="email"
              type="email"
              class="mt-1 block w-full"
              v-model="form.email"
              required
            />
            <InputError class="mt-2" :message="form.errors.email" />
          </div>
  
          <div class="mt-4">
            <InputLabel for="password" value="Password" />
            <TextInput
              id="password"
              type="password"
              class="mt-1 block w-full"
              v-model="form.password"
              required
              autocomplete="new-password"
            />
            <InputError class="mt-2" :message="form.errors.password" />
          </div>
  
          <div class="mt-4">
            <InputLabel for="password_confirmation" value="Confirm Password" />
            <TextInput
              id="password_confirmation"
              type="password"
              class="mt-1 block w-full"
              v-model="form.password_confirmation"
              required
            />
            <InputError class="mt-2" :message="form.errors.password_confirmation" />
          </div>
  
          <PrimaryButton class="mt-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
            Register
          </PrimaryButton>
        </form>
  
        <p class="mt-4">
          Already have an account?
          <Link href="/login" class="underline">Log in</Link>
        </p>
      </div>
    </div>
  </template>
  
  <script setup>
  import { useForm } from '@inertiajs/vue3';
  import { Head, Link } from '@inertiajs/vue3';
  import InputLabel from '@/Components/InputLabel.vue';
  import TextInput from '@/Components/TextInput.vue';
  import InputError from '@/Components/InputError.vue';
  import PrimaryButton from '@/Components/PrimaryButton.vue';
  
  const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
  });
  
  const register = () => {
    form.post(route('register'));
  };
  </script>
  
  <style scoped>
  .register-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #000;
  }
  
  .register-box {
    width: 400px;
    padding: 40px;
    background-color: #fff;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    text-align: center;
  }
  
  .logo {
    margin-bottom: 20px;
  }
  
  h2 {
    font-size: 1.5em;
    margin-bottom: 20px;
    color: #333;
  }
  </style>
  