<template>
    <div class="users">
        <h2 class="users__title">Список пользователей</h2>


        <div class="users__list">
            <div class="users__list_item" v-for="user in users">
                <h3>{{ user.name }}</h3>
                <div class="user__email">
                    {{ user.email }}
                </div>
                <div class="user__description">{{ user.description }}</div>
            </div>
        </div>


    </div>
</template>

<script>
import {onMounted, ref} from 'vue';
import axios from 'axios';

export default {
    setup() {
        const users = ref([]);

        const fetchUsers = () => {

            axios
                .get('/users')
                .then((response) => {
                    users.value = users.value.concat(response.data);
                })
                .catch((error) => {
                    console.error('Не удалось загрузить объявления:', error);
                })
                ;
        };

        onMounted(() => {
            fetchUsers();
        });

        return {
            users,
            fetchUsers,
        };
    },
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

.users {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 800px;
    width: 100%;
    margin: 0 auto;
}

.users__title {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
    color: #333;
    text-align: center;
}

.users__list {
    display: grid;
    grid-template-columns: 1fr;
    gap: 20px;
}

.users__list_item {
    background-color: #f9f9f9;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.users__list_item:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

.users__list_item h3 {
    font-size: 20px;
    margin: 0;
    color: #4CAF50;
}

.user__email {
    font-size: 16px;
    color: #777;
    margin-top: 8px;
}

.user__description {
    margin-top: 12px;
    font-size: 14px;
    color: #555;
    line-height: 1.5;
}
</style>
