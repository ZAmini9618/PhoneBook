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
            width: 30%;
            height: 70%;
            padding: 30px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            border: 2px solid #009879;
            box-shadow: inset 0 -4em 4em rgba(0, 0, 0, 0.1), 0 0 0 2px #009879,
            0.3em 0.3em 1em rgba(0, 0, 0, 0.72);
            border-top-left-radius:60px ;
            border-bottom-left-radius: 60px;
            border-bottom-right-radius: 60px;

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
            border-top-left-radius:50px ;
            border-bottom-left-radius: 50px;
            border-bottom-right-radius: 50px;
            margin-top: 5em;

        }

        .listButton:hover{
            background-color: rgba(0, 152, 121, 0.84);
            border: 2px solid #1a202c;
        }

        .list {
            position: relative;
            color: white;
            direction: rtl;
        }
        .list input,textarea{
            border-radius:5px;
            padding: 5px 10px;
            width: 93%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
            outline: none;
            background-color: #d1d7e3;
        }
    </style>


</head>

<body class="antialiased">
<div class="fullBody">
    <form action="{{url('edit/'.$UphoneBooksData->id)}}" method="POST">

        @csrf
        @method('put')
        <div class="fullList">

            <div class="headerList">

            </div>
            <div class="list">
                <label>نام:</label><br>
                <input  type="text" name="firstName" id="fn" value="{{$UphoneBooksData->firstName}}"> <br>
                <label>نام خانوادگی:</label><br>
                <input  type="text" name="lastName" id="ln" value="{{$UphoneBooksData->lastName}}"> <br>
                <label>شماره تلفن:</label><br>
                <input  type="text" name="phoneNumber" id="pn" value="{{$UphoneBooksData->phoneNumber}}" > <br>
                <label> تلفن:</label><br>
                <input  type="text" name="phone" id="p" value="{{$UphoneBooksData->phone}}"><br>
                <label>آدرس:</label><br>
                <textarea type="text" name="address" id="ad">{{$UphoneBooksData->address}}</textarea>
            </div>
            <input type="submit" class="listButton" value="ویرایش مخاطب">
        </div>
    </form>
</div>

</body>
</html>
