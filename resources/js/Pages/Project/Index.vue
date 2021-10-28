<template>
    <Head title="Project" />

    <AppLayout>
        <template #header>
            Project List
        </template>

        <DataTable :collections="projects">
            <template #head>
                <th class="py-3 px-2 text-left">ID</th>
                <th class="py-3 px-2 text-left">Name</th>
            </template>
            <template #body="{item}">
                <td class="py-3 px-2 text-left">{{ item.id }}</td>
                <td class="py-3 px-2 text-left">{{ item.name }}</td>
            </template>
        </DataTable>
    </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/App.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import DataTable from "@/Components/DataTable.vue";
import Input from '@/Components/Input.vue';
import PaginatorLinks from '@/Components/PaginatorLinks.vue';

export default {
    components: {
        AppLayout,
        DataTable,
        Head,
        Link,
        Input,
        PaginatorLinks,
    },
    data() {
        return {
            sl: 0,
        }
    },
    props: {
        projects: Object,
    },
};
</script>
