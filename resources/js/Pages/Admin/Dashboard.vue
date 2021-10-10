<template>
    <admin-layout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                Admin Dashboard
            </h1>
        </template>

        <div class="px-6 py-2">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure aliquid molestias aperiam autem corrupti facilis repudiandae asperiores voluptatibus magni alias, molestiae dolorum assumenda laborum necessitatibus fuga tenetur ipsa provident.
        </div>
    </admin-layout>
</template>

<script>
    import Welcome from '@/Pages/Welcome'
    import AdminLayout from '@/Layouts/AdminLayout'
    export default {
        components: {
            AdminLayout,
            Welcome
        }
    }
</script>

<style lang="scss" scoped>

</style>
