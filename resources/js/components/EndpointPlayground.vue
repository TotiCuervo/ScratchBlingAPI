<template>
    <div class="w-full">
        <!--Request box-->
        <div class="w-1/2 mx-auto">
            <textarea-autosize v-model="endpoint" class="rounded shadow w-full p-3 outline-none" rows="1"></textarea-autosize>
        </div>
        <!--Request info-->
        <div class="w-1/2 mx-auto">
            <div class="bar-wrapper">
                <div class="w-full bar rounded pl-0">
                    <div class="flex items-center py-2">
                        <div class="relative overflow-visible h-8 mr-2" v-bind:class="{'z-20': clicked}">
                            <div class="dropdown-wrapper w-24">
                                <div class="flex items-center justify-between">
                                    <span @click="clicked = !clicked" class="w-full cursor-pointer appearance-none bg-transparent border-none text-gray-700 mr-3 px-2 leading-tight focus:outline-none">{{requestType}}</span>
                                    <span v-show="!clicked"><i class="fas fa-angle-up"></i></span>
                                    <span v-show="clicked"><i class="fas fa-angle-down"></i></span>
                                </div>
                            </div>
                            <div v-if="clicked" class="dropdown-list">
                                <ul>
                                    <li v-for="request in requestOptions">
                                        <p class="dropdown-item" @click="setRequestType(request)">{{request}}<span class="float-right" v-if="requestType === request"><i class="fas fa-check"></i></span></p>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <i class="fas fa-key"></i>
                        <input v-model="apiToken" class="w-full appearance-none bg-transparent border-none text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Api Token">
                        <button @click="sendRequest" class="transition ease-in-out duration-300 flex-shrink-0 text-sm py-1 px-2 rounded bg-blue-500 hover:bg-blue-600 text-white focus:outline-none">Send</button>
                    </div>
                </div>
            </div>
            <button v-if="clicked" tabindex="-1" @click="clicked = false" class="fixed inset-0 h-screen w-screen cursor-default z-10"></button>
        </div>
        <div class="w-10/12 mx-auto mt-4">
            <json-box class="shadow" :data='requestData'></json-box>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                window: window.location.href + 'api/',
                point: window.location.href + 'api/',
                clicked: false,
                requestType: 'Get',
                apiToken: '',
                requestOptions: ['Get', 'Post', 'Patch'],
                requestData: [{'message': 'Nothing yet!'}],
            }
        },
        methods: {
            sendRequest() {

                //this sets the authorization token. Normally you could pass this in the request, but I was experiencing some os
                axios.defaults.headers.common['Authorization'] = "Bearer " + this.apiToken;

                if (this.requestType === 'Get') {
                    axios.get(this.point)
                        .then(response => {
                            this.requestData = response.data;
                        })
                        .catch(response => {
                            this.requestData = response;
                        });
                }

                if (this.requestType === 'Post') {
                    axios.post(this.point).then(response => {
                            this.requestData = response.data;
                        })
                        .catch(response => {
                            this.requestData = response;
                        });
                }

                if (this.requestType === 'Patch') {
                    axios.patch(this.point).then(response => {
                        this.requestData = response.data;
                    })
                        .catch(response => {
                            this.requestData = response;
                        });
                }

            },
            setRequestType(type) {
                this.requestType = type;
                this.clicked = false;
            }
        },
        computed: {
            endpoint: {
                get() {
                    return this.point;
                },
                set(value) {

                    //checks to see if an input includes the url, and if it does it detaches that to consume the endpoint
                    if (value.replace(this.window,'').includes(this.window)) {
                        this.point = value.replace(this.window,'');
                    } else {
                        //id it does not check out then it assumes that it is a valid input
                        this.point = value;
                    }
                }
            },

        }
    }
</script>

<style scoped>

</style>
