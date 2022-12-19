<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import {useForm} from "@inertiajs/inertia-vue3";
defineProps({
    user: Object,
    permissions: Array,
});
</script>
<template>
    <AppLayout title="User Details">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               User Details
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <div class="grid grid-rows-2 grid-flow-col gap-4">
                                        <div class="row-start-1 row-end-4">
                                            <table class="min-w-full border text-center">
                                                <tbody>
                                                <tr class="border-b">
                                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                                        Name
                                                    </th>
                                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                                        {{ user.name }}
                                                    </td>
                                                </tr>
                                                <tr class="border-b">
                                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                                        Email
                                                    </th>
                                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                                        {{ user.email }}
                                                    </td>
                                                </tr>
                                                <tr class="border-b">
                                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                                        Role
                                                    </th>
                                                    <td v-if="user.role == 1" class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                                        Super Admin
                                                    </td>
                                                    <td v-else class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                                        Sub Admin
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row-start-1 row-end-4">
                                            <table class="min-w-full border text-center">
                                                <thead class="border-b">
                                                <tr>
                                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                                        Permission
                                                    </th>
                                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                                        Status
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr v-for="(permission) in permissions" class="border-b">
                                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                                        {{ permission.permission }}
                                                    </td>
                                                    <td v-if="permission.value == 1" class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                                        Yes
                                                    </td>
                                                    <td v-else class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                                        No
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
