<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send mail</title>
    <style>
        .wraper{
            background-color: rgb(99, 8, 61);
        }
        .wraper .title{
            text-align: center;
            color: white;
        }
        .message{
            margin-top: 10px;
            border: 1px solid gray;
            padding: 5px;
        }
        .message p{
            color: white;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="wraper">
        <h2 class="title">@lang('language.message') </h2>
        <div class="message">
            <p>
                {{ $note }}
            </p>
        </div>
    </div>
</body>
</html>