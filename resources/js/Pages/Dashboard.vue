<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
defineProps({
    products: Array,
    permission: Object,
});
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Manage product
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex space-x-2">
                        <div v-if="permission.create_product.value == 1">
                            <a href="#" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">+ Create Product</a>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full border text-center">
                                        <thead class="border-b">
                                        <tr>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                                #
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                                Category
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                                Product Name
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                                Price
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                                Qty
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(product) in products" class="border-b">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border-r">{{ product.id }}</td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                                {{ product.category }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                                {{ product.product_name }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                                {{ product.price }} TK
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                                {{ product.qty }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <a v-if="permission.view_product.value == 1" href="#" class="inline-block mr-2 px-6 py-2.5 bg-green-500 text-white font-medium text-sm leading-tight uppercase rounded shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out">View</a>
                                                <a v-if="permission.edit_product.value == 1" href="#" class="inline-block mr-2 px-6 py-2.5 bg-yellow-500 text-white font-medium text-sm leading-tight uppercase rounded shadow-md hover:bg-yellow-600 hover:shadow-lg focus:bg-yellow-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out">Edit</a>
                                                <a v-if="permission.delete_product.value == 1" href="#" class="inline-block mr-2 px-6 py-2.5 bg-red-600 text-white font-medium text-sm leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">Delete</a>
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
    </AppLayout>
</template>
