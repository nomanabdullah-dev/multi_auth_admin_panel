<template>
    <admin-layout>
        <template #header>
            <div class="flex justify-between items-center">
                <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                    Admins
                </h1>
            </div>
        </template>

        <div class="text-center my-4" v-if="$page.props.success">
            <span class="text-xl bg-blue-500 text-gray-50 px-2 rounded-md">{{ $page.props.success }}</span>
        </div>

        <div class="px-6 py-2">
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <td class="text-left pl-3">Role</td>
                        <td class="text-left">Name</td>
                        <td class="text-left">Created</td>
                        <td class="text-right pr-3">Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(admin,index) in admins" :key="index" class="text-center hover:bg-gray-600 hover:text-gray-50" :class="{'bg-gray-300' : index%2 === 0}">
                        <td class="text-left capitalize py-3 pl-3">{{ admin.roles[0].name }}</td>
                        <td class="text-left capitalize py-3">{{ admin.name }}</td>
                        <td class="text-left py-3">{{ admin.created_at }}</td>
                        <td class="py-3">
                            <div class="flex justify-end pr-3">
                                <green-button :href="(route('admin.admins.show', admin.id))" class="text-sm">Edit</green-button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </admin-layout>
</template>

<script>
    import AdminLayout from '@/Layouts/AdminLayout'
    import BlueButton from '@/Components/BlueButton'
    import GreenButton from '@/Components/GreenButton'
    export default {
        props: ['admins'],
        components: {
            AdminLayout,
            GreenButton,
            BlueButton,
        }
    }
</script>

<style lang="scss" scoped>

</style>
