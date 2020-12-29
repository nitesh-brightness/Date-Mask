<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Oleg Toker</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}">
    </head>

    <body>

        <div id="app" class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <form class="col-12">
                    <div class="form-group">
                        <label for="date" class="font-weight-bold">Date:</label>

                        <input v-model="date" v-date-mask class="form-control">
                    </div>
                </form>
            </div>
        </div>

        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
