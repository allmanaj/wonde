<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import StudentList from '@/Components/Dashboard/StudentList.vue';

const props = defineProps({classData: Object})

function back() {
    window.history.back()
}

function lessons() {
    return [ ...new Set(props.classData.lessons.data.map(lesson => `${lesson.period.data.day}`)) ].join(', ')
}

</script>

<template>
    <Head title="Class" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Class: {{ classData.name }}</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <a href="#" @click="back" class="inline-flex items-center px-4 py-2 text-lg text-gray-500 hover:text-gray-900 transition-colors duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                        Back
                    </a>
                    <div class="p-6 text-gray-900">
                        <h2 class="text-gray-900 text-xl mb-4 capitalize">{{ classData.name }} - {{ lessons() }}</h2>
                        <StudentList :students="classData.students.data"/>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
