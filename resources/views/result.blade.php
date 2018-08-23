<!DOCTYPE html>
<html lang="ja">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>

<div class="container">

    <class class="row">
        <table class="table table-striped" id="datatable-buttons">
            <thead>
            <tr class="headings">
                <th class="column-title text-center">Note</th>
                <th class="column-title text-center">Date</th>
                <th class="column-title text-center">Amount</th>
                <th class="column-title text-center">Tel</th>
            </tr>
            </thead>
            <tbody>
                <tr class="even pointer">
                    <td class=" text-center">{{$result->note}}</td>
                    <td class=" text-center">{{$result->date}}</td>
                    <td class="text-center">{{$result->amount}}</td>
                    <td class="text-center">{{$result->tel}}</td>
                </tr>
            </tbody>
        </table>
    </class>
</div>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl" crossorigin="anonymous"></script>
</html>