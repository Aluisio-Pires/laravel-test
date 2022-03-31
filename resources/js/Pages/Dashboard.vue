<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import UserList from "./Assets/UserList";

defineProps({
    users: Object,
});
</script>

<template>
    <AppLayout title="Painel de Controle">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Painel de Controle
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <user-list :users="users"/>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
