<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <h2 class="ui image header">
                <div class="content">
                    Log-in to your account
                </div>
            </h2>
            <form action="login.php" method="post" class="ui large form">
                <div class="ui stacked secondary  segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input type="text" name="email" placeholder="E-mail addresa">
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password" name="password" placeholder="Password">
                        </div>
                    </div>
                    
                    <input type="submit" name="login" class="ui fluid large teal submit button" value="Login">
                </div>

                <div class="ui error message"></div>

            </form>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>

    <script>
        $(document)
            .ready(function() {
                $('.ui.form')
                    .form({
                        fields: {
                            email: {
                                identifier: 'email',
                                rules: [{
                                    type: 'email',
                                    prompt: 'Please enter a valid e-mail'
                                }]
                            },
                            password: {
                                identifier: 'password',
                                rules: [{
                                    type: 'empty',
                                    prompt: 'Please enter your password'
                                }]
                            }
                        }
                    }).api({
                        url: 'login.php',
                        method: 'POST',
                        serializeForm: true,
                        data: new FormData(this),
                        successTest: function(response) {
                            return response || false;
                        },
                        onComplete: function(response, element, xhr) {
                            // always called after XHR complete
                        },
                        onSuccess: function(response, element) {
                            console.log('suc');
                            window.open("testSession.php", "_self");
                            // console.log(response);
                            // valid response and response.success = true
                        },
                        onFailure: function(response, element) {
                            console.log('fail');
                        },
                        onError: function(errorMessage, element, xhr) {
                            // invalid response
                        },
                        onAbort: function(errorMessage, element, xhr) {
                            // navigated to a new page, CORS issue, or user canceled request
                        }
                    });

            });
    </script>
</body>

</html>