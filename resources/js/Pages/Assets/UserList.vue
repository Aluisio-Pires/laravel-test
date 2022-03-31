<script setup>
import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue';
import User from "./User";

defineProps({
    users: Object,
});
</script>

<template>
    <div>
        <div v-for="u in users" :key="u.id" class="bg-white rounded-lg">
            <user :user="u"/>
        </div>
    </div>
</template>
