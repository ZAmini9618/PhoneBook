<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="/resources/css/app.css">
    <title>PHONEBOOK</title>

    <style>
        body {

            background-color: rgba(13, 23, 40, 0.93);

        }

        .fullBody {
            background-color: #1a202c;
            width: 60%;
            height: 70%;
            padding: 30px;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            border: 2px solid #009879;
            box-shadow: inset 0 -4em 4em rgba(0, 0, 0, 0.1), 0 0 0 2px #009879,
            0.3em 0.3em 1em rgba(0, 0, 0, 0.72);
            border-top-left-radius: 50px;
            border-bottom-left-radius: 50px;
            border-bottom-right-radius: 50px;
            position: fixed;
        }

        .listButton {
            background-color: rgba(26, 32, 44, 0.77);
            padding: 20px;
            color: white;
            font-weight: 600;
            font-size: 15px;
            border: 1px solid #009879;
            box-shadow: inset 0 -1em 1em rgba(0, 0, 0, 0.1), 0 0 0 2px #009879,
            0.3em 0.3em 1em rgba(0, 0, 0, 0.34);
            border-top-left-radius: 50px;
            border-bottom-left-radius: 50px;
            border-bottom-right-radius: 50px;
            margin-left: 53em;
        }

        .listButton:hover {
            background-color: rgba(0, 152, 121, 0.84);
            border: 2px solid #1a202c;
        }

        .list {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            direction: rtl;

        }

        .styled-table {
            border-collapse: collapse;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            width: 100%;
            text-align: center;
        }

        .styled-table thead tr {
            background-color: #009879;
        }

        .styled-table th {
            padding: 12px 15px;
            text-align: center;
            color: #1a202c;
            font-weight: 600;
            font-size: 17px;
        }

        .styled-table td {
            padding: 12px 15px;
            text-align: center;
            color: white;
        }


        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        .value {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            left: 20px;
        }

        .value li {
            cursor: pointer;
            list-style-type: none;
            width: 20px;
            margin-left: 15px;

        }

        .value button {
            background-color: transparent;
            border: none;
            width: fit-content;
            color: white;
            cursor: pointer;
        }


        #table-wrapper {
            position:relative;
        }
        #table-scroll {
            height:450px;
            overflow:auto;
            margin-top:20px;
            direction: rtl
        }
        #table-wrapper table {
            width:100%;

        }
        #table-wrapper table thead th .text {
            position:absolute;
            top:-20px;
            z-index:2;
            height:20px;
            width:35%;
            border:1px solid red;
        }

    </style>


</head>

<body class="antialiased">
<div class="fullBody">

    <div class="fullList">
        <div class="headerList">
            <button class="listButton" type="button" onclick="window.location='{{ url("/create") }}'">افزودن
                مخاطبین
            </button>
        </div>
        <div id="table-wrapper">
            <div id="table-scroll">
        <div class="list">
                    <table class="styled-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام و نام خانوادگی</th>
                            <th>شماره تلفن</th>
                            <th>تلفن</th>
                            <th>مقادیر</th>
                        </tr>
                        </thead>
                        @foreach($phoneBookDataList as $phoneBookData)
                            <tbody>
                            <tr>
                                <td>{{$phoneBookData->id}}</td>
                                <td>{{$phoneBookData->firstName}}{{$phoneBookData->lastName}}</td>
                                <td>{{$phoneBookData->phoneNumber}}</td>
                                <td>{{$phoneBookData->phone}}</td>
                                <td>


                                    <ul class="value">
                                        <li>
                                            <form method="post" action="/list/{{$phoneBookData->id}}">
                                                @csrf
                                                @method('delete')

                                                <button>
                                                    <svg width="21px" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24"
                                                         stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                                    </svg>
                                                </button>

                                            </form>
                                        </li>
                                        <li>
                                            <form method="get" action="/edit/{{$phoneBookData->id}}">
                                                <button>
                                                    <svg width="21px" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24"
                                                         stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            </tbody>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
