<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }}</title>
    </head>
    <body>
        <div>
            <a href="https://api.notion.com/v1/oauth/authorize?client_id=2fae839d-1f29-4027-ad67-01cb1a060d55&redirect_uri={{ urlencode(route('getToken')) }}&response_type=code">Add to Notion</a>
        </div>
    </body>
</html>
