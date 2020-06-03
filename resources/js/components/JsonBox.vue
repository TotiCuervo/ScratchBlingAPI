<template>
    <div class="bg-gray-300 rounded-lg">
<!--        <pre class="w-full overflow-auto p-2" style="height:500px;">-->
<!--        </pre>-->
        <vue-json-pretty class="w-full overflow-auto p-2 text-black max-h-500" :data='JSON.parse(data)'></vue-json-pretty>
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
        props: ['data']
    }
</script>

<style scoped>
    .vjs-value .vjs-value__string {
        color: black !important;
    }
</style>
