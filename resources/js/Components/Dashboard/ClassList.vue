<template>
    <ul class="space-y-2">
        <li v-for="classObject in classes">
            <Link
                class="block rounded shadow py-2 px-3 bg-blue-50 hover:bg-blue-200 cursor-pointer transition-colors duration-150"
                :href="`/classes/${classObject.id}`"
            >
                {{ classObject.name }}
            </Link>
        </li>
    </ul>
</template>
<script setup>
import {Link} from '@inertiajs/vue3'
const props = defineProps(['classes'])

</script>
