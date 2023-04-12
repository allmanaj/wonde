<template>
    <ul class="space-y-2">
        <li v-for="student in students">
            <div
                class="block rounded shadow py-2 px-3 bg-blue-50 hover:bg-blue-200 transition-colors duration-150"
            >
                {{ student.forename }} {{ student.surname }}
            </div>
        </li>
    </ul>
</template>
<script setup>
const props = defineProps(['students'])

</script>
