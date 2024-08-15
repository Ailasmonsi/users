<template>
    <nav class="navigation">
        <router-link to="/" class="nav-link">Главная</router-link>
        <router-link to="/create" class="nav-link">Создать пользователя</router-link>
    </nav>
</template>

<style scoped>
.navigation {
    background-color: #007bff;
    padding: 10px 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

.nav-link {
    color: white;
    text-decoration: none;
    margin: 0 15px;
    padding: 10px 15px;
    border-radius: 4px;
    transition: background-color 0.3s;
}

.nav-link:hover {
    background-color: #0056b3;
}
</style>
<script setup lang="ts">
</script>
