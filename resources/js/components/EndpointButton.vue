<template>
    <span class="px-2 py-2 bg-gray-300 rounded mt-10 cursor-pointer hover:bg-gray-400 focus:bg-green-400 transition duration-100 ease-in-out" v-clipboard:copy="this.link" v-clipboard:success="alertSuccess">{{this.endpoint}}</span>
</template>

<script>
    export default {
        data() {
            return {

            }
        },
        methods: {
            alertSuccess() {
                alert(this.link + " copied!")
            }
        },
        props: ['endpoint'],
        computed: {
            link() {
                return window.location.href + this.endpoint
            }
        }
    }
</script>

<style scoped>

</style>
