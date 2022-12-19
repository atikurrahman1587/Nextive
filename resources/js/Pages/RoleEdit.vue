<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import {useForm} from "@inertiajs/inertia-vue3";
defineProps({
    user: Object,
    permissions: Array,
});

function  ChangeRole(e)
{
    let value = document.getElementById('roleValue').value;
    useForm({
        id: e,
        value: value,
    }).post(route('change-role'), {
        onFinish: () => value.reset(),
    });
}
function UserPermission()
{
    let data = {
        user_id: document.getElementById('user_id').value,
        create_product: document.getElementById('create_product').value,
        view_product: document.getElementById('view_product').value,
        edit_product: document.getElementById('edit_product').value,
        delete_product: document.getElementById('delete_product').value,
    }
    useForm(data).post(route('user-permission'), {
        onFinish: () => data.reset(),
    });
}
</script>
<template>
    <AppLayout title="Role Edit">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Role Edit
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
                                            <table class="min-w-full border text-center">
                                                <thead class="border-b">
                                                <tr>
                                                    <th colspan="2" scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 border-r">
                                                       User Permission
                                                    </th>
                                                </tr>
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
                                            <div class="min-w-full border text-center mb-3 xl:w-96">
                                                <label for="changeRole" class="form-label inline-block mb-2 text-gray-700">Change Role</label>
                                                <select @change="ChangeRole(user.id)" class="form-select appearance-none
                                                  block
                                                  w-full
                                                  px-3
                                                  py-1.5
                                                  text-base
                                                  font-normal
                                                  text-gray-700
                                                  bg-white bg-clip-padding bg-no-repeat
                                                  border border-solid border-gray-300
                                                  rounded
                                                  transition
                                                  ease-in-out
                                                  m-0
                                                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="roleValue" aria-label="Default select example">
                                                    <option selected disabled>Choose role type</option>
                                                    <option :value="1">Make Super Admin</option>
                                                    <option :value="2">Make Sub Admin</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row-start-1 justify-center row-end-4">
                                            <h4 class="text-center">User Permission</h4>
                                            <hr/>
                                            <form method="POST" @submit.prevent="UserPermission">
                                                <div class="grid grid-rows-2 grid-flow-col gap-4">
                                                    <div class="row-start-1 row-end-4">
                                                        <div class="min-w-full justify-center mb-3 xl:w-96">
                                                            <label class="block" style="max-width: 300px">
                                                                <span class="text-gray-700">Create Product</span>
                                                                <select id="create_product" class="
                                                              w-full
                                                              px-3
                                                              py-1.5
                                                              text-base
                                                              font-normal
                                                              text-gray-700
                                                              bg-white bg-clip-padding bg-no-repeat
                                                              border border-solid border-gray-300
                                                              rounded
                                                              transition
                                                              ease-in-out
                                                              m-0
                                                              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none w-full mt-1">
                                                                    <option value="" selected disabled>Will you give access to Create Product?</option>
                                                                    <option :value="1">Yes</option>
                                                                    <option :value="0">No</option>
                                                                </select>
                                                            </label>
                                                            <input type="hidden" :value="user.id" id="user_id"/>
                                                        </div>
                                                        <div class="min-w-full justify-center mb-3 xl:w-96">
                                                            <label class="block" style="max-width: 300px">
                                                                <span class="text-gray-700">View Product</span>
                                                                <select id="view_product" class="
                                                                  w-full
                                                                  px-3
                                                                  py-1.5
                                                                  text-base
                                                                  font-normal
                                                                  text-gray-700
                                                                  bg-white bg-clip-padding bg-no-repeat
                                                                  border border-solid border-gray-300
                                                                  rounded
                                                                  transition
                                                                  ease-in-out
                                                                  m-0
                                                                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none w-full mt-1">
                                                                    <option value="" selected disabled>Will you give access to View Product?</option>
                                                                    <option :value="1">Yes</option>
                                                                    <option :value="0">No</option>
                                                                </select>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="row-start-1 row-end-4">
                                                        <div class="min-w-full justify-center mb-3 xl:w-96">
                                                            <label class="block" style="max-width: 300px">
                                                                <span class="text-gray-700">Edit Product</span>
                                                                <select id="edit_product" class="
                                                                  w-full
                                                                  px-3
                                                                  py-1.5
                                                                  text-base
                                                                  font-normal
                                                                  text-gray-700
                                                                  bg-white bg-clip-padding bg-no-repeat
                                                                  border border-solid border-gray-300
                                                                  rounded
                                                                  transition
                                                                  ease-in-out
                                                                  m-0
                                                                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none w-full mt-1">
                                                                    <option value="" selected disabled>Will you give access to Edit Product?</option>
                                                                    <option :value="1">Yes</option>
                                                                    <option :value="0">No</option>
                                                                </select>
                                                            </label>
                                                        </div>
                                                        <div class="min-w-full justify-center mb-3 xl:w-96">
                                                            <label class="block" style="max-width: 300px">
                                                                <span class="text-gray-700">Delete Product</span>
                                                                <select id="delete_product" class="
                                                              w-full
                                                              px-3
                                                              py-1.5
                                                              text-base
                                                              font-normal
                                                              text-gray-700
                                                              bg-white bg-clip-padding bg-no-repeat
                                                              border border-solid border-gray-300
                                                              rounded
                                                              transition
                                                              ease-in-out
                                                              m-0
                                                              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none w-full mt-1">
                                                                    <option value="" selected disabled>Will you give access to Delete Product?</option>
                                                                    <option :value="1">Yes</option>
                                                                    <option :value="0">No</option>
                                                                </select>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="min-w-full block justify-center mb-3 xl:w-96">
                                                    <button type="submit" class="
                                                      w-full
                                                      px-6
                                                      py-2.5
                                                      bg-blue-600
                                                      text-white
                                                      font-medium
                                                      text-xs
                                                      leading-tight
                                                      uppercase
                                                      rounded
                                                      shadow-md
                                                      hover:bg-blue-700 hover:shadow-lg
                                                      focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                                                      active:bg-blue-800 active:shadow-lg
                                                      transition
                                                      duration-150
                                                      ease-in-out">Submit</button>
                                                </div>
                                            </form>
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
