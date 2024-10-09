<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <div class="login-container">
        <div class="login-box">
            <img class="logo" src="/image/image.png" alt="Logo" />
            <h2>Login to your account</h2>

            <form @submit.prevent="submit">
                <div>
                    <InputLabel for="email" value="Email address *" />
                    <TextInput
                        id="email"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="username"
                    />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4">
                    <InputLabel for="password" value="Password *" />
                    <TextInput
                        id="password"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                    />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="block mt-4">
                    <label class="flex items-center">
                        <Checkbox name="remember" v-model:checked="form.remember" />
                        <span class="ms-2 text-sm text-gray-600">Remember me</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <Link
                        v-if="canResetPassword"
                        :href="route('password.request')"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Forgot your password?
                    </Link>

                    <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Sign in
                    </PrimaryButton>
                    <p class="mt-4">
                        Don’t have an account?
                        <Link href="/register" class="underline">Create one now</Link>
                    </p>

                </div>
            </form>
        </div>
    </div>
</template>

<style scoped>
/* Custom CSS to match the Figma design */
.login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #000; /* Match the background color from Figma */
}

.login-box {
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

.input-group {
    margin-bottom: 20px;
    text-align: left;
}

.input-group label {
    font-size: 0.9em;
    color: #555;
}

.input-group input {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.submit-btn {
    width: 100%;
    padding: 10px;
    background-color: #000; /* Adjust based on Figma's button color */
    color: #fff;
    border: none;
    border-radius: 5px;
}

</style>
