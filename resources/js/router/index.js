import {createRouter, createWebHistory} from 'vue-router';
import UserList from "../components/UserList.vue";
import UserForm from "../components/UserForm.vue";


const routes = [
    {path: '/', component: UserList},
    {path: '/create', component: UserForm},
    {path: '/users', component: UserList},
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
