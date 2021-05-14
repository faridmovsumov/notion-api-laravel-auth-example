<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }}</title>
    </head>
    <body>
        <div>
            <a href="https://api.notion.com/v1/oauth/authorize?client_id={{ config('notion.client_id') }}&redirect_uri={{ urlencode(route('getToken')) }}&response_type=code">
                Add to Notion
            </a>
        </div>
    </body>
</html>
