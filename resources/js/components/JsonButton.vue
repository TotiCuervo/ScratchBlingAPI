<template>
    <div class="bg-gray-300 hover:bg-gray-400 rounded-lg p-2 cursor-pointer">
        <vue-json-pretty v-clipboard:copy="data" v-clipboard:success="alertSuccess" class="w-full overflow-auto text-black max-h-500" :data='JSON.parse(data)'></vue-json-pretty>
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
        methods: {
            alertSuccess() {
                alert(this.data + " copied!")
            }
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
