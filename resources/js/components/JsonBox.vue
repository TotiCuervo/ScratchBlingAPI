<template>
    <div class="bg-gray-300 rounded-lg p-2">
        <p v-if="example" class="text-gray-600 pb-2">// {{example}}</p>
        <vue-json-pretty v-if="isString" class="w-full overflow-auto text-black max-h-500" :data='JSON.parse(data)'></vue-json-pretty>
        <vue-json-pretty v-else class="w-full overflow-auto text-black max-h-500" :data='data'></vue-json-pretty>
    </div>
</template>

<script>
    import VueJsonPretty from 'vue-json-pretty'
    export default {
        data() {
            return {

            }
        },
        components: {
            VueJsonPretty
        },
        props: ['data', 'example'],
        computed: {
            isString() {
                return typeof(this.data) === "string";
            }
        }
    }
</script>

<style scoped>
</style>
