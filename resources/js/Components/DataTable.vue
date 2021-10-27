<template>
    <div class="w-full md:p-4 mb-4 md:mb-0 flex justify-start flex-wrap">
    <div class="flex w-1/3 md:w-auto mr-auto order-1 px-px">
        <select id="perpage" onchange="search()" class="block w-full">
            <option value="100">100</option>
            <option value="50">50</option>
            <option value="25">25</option>
            <option value="15">15</option>
        </select>
    </div>

    <div class="flex w-2/3 md:w-auto order-last px-px">
        <input id="search" oninput="search()" class="block w-full" type="search" value=""
            placeholder="Search here ..." />
    </div>

    <div class="w-full md:w-auto flex-auto justify-center items-center flex order-first md:order-2">
        <div class="w-full md:w-auto flex flex-wrap md:pb-0 pb-4">
            <div class="flex md:w-auto w-1/2 justify-center">
                <select onchange="search()" class="filter block w-full mx-px max-w-xs">
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
                <input oninput="search()" name="from" type="date" class="filter block w-full mx-px" />
            </div>
            <div id="dateToContainer" class="flex md:w-auto w-1/2 justify-center">
                <input oninput="search()" name="to" type="date" class="filter block w-full mx-px" />
            </div>
        </div>
    </div>

</div>

<div class="bg-white shadow-md rounded overflow-auto md:mx-4 relative">
    <table class="min-w-max w-full table-auto">
        <thead>
            <slot name="thead" />
        </thead>

        <tbody class="text-gray-600 text-sm font-light" id="tableBody">
            <slot />
        </tbody>

        <tfoot>
            <slot name="tfoot" />
        </tfoot>
    </table>
</div>
</template>
