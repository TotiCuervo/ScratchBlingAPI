<template>
    <div class="w-full md:w-1/4 rounded overflow-hidden shadow-lg bg-white md:mx-2 mb-4">
        <div class="flex flex-wrap h-full">
            <div class="w-full px-6 py-4">
                <!--Name-->
                <div v-if="!data.item_name" class="font-bold text-xl mb-2">Item Name</div>
                <div v-else class="font-bold text-xl">{{data.item_name}}</div>
                <!--Item Cost-->
                <p class="text-sm font-bold float-right block mb-2 w-full" v-if="!data.item_cost">$Cost</p>
                <p class="text-sm font-bold float-right block mb-2 w-full" v-else>${{data.item_cost}}</p>
                <!--Description-->
                <p v-if="!data.item_description" class="text-gray-700 text-base">Item Description</p>
                <p v-else class="text-gray-700 text-base">{{data.item_description}}</p>
            </div>
            <div class="w-full self-end px-6 py-4">
                <!--Item Size-->
                <span v-if="!data.item_size" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">Item Size</span>
                <span v-else v-for="size in data.item_size" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">{{size}}</span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {

            }
        },
        props: ['data']
    }
</script>

<style scoped>

</style>
