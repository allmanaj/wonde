<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import ClassList from '@/Components/Dashboard/ClassList.vue';

const props = defineProps({employee: Object, user: Object})

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="text-gray-900 text-xl mb-4">Classes</h2>
                        <ClassList :classes="employee.classes.data"/>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
