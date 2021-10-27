<template>
  <Head title="Welcome" />

  <AppLayout>
    <template #header>
        Dashboard Lorem ipsum dolor sit amet consectetur!
    </template>

    <DataTable>
      <template #thead>
        <tr class="bg-blue-600 text-white uppercase text-sm leading-normal">
          <th class="py-3 px-2 text-left">ID</th>
          <th class="py-3 px-2 text-left">Name</th>
        </tr>
      </template>

      <tr v-for="project in projects.data" :key="project.id" class="border-b border-gray-200 hover:bg-gray-100">
        <td class="py-3 px-2 text-left">{{ project.id }}</td>
        <td class="py-3 px-2 text-left">{{ project.name }}</td>
      </tr>

      <template #tfoot>
        <tr>
          <td class="py-3 px-2 text-center" colspan="100" id="__paginationLinkContainer__">
            <div class="flex justify-end gap-1">
              <div v-for="link in projects.links" :key="link.index">
                <Link v-html="link.label" class="border px-2 py-0.5" :href="link.url" />
              </div>
            </div>
          </td>
        </tr>
      </template>
    </DataTable>
  </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/App.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import DataTable from "@/Components/DataTable.vue";

export default {
  components: {
    AppLayout,
    DataTable,
    Head,
    Link,
  },
  props: {
    projects: Object,
  },
};
</script>
