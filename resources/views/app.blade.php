<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    {{--Styls--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}" defer></script>

    {{--fontawesome--}}
    <script src="https://kit.fontawesome.com/7d75c9db00.js" crossorigin="anonymous"></script>


</head>
<body class="bg-green-500">
<div id="app">
    <div class="container mx-auto pb-10">
        <div class="w-full mt-40">
            <div class="text-5xl font-extrabold italic text-center">ScratchBling <span class="text-2xl">Api</span></div>
        </div>
        <endpoint-playground class="my-10"></endpoint-playground>
        {{--available endpoints--}}
        <div class="w-full">
            <div class="bg-white shadow rounded-lg px-6 py-8">
                {{--Available endpoints--}}
                <div class="flex flex-wrap">
                    <div class="endpoint-description pb-10">
                        <div class="block text-2xl font-bold">Available Endpoints</div>
                        <p class="mt-6">To access these endpoints you need to pass the <b>Api Token</b> as a <b>bearer token.</b></p>
                        <p class="mt-6"><b>Hint: </b>Click each highlighted endpoint to copy to clipboard!</p>
                    </div>
                    <div class="endpoint-example pb-10">
                        <div class="bg-gray-300 rounded-lg p-2">
                            <p class="text-gray-600 pb-2">//curl</p>
                            <p>curl --location --request GET '{ENDPOINT_HERE}' \
                                --header 'Authorization: Bearer {API_TOKEN_HERE}}'</p>
                        </div>
                        <div class="bg-gray-300 rounded-lg p-2 mt-4">
                            <p class="text-gray-600 pb-2">//axios</p>
                            <p>axios.get({ENDPOINT_HERE}, {headers: { Authorization: "Bearer " + {API_TOKEN_HERE} });</p>
                        </div>

                    </div>
                </div>
                {{--Get all backscratchers--}}
                <div class="flex flex-wrap border-t py-10">
                    <div class="endpoint-description">
                        <div class="request-header"><i class="request-type">Get</i>All Back Scratchers:</div>
                        <endpoint-button class="w-auto inline-block mt-4" type="Get" endpoint="api/backscratcher"></endpoint-button>
                        <div class="post-body">
                            <p>This endpoint retrieves all of the back scratchers in the database. Look below for <b>advanced options</b> that allow for filtering, sorting, and retrieving specific fields.</p>
                        </div>
                    </div>
                    <div class="endpoint-example">
                        <json-box class="m-0 lg:m-4" data='[{"id":1,"item_name":"Thunderbolt VII","item_description":"The Thunderbolt VII is produced in Manchester, England, as a competitor to the Firebolt Supreme. Many experts feel that the Thunderbolt VII has sacrificed safety for speed.","item_size":"LG","item_cost":"150.00","created_at":null,"updated_at":null},{"id":2,"item_name":"Shooting Star","item_description":"Much like a shooting star, this backscratcher starts off powerful but after much use will fizzle out.","item_size":"SM","item_cost":"50.00","created_at":null,"updated_at":null},{"id":3,"item_name":"Nimbus 2001","item_description":"The top of the Scratch Blings range. Capable of previously unseen speed and control. A world-class backscratcher.","item_size":"MD","item_cost":"120.00","created_at":null,"updated_at":null},{"id":4,"item_name":"Cleansweep Eleven","item_description":"One of the first of its kind. Very reliable and easy to maintain.","item_size":"MD","item_cost":"75.00","created_at":null,"updated_at":null},{"id":5,"item_name":"Firebolt","item_description":"This state-of-the-art backscratcher sports a streamlined superfine handle of ash, treated with a diamond-hard polish and hand-numbered with its own registration number.","item_size":"XL","item_cost":"200.00","created_at":null,"updated_at":null}]'></json-box>
                    </div>
                </div>



                {{--Get backscratcher by id--}}
                <div class="flex flex-wrap border-t py-10">
                    <div class="endpoint-description">
                        <div class="request-header"><i class="request-type">Get</i>Specific Back Scratcher:</div>
                        <endpoint-button class="w-auto inline-block mt-4" endpoint="api/backscratcher/{ID}"></endpoint-button>
                        <div class="post-body">
                            <p>This endpoint retrieves a specific back scratcher by the <b>id</b> of the scratcher.</p>
                        </div>
                        <p><b>Example: </b><endpoint-button class="w-auto inline-block" endpoint="api/backscratcher/1"></endpoint-button></p>

                    </div>
                    <div class="endpoint-example">
                        <json-box class="m-0 lg:m-4" data='{"id":1,"item_name":"Thunderbolt VII","item_description":"The Thunderbolt VII is produced in Manchester, England, as a competitor to the Firebolt Supreme. Many experts feel that the Thunderbolt VII has sacrificed safety for speed.","item_size":"LG","item_cost":"150.00","created_at":null,"updated_at":null}'></json-box>
                    </div>
                </div>
                {{--create new backscratcher--}}
                <div class="flex flex-wrap border-t py-10">
                    <div class="endpoint-description">
                        <div class="request-header"><i class="request-type">Post</i>Create New Back Scratcher:</div>
                        <endpoint-button class="w-auto inline-block mt-4" endpoint="api/backscratcher/?item_name={NAME}&item_description={DESCRIPTION}&item_size={SIZE}&item_cost={COST}"></endpoint-button>
                        <div class="post-body">
                            <p>This endpoint creates a new back scratcher when a form of fields are attached to it:
                            <p class="mt-4">Form:</p>
                            <ul class="list-disc ml-5 mb-4">
                                <li>item_name: String</li>
                                <li>item_description: Text</li>
                                <li>item_size: Acceptable types are SM, MD, LG, XL</li>
                                <li>item_cost: Decimal</li>
                            </ul>
                        </div>
                        <p><b>Example: </b><endpoint-button class="w-auto inline-block" endpoint="api/backscratcher/?item_name=Whomping Willow&item_description=A world class back scratcher. Some say that it could destroy a Firebolt in battle.&item_size=SM&item_cost=100000"></endpoint-button></p>

                    </div>
                    <div class="endpoint-example">
                        <json-box class="m-0 lg:m-4" data='{"item_name":"Whomping Willow","item_description":"A world class back scratcher. Some say that it could destroy a Firebolt in battle.","item_size":"SM","item_cost":"100000","id":6}'></json-box>
                    </div>
                </div>
                {{--update backscratcher--}}
                <div class="flex flex-wrap border-t py-10">
                    <div class="endpoint-description">
                        <div class="request-header"><i class="request-type">Patch</i>Update Back Scratcher:</div>
                        <endpoint-button class="w-auto inline-block mt-4" endpoint="api/backscratcher/{ID}/?item_name={NAME}&item_description={DESCRIPTION}&item_size={SIZE}&item_cost={COST}"></endpoint-button>
                        <div class="post-body">
                            <p>This endpoint updates a new back scratcher. You must <b>pass the id</b> of the scratcher that you want to update, alongside a form of fields that you wish to update:
                            <p class="mt-4">Form:</p>
                            <ul class="list-disc ml-5 mb-4">
                                <li>item_name: String</li>
                                <li>item_description: Text</li>
                                <li>item_size: Acceptable types are SM, MD, LG, XL</li>
                                <li>item_cost: Decimal</li>
                            </ul>
                            <p>When sending the request, you can pass along only the fields that you wish to update.</p>
                        </div>
                        <p><b>Example: </b><endpoint-button class="w-auto inline-block" endpoint="api/backscratcher/1/?item_description=Not safe for kids. Keep out of reach&item_size=SM"></endpoint-button></p>

                    </div>
                    <div class="endpoint-example">
                        <json-box class="m-0 lg:m-4" data='{"id":1,"item_name":"Thunderbolt VII","item_description":"Not safe for kids. Keep out of reach","item_size":"MD","item_cost":"150.00"}'></json-box>
                    </div>
                </div>
            </div>
        </div>
        {{--advance options--}}
        <div class="w-full mt-5">
            <div class="bg-white shadow rounded-lg px-6 py-8">
                {{--Advance Options--}}
                <div class="w-full pb-10">
                    <div class="block text-2xl font-bold">Advanced Options</div>
                    <p class="mt-6">These advanced options allow a user to search for back scratchers by <b>filters</b>, designate how they would like the scratchers <b>sorted</b>, and choose what <b>fields</b> are returned to them.</p>
                    <p class="mt-6"><b>Hint: </b>Click each highlighted endpoint to copy to clipboard!</p>

                </div>
                {{--Filter--}}
                <div class="flex flex-wrap border-t py-10">
                    <div class="endpoint-description">
                        <div class="request-header"><i class="request-type">Get</i>Filter Back Scratchers:</div>
                        <endpoint-button class="w-auto inline-block mt-4" endpoint="api/backscratcher?filter[FILTER_FIELD]=ITEM"></endpoint-button>
                        <div class="post-body">
                            <p>Let's say you want to retrieve specific types of back scratchers, but don't want to request all of them and then comb through them on the frontend.
                            The filter is a great way of getting this done! All you need to do is specify which attribute you would like to filter by and how would you like to filter it.</p>
                            <table class="table-auto mt-5">
                                <thead>
                                <tr>
                                    <th class="px-4 py-2">Attribute</th>
                                    <th class="px-4 py-2">Results</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="border px-4 py-2">id</td>
                                    <td class="border px-4 py-2">Will return <b>specific</b> back scratchers with an id that is <b>exactly the same</b> as the filtered id</td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2">item_name</td>
                                    <td class="border px-4 py-2">Will return all back scratchers that contain the filtered text</td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2">item_description</td>
                                    <td class="border px-4 py-2">Will return all back scratchers that contain the filtered text</td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2">item_size</td>
                                    <td class="border px-4 py-2">Will return all back scratchers with the size that is <b>exactly the same</b> as the filtered size</td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2">item_cost</td>
                                    <td class="border px-4 py-2">Will return all back scratchers with a cost <b>less than or equal</b> to the filtered cost</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <p><b>Example: </b><endpoint-button class="w-auto inline-block" endpoint="api/backscratcher?filter[item_name]=F"></endpoint-button></p>
                        <p class="mt-2"><b>Example: </b><endpoint-button class="w-auto inline-block" endpoint="api/backscratcher?filter[item_description]=scratcher"></endpoint-button></p>
                        <p class="mt-2"><b>Example:</b><endpoint-button class="w-auto inline-block" endpoint="api/backscratcher?filter[item_size]=MD"></endpoint-button></p>
                        <p class="mt-2"><b>Example: </b><endpoint-button class="w-auto inline-block" endpoint="api/backscratcher?filter[item_cost]=100"></endpoint-button></p>

                    </div>
                    <div class="endpoint-example">
                        <json-box class="m-0 lg:m-4" example="api/backscratcher?filter[item_cost]=100" data='[{"id":2,"item_name":"Shooting Star","item_description":"Much like a shooting star, this back scratcher starts off powerful but after much use will fizzle out.","item_size":"SM","item_cost":"50.00","created_at":null,"updated_at":null},{"id":4,"item_name":"Cleansweep Eleven","item_description":"One of the first of its kind. Very reliable and easy to maintain.","item_size":"MD","item_cost":"75.00","created_at":null,"updated_at":null}]'></json-box>
                    </div>
                </div>
                {{--Sort--}}
                <div class="flex flex-wrap border-t py-10">
                    <div class="endpoint-description">
                        <div class="request-header"><i class="request-type">Get</i>Sort Back Scratchers:</div>
                        <endpoint-button class="w-auto inline-block mt-4" type="Get" endpoint="api/backscratcher?sort=ITEM_FIELD"></endpoint-button>
                        <div class="post-body">
                            <p>What if you want to get the back scratchers and assemble them within an order? Using sort will do just that! You can dictate how the scratchers are sorted by specifying which field to sort by.</p>
                        </div>
                        <p><b>Example: </b><endpoint-button class="w-auto inline-block" endpoint="api/backscratcher?sort=item_cost"></endpoint-button></p>
                        <div class="post-body">
                            <p>You can also sort by multiple fields. Just add the fields in the order you would like them sorted by.</p>
                        </div>
                        <p><b>Example: </b><endpoint-button class="w-auto inline-block" endpoint="api/backscratcher?sort=item_cost,item_size"></endpoint-button></p>
                    </div>
                    <div class="endpoint-example">
                        <json-box class="m-0 lg:m-4" example="api/backscratcher?sort=item_cost" data='[{"id":2,"item_name":"Shooting Star","item_description":"Much like a shooting star, this back scratcher starts off powerful but after much use will fizzle out.","item_size":"SM","item_cost":"50.00","created_at":null,"updated_at":null},{"id":4,"item_name":"Cleansweep Eleven","item_description":"One of the first of its kind. Very reliable and easy to maintain.","item_size":"MD","item_cost":"75.00","created_at":null,"updated_at":null},{"id":3,"item_name":"Nimbus 2001","item_description":"The top of the Scratch Bling range. Capable of previously unseen speed and control. A world-class backscratcher.","item_size":"MD","item_cost":"120.00","created_at":null,"updated_at":null},{"id":1,"item_name":"Thunderbolt VII","item_description":"The Thunderbolt VII is produced in Manchester, England, as a competitor to the Firebolt Supreme. Many experts feel that the Thunderbolt VII has sacrificed safety for speed.","item_size":"LG","item_cost":"150.00","created_at":null,"updated_at":null},{"id":5,"item_name":"Firebolt","item_description":"This state-of-the-art back scratcher sports a streamlined superfine handle of ash, treated with a diamond-hard polish and hand-numbered with its own registration number.","item_size":"XL","item_cost":"200.00","created_at":null,"updated_at":null}]'></json-box>
                    </div>
                </div>
                {{--Fields--}}
                <div class="flex flex-wrap border-t py-10">
                    <div class="endpoint-description">
                        <div class="request-header"><i class="request-type">Get</i>Field Back Scratchers:</div>
                        <endpoint-button class="w-auto inline-block mt-4" type="Get" endpoint="api/backscratcher?fields[back_scratchers]={ITEM_FIELD}"></endpoint-button>
                        <div class="post-body">
                            <p>You want all of the back scratchers, but you only want certain information about them. Fields are the perfect thing to get this done! To do this, just pass which fields you would like to recieve.</p>
                        </div>
                        <p><b>Example: </b><endpoint-button class="w-auto inline-block" endpoint="api/backscratcher?fields[back_scratchers]=item_name,item_cost,item_size"></endpoint-button></p>
                    </div>
                    <div class="endpoint-example">
                        <json-box class="m-0 lg:m-4" data='[{"item_name":"Thunderbolt VII","item_cost":"150.00","item_size":"LG"},{"item_name":"Shooting Star","item_cost":"50.00","item_size":"SM"},{"item_name":"Nimbus 2001","item_cost":"120.00","item_size":"MD"},{"item_name":"Cleansweep Eleven","item_cost":"75.00","item_size":"MD"},{"item_name":"Firebolt","item_cost":"200.00","item_size":"XL"}]'></json-box>
                    </div>
                </div>
                {{--All together--}}
                <div class="flex flex-wrap border-t py-10">
                    <div class="endpoint-description">
                        <div class="request-header">Combining them</div>
                        <endpoint-button class="w-auto inline-block mt-4" type="Get" endpoint="api/backscratcher?filter[{ITEM_FIELD}]={ITEM_FILTER}&sort={ITEM_FIELD}&?fields[back_scratchers]={ITEM_FIELDS}"></endpoint-button>
                        <div class="post-body">
                            <p>The best part about these options is that you can mix and match them! Combine them to create powerful and meaningful requests.</p>
                        </div>
                        <p><b>Example: </b><endpoint-button class="w-auto inline-block" endpoint="api/backscratcher?filter[item_size]=MD&sort=item_cost&?fields[back_scratchers]=item_name,item_cost,item_size"></endpoint-button></p>
                    </div>
                    <div class="endpoint-example">
                        <json-box class="m-0 lg:m-4"  data='[{"item_name":"Cleansweep Eleven","item_cost":"75.00","item_size":"MD"},{"item_name":"Nimbus 2001","item_cost":"120.00","item_size":"MD"}]'></json-box>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
