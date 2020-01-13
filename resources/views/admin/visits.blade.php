<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        #myTable {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ddd;
            font-size: 18px;
        }

        #myTable th, #myTable td {
            text-align: left;
            padding: 12px;
        }

        #myTable tr {
            border-bottom: 1px solid #ddd;
        }

        #myTable tr.header, #myTable tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

<h2>Visits</h2>

<table id="myTable">
    <tr class="header">
        <th style="width:10%;">ip</th>
        <th style="width:10%;">platform</th>
        <th style="width:10%;">browser</th>
        <th style="width:10%;">is_robot</th>
        <th style="width:10%;">is_mobile</th>
        <th style="width:10%;">date</th>
        <th style="width:10%;">page</th>
        <th style="width:10%;">count</th>
        <th style="width:10%;">create</th>
        <th style="width:10%;">last_update</th>


    @foreach($visits as $visit)
    </tr>
        <td>{{$visit->user_ip}}</td>
        <td>{{$visit->user_platform}}</td>
        <td>{{$visit->user_browser}}</td>
        <td>{{$visit->is_robot}}</td>
        <td>{{$visit->is_mobile}}</td>
        <td>{{$visit->visited_date}}</td>
        <td><a href="{{$visit->route}}" target="_blank">{{$visit->route}}</a></td>
        <td>{{$visit->count}}</td>
        <td>{{$visit->created_at}}</td>
        <td>{{$visit->updated_at}}</td>
    <tr>
        @endforeach
</table>
{{$visits->links()}}
</body>
</html>
