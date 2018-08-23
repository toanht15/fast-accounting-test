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
    @if ($message = Session::get('success'))

        <div class="alert alert-success alert-block">

            <button type="button" class="close" data-dismiss="alert">×</button>

            <strong>{{ $message }}</strong>

        </div>

    @endif

        @if ($message = Session::get('error'))

            <div class="alert alert-danger">

                <button type="button" class="close" data-dismiss="alert">×</button>

                <strong>{{ $message }}</strong>

            </div>

        @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">ファイルアップロード</div>
            <div class="card-body">
                <form action="{{URL::route('upload')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="file" class="form-control-file" name="fileToUpload" id="exampleInputFile" aria-describedby="fileHelp">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <class class="row" style="margin-top: 50px;">
        <h3>PDFファイル一覧</h3>
        <table class="table table-striped" id="datatable-buttons">
            <thead>
            <tr class="headings">
                <th class="column-title" style="width:5%;">ID</th>
                <th class="column-title text-center">Name</th>
                <th class="column-title text-center">URL</th>
                <th class="column-title text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($files as $file)
                <tr class="even pointer">
                    <td class="text-center">{{$file->id}}</td>
                    <td class="text-center">{{$file->name}}</td>
                    <td class="text-center"><a href="{{$file->url}}">{{$file->url}}</a></td>
                    <td class="text-center"><a href="{{URL::route('convert_to_image', ['id' => $file->id])}}">Convert to Image</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </class>

    <class class="row" style="margin-top: 50px;">
        <h3>ORC結果</h3>
        <table class="table table-striped" id="datatable-buttons">
            <thead>
            <tr class="headings">
                <th class="column-title" style="width:5%;">File ID</th>
                <th class="column-title text-center">URL</th>
                <th class="column-title text-center">Result</th>
                <th class="column-title text-center">Action</th>
                <th class="column-title text-center">Result</th>
            </tr>
            </thead>
            <tbody>
            @foreach($images as $image)
                <tr class="even pointer">
                    <td class="text-center">{{$image->file_id}}</td>
                    <td class="text-center"><a href="{{$image->url}}">{{$image->url}}</a></td>
                    <td class="text-center">{{$image->result}}</td>
                    <td class="text-center">@if(!isset($image->image_id))<a href="{{URL::route('get_orc_result', ['id' => $image->id])}}">Get ORC result</a>@endif</td>
                    <td class="text-center">@if(isset($image->image_id))<a href="{{URL::route('view_result', ['imageId' => $file->id])}}">View Result</a>@endif</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </class>
</div>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl" crossorigin="anonymous"></script>
</html>
