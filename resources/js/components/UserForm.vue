<template>
    <div>
        <form @submit.prevent="createUser" class="form">
            <div class="form__group">
                <label for="name" class="form__label">Name:</label>
                <input v-model="name" id="name" class="form__input" />
            </div>

            <div class="form__group">
                <label for="email" class="form__label">Email:</label>
                <input v-model="email" id="email" type="email" class="form__input" />
            </div>

            <div class="form__group">
                <label for="password" class="form__label">Password:</label>
                <input v-model="password" id="password" type="password" class="form__input" />
            </div>

            <span v-if="error" class="form__error">{{ error }}</span>

            <button type="submit" class="form__button">Create User</button>
        </form>
    </div>
</template>

<script setup>
import {ref} from 'vue';
import axios from 'axios';

const name = ref('');
const email = ref('');
const password = ref('');
const error = ref('');

const validateName = (name) => {
    const onlyNumbers = /^\d{1,12}$/;
    const onlyLetters = /^[a-zA-Z]{1,12}$/;
    return onlyNumbers.test(name) || onlyLetters.test(name);
};

const createUser = async () => {
    if (!validateName(name.value)) {
        alert('Неверный формат имени');
        return;
    }

    try {
        await axios.post('/users', {
            name: name.value,
            email: email.value,
            password: password.value,
        });
        alert('Пользователь успешно создан!');
        name.value = '';
        email.value = '';
        password.value = '';
        error.value = '';
    } catch (err) {
        console.error(err);
        error.value = 'Ошибка создания пользователя';
    }
};
</script>

<style scoped>
body {
    font-family: 'Arial', sans-serif;
    background-color: #f0f2f5;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.form {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
    box-sizing: border-box;
    margin: 0 auto;
}

.form__group {
    margin-bottom: 15px;
}

.form__label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    color: #333;
}

.form__input {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-sizing: border-box;
    font-size: 16px;
}

.form__input:focus {
    border-color: #4CAF50;
    outline: none;
    box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
}

.form__button {
    width: 100%;
    padding: 12px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.form__button:hover {
    background-color: #45a049;
}

.form__error {
    color: red;
    font-size: 14px;
    margin-top: -10px;
    margin-bottom: 10px;
    display: block;
}
</style>
