<template>
    <Head title="Project" />

    <AppLayout>
        <template #header>
            Project List
        </template>

        <DataTable :collections="projects" :filters="filters" :dateFilter="true">
            <template #head>
                <th class="py-3 px-2 text-left">ID</th>
                <th class="py-3 px-2 text-left">Name</th>
            </template>
            <template #default="{item: project}">
                <td class="py-3 px-2 text-left">{{ project.id }}</td>
                <td class="py-3 px-2 text-left">{{ project.name }}</td>
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
    props: {
        projects: { type: Object, default: {} },
        filters: { type: Object, default: {} },
    },
};
</script>
