<template>
    <div class="px-2 bg-gray-300 rounded cursor-pointer hover:bg-gray-400 focus:bg-green-400 transition duration-100 ease-in-out leading-loose" v-clipboard:copy="this.link" v-clipboard:success="alertSuccess">
         {{this.window + this.endpoint}}
    </div>
</template>

<script>
    export default {
        data() {
            return {
                window: window.location.href
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
