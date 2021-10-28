<template>
    <div class="w-full flex justify-start flex-wrap">

        <div class="w-full md:w-auto flex-auto justify-center items-center flex order-first md:order-2">
            <div class="w-full md:w-auto flex flex-wrap md:pb-0 pb-4">
                <div class="flex md:w-auto w-1/2 justify-center">
                    <select @change="search" class="filter block w-full mx-px max-w-xs">
                        <option value="" selected>(All)</option>
                    </select>
                </div>

                <div class="flex md:w-auto w-full justify-center">
                    <select id="day" name="day" class="filter block w-full mx-px">
                        <option value="" selected> All Date</option>
                        <option value="7"> Last 7 days</option>
                        <option value="15"> Last 15 days</option>
                        <option value="30"> Last 30 days</option>
                        <option value="90"> Last 90 days</option>
                    </select>
                </div>

                <div id="dateFromContainer" class="flex md:w-auto w-1/2 justify-center">
                    <input @input="search" name="from" type="date" class="filter block w-full mx-px" />
                </div>
                <div id="dateToContainer" class="flex md:w-auto w-1/2 justify-center">
                    <input @input="search" name="to" type="date" class="filter block w-full mx-px" />
                </div>
            </div>
        </div>

    </div>

    <div class="w-full flex justify-between py-2">
        <div class="flex">
            <select @change="searchHandler" class="block w-full rounded-md shadow-sm focus:outline-none focus:ring-0 cursor-pointer" v-model="perpage">
                <option value="100">100</option>
                <option value="50">50</option>
                <option value="25">25</option>
                <option value="15">15</option>
            </select>
        </div>

        <div class="flex">
            <input @input="searchHandler" class="block w-full rounded-md shadow-sm focus:outline-none focus:ring-0" type="search" v-model="search" placeholder="Search here ..." />
        </div>
    </div>

    <div class="overflow-auto relative">
        <table class="min-w-max w-full table-auto">
            <thead>
                <!-- <tr v-if="collections.total">
                    <td class="py-3 px-2 text-center" colspan="100">
                        <paginator-links :collections="collections" />
                    </td>
                </tr> -->
                <tr class="bg-blue-600 text-white uppercase text-sm leading-normal">
                    <th class="py-3 px-2 text-left sticky left-0 bg-blue-600">SL</th>

                    <slot name="head" />
                </tr>
            </thead>

            <tbody class="text-gray-600 text-sm font-light bg-white">

                <tr v-for="(item, index) in collections.data" :key="item.id" class="border-b border-gray-200 hover:bg-gray-50">
                    <td class="py-3 px-2 text-left sticky left-0 bg-white">
                        {{ collections.from + index }}
                    </td>

                    <slot name="body" :item="item" />
                </tr>

                <tr v-if="! collections.total" class="border-b border-gray-200 hover:bg-gray-50">
                    <td colspan="100" class="py-3 px-2 text-center text-red-500">
                        No data found !!
                    </td>
                </tr>
            </tbody>

            <tfoot v-if="collections.total">
                <tr>
                    <td class="py-3 px-2 text-center" colspan="100">
                        <PaginatorLinks :collections="collections" />
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</template>

<script>
import PaginatorLinks from './PaginatorLinks.vue'
export default {
    components: { PaginatorLinks },
    props: {
        collections: Object,
    },
    data() {
        return {
            perpage: this.collections.per_page,
            search: ''
        }
    },
    methods: {
        searchHandler() {
            this.$inertia.get(this.route('projects.index', {
                search : this.search,
                perpage: this.perpage,
            }), {}, { preserveState: true })
        }
    }
}
</script>
