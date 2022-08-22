<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    @include('dashboard.layouts.links')
</head>

<body class="inner_page login">
    <div class="full_container">
        <div class="container">

            <div class="center verticle_center full_height">

                <div class="login_section">
                    <div class="logo_login">
                        <div class="center">
                            <img width="210" src="/images/logo/logo.png" alt="#" />
                        </div>
                    </div>
                    <div class="login_form">
                        @include('dashboard.layouts.messages')
                        <form action="{{ route('dashboard.login') }}" method='post'>
                            @csrf
                            <fieldset>
                                <div class="field">
                                    <label class="label_field">User name</label>
                                    <input type="text" name="name" placeholder="User name" />
                                </div>
                                <div class="field">
                                    <label class="label_field">Password</label>
                                    <input type="password" name="password" placeholder="Password" />
                                </div>

                                <div class="field margin_0">
                                    <label class="label_field hidden">hidden label</label>
                                    <button type="submit" class="main_bt">Sing In</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.layouts.scripts')
</body>

</html>
