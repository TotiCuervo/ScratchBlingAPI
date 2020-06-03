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
    <div class="container mx-auto">
        <div class="w-full mt-40">
            <div class="text-5xl font-extrabold italic text-center">ScratchBling <span class="text-2xl">Api</span></div>
        </div>
        <div class="w-full">
            <div class="bg-white shadow rounded-lg px-6 py-8">
                {{--Available endpoints--}}
                <div class="w-full pb-10">
                    <div class="block text-2xl font-bold">Available Endpoints</div>
                    <p>To access these endpoints you need to pass the <b>Api Token</b> you receive after registering as a bearer token. See examples below.</p>
                    <p class="mt-6"><b>Hint: </b>Click each highlighted endpoint to copy to clipboard!</p>

                </div>
                {{--Get all backscratchers--}}
                <div class="flex flex-wrap border-t py-10">
                    <div class="w-full lg:w-1/2">
                        <div class="block text-xl font-bold">Get All Back Scratchers: <endpoint-button endpoint="api/backscratcher"></endpoint-button></div>
                        <div class="block text-sm mt-4">Request type: <b>Get</b></div>
                        <div class="body my-4">
                            <p>This endpoint retrieves all of the back scratchers in the database. Look below for <b>advanced options</b> that allow for filtering, sorting, and retrieving specific fields.</p>

                        </div>
                    </div>
                    <div class="w-1/2 w-full lg:w-1/2">
                        <json-box data='[{"id":1,"item_name":"Thunderbolt VII","item_description":"The Thunderbolt VII is produced in Manchester, England, as a competitor to the Firebolt Supreme. Many experts feel that the Thunderbolt VII has sacrificed safety for speed.","item_size":"LG","item_cost":"150.00","created_at":null,"updated_at":null},{"id":2,"item_name":"Shooting Star","item_description":"Much like a shooting star, this backscratcher starts off powerful but after much use will fizzle out.","item_size":"SM","item_cost":"50.00","created_at":null,"updated_at":null},{"id":3,"item_name":"Nimbus 2001","item_description":"The top of the Scratch Blings range. Capable of previously unseen speed and control. A world-class backscratcher.","item_size":"MD","item_cost":"120.00","created_at":null,"updated_at":null},{"id":4,"item_name":"Cleansweep Eleven","item_description":"One of the first of its kind. Very reliable and easy to maintain.","item_size":"MD","item_cost":"75.00","created_at":null,"updated_at":null},{"id":5,"item_name":"Firebolt","item_description":"This state-of-the-art backscratcher sports a streamlined superfine handle of ash, treated with a diamond-hard polish and hand-numbered with its own registration number.","item_size":"XL","item_cost":"200.00","created_at":null,"updated_at":null}]'></json-box>
                    </div>
                </div>
                {{--Get backscratcher by id--}}
                <div class="flex flex-wrap border-t py-10">
                    <div class="w-full lg:w-1/2">
                        <div class="block text-xl font-bold">Get Specific Back Scratcher: <endpoint-button endpoint="api/backscratcher/{id}"></endpoint-button></div>
                        <div class="block text-sm mt-4">Request type: <b>Get</b></div>
                        <div class="body my-4">
                            <p>This endpoint retrieves a specific back scratcher by the <b>id</b> of the scratcher.</p>
                            <p class="mt-4"><b>Example: </b><endpoint-button endpoint="api/backscratcher/1"></endpoint-button></p>
                        </div>
                    </div>
                    <div class="w-1/2 w-full lg:w-1/2">
                        <json-box data='{"id":1,"item_name":"Thunderbolt VII","item_description":"The Thunderbolt VII is produced in Manchester, England, as a competitor to the Firebolt Supreme. Many experts feel that the Thunderbolt VII has sacrificed safety for speed.","item_size":"LG","item_cost":"150.00","created_at":null,"updated_at":null}'></json-box>
                    </div>
                </div>
                {{--create new backscratcher--}}
                <div class="flex flex-wrap border-t py-10">
                    <div class="w-full lg:w-1/2">
                        <div class="block text-xl font-bold">Create New Back Scratcher: <endpoint-button endpoint="api/backscratcher/"></endpoint-button></div>
                        <div class="block text-sm mt-4">Request type: <b>Post</b></div>
                        <div class="body my-4">
                            <p>This endpoint creates a new back scratcher when a form of parameters are attached to it. Those
                            <p class="mt-4"><b>Example: </b><endpoint-button endpoint="api/backscratcher/1"></endpoint-button></p>
                        </div>
                    </div>
                    <div class="w-1/2 w-full lg:w-1/2">
                        <json-box data='{"id":1,"item_name":"Thunderbolt VII","item_description":"The Thunderbolt VII is produced in Manchester, England, as a competitor to the Firebolt Supreme. Many experts feel that the Thunderbolt VII has sacrificed safety for speed.","item_size":"LG","item_cost":"150.00","created_at":null,"updated_at":null}'></json-box>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>
</body>
</html>
