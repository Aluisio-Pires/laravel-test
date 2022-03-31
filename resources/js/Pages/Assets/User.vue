<script setup>
defineProps({
    user: Object,
});
</script>

<template>
    <div class="m-4">
        <div class="w-full py-2 hover:bg-gray-200 rounded-lg">
            <div class="grid grid-cols-3 place-content-around">
                <div class="flex ml-3">
                    <img class="h-10 w-10 rounded-full object-cover flex"
                         :src="user.profile_photo_url" alt="Profile Picture"/>
                    <a class="flex ml-3 my-auto md:text-md lg:text-lg"><strong>{{ user.name }}</strong> </a>
                </div>
                <a class="flex ml-3 my-auto break-all md:text-md lg:text-lg "><strong>Email: {{ user.email }}</strong> </a>
                <a class="flex ml-3 my-auto break-all md:text-md lg:text-lg"><strong>Telefone: {{ user.phone }}</strong> </a>
            </div>
        </div>

    </div>
</template>
