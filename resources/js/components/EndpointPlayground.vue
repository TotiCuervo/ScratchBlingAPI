<template>
    <div class="w-full">
        <div class="rounded bg-white shadow w-full md:w-3/4 lg:w-1/2 mx-auto p-3">
            <!--Request info-->
            <div class="w-full pb-2">
                <label class="block text-gray-700 text-sm font-bold mb-2">Request Type</label>
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
                        </div>
                    </div>
                </div>
                <button v-if="clicked" tabindex="-1" @click="clicked = false" class="fixed inset-0 h-screen w-screen cursor-default z-10"></button>
            </div>
            <!--Request box-->
            <div class="w-full py-2">
                <label class="block text-gray-700 text-sm font-bold mb-2">Endpoint</label>
                <textarea-autosize v-model="endpoint" class="rounded border border-black w-full p-3 outline-none" rows="1"></textarea-autosize>
            </div>
            <!--Request Body-->
            <div class="w-full py-2" v-if="requestType !== 'Get'">
                <div class="w-full mb-2">
                    <label class="text-gray-700 text-sm font-bold mb-2">Body</label>
                    <button @click="resetBody" class="transition float-right ease-in-out duration-300 flex-shrink-0 text-xs py-1 px-2 rounded bg-blue-500 hover:bg-blue-600 text-white focus:outline-none">Reset</button>
                </div>
                <textarea-autosize v-model="body" class="w-full rounded border-black border p-3 outline-none" rows="5"></textarea-autosize>
            </div>
            <!--Submit-->
            <div class="w-full pt-2">
                <button @click="sendRequest" class="w-full transition ease-in-out duration-300 flex-shrink-0 text-sm py-2 px-2 rounded bg-blue-500 hover:bg-blue-600 text-white focus:outline-none">Send</button>
            </div>
            <!--Response type-->
            <div class="w-full pt-8 flex flex-wrap">
                <div class="w-1/2 px-2">
                    <button @click="responseType = 'Json'" v-bind:class="{'bg-blue-500 text-white': responseType === 'Json', 'bg-white text-blue-500': responseType !== 'Json'}" class="w-full transition ease-in-out duration-300 flex-shrink-0 border border-blue-500 text-sm py-1 px-2 rounded hover:bg-blue-500 hover:text-white focus:outline-none">Json</button>
                </div>
                <div class="w-1/2 px-2">
                    <button @click="responseType = 'Card'" v-bind:class="{'bg-blue-500 text-white': responseType === 'Card', 'bg-white text-blue-500': responseType !== 'Card'}" class="w-full transition ease-in-out duration-300 flex-shrink-0 border border-blue-500 text-sm py-1 px-2 rounded hover:bg-blue-500 hover:text-white focus:outline-none">Card</button>
                </div>
            </div>
        </div>
        <!--Response-->
        <div class="w-full md:w-3/4 lg:w-1/2 mx-auto mt-4" v-if="responseType === 'Json'">
            <json-box class="shadow" :data='requestData'></json-box>
        </div>
        <div class="w-full mx-auto mt-4 flex flex-wrap justify-center" v-if="responseType === 'Card'">
            <card-index v-if="!(requestData instanceof Array)" v-bind:class="{'lg:w-1/4': requestData.length > 1, 'lg:w-1/2': requestData.length === 1}" :data="requestData"></card-index>
            <card-index v-else v-bind:class="{'lg:w-1/4': requestData.length > 1, 'lg:w-1/2': requestData.length === 1}" v-for="(scratcher, key) in requestData" :data="scratcher" :key="key"></card-index>
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
                responseType: 'Card',
                apiToken: '',
                requestOptions: ['Get', 'Post', 'Patch'],
                requestData: [{'message': 'Nothing yet!'}],
                tempBody: '{\n' +
                    '    "item_name": "",\n' +
                    '    "item_description": "",\n' +
                    '    "item_cost": "00.0",\n' +
                    '    "item_size": [""]\n' +
                    '}'
            }
        },
        methods: {
            sendRequest() {
                if (this.endpoint.includes(this.window + 'backscratcher')) {

                    //this sets the authorization token so we don't have to worry about it
                    axios.defaults.headers.common['Authorization'] = "Bearer " + this.apiToken;

                    if (this.requestType === 'Get') {
                        axios.get(this.point)
                            .then(response => {
                                this.requestData = response.data;
                            })
                            .catch(error => {
                                this.requestData = error.response.data;
                            });
                    }

                    if (this.requestType === 'Post') {
                        axios.post(this.point, JSON.parse(this.body)).then(response => {
                            this.requestData = response.data;
                        })
                            .catch(error => {
                                this.requestData = error.response.data;
                            });
                    }

                    if (this.requestType === 'Patch') {

                        //because patching is kind of weird when you need to send api keys, I have to go about saving the data in a different way
                        let form = new FormData();

                        for ( let key in JSON.parse(this.body) ) {


                            //specifically what is difficult is passing an array. We need to save it to the FormatData as a string
                            //so we go through each size and appends it to formData as a string
                            if (key === 'item_size') {

                                let sizes = JSON.parse(this.body)[key];

                                for(let i = 0; i < sizes.length; i++) {
                                    form.append('item_size['+i+']', sizes[i]);
                                }

                            } else {
                                //for everything else we just append it as normal
                                form.append(key, JSON.parse(this.body)[key]);
                            }
                        }

                        //also because patch does not work in axios for whatever reason, we need to pass the patch method in the headers
                        form.append('_method', 'PATCH');

                        axios.post(this.point, form)
                            .then(response => {this.requestData = response.data;})
                            .catch(error => {
                                this.requestData = error.response.data;
                            });
                    }
                }

            },
            setRequestType(type) {
                //sets the request dropdown and then closess it
                this.requestType = type;
                this.clicked = false;
            },
            resetBody() {
                //resets the request body if mistakes
                this.body = '{\n' +
                '    "item_name": "",\n' +
                '    "item_description": "",\n' +
                '    "item_cost": "00.0",\n' +
                '    "item_size": [""]\n' +
                '}';
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
            body: {
                get() {
                    return this.tempBody;
                },
                set(value) {
                    this.tempBody = value;
                }
            }

        }
    }
</script>

<style scoped>

</style>
