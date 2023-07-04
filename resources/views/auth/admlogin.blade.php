<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Ajouter les liens vers les fichiers CSS Semantic UI -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.css"
        integrity="sha512-KXol4x3sVoO+8ZsWPFI/r5KBVB/ssCGB5tsv2nVOKwLg33wTFP3fmnXa47FdSVIshVTgsYk/1734xSk9aFIa4A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="ui container  center aligned">
        @if (session('error'))
            <div class="ui negative message">
                <i class="close icon"></i>
                <div class="header">
                    Error
                </div>
                <p>{{ session('error') }}</p>
            </div>
        @endif
        <div class="ui centered grid" style="margin-top: 200px">
            <div class="six wide column">
                <div class="ui raised segment">
                    <div class="ui blue inverted segment">
                        <h3 class="ui header">Admin Login</h3>
                    </div>
                    <form class="ui form" method="POST" action="{{ route('admin.login') }}">
                        @csrf

                        <div class="field">
                            <label for="email">Email</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                autofocus>
                            @error('email')
                                <div class="ui pointing red basic label">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="password">Password</label>
                            <input id="password" type="password" name="password" required>
                            @error('password')
                                <div class="ui pointing red basic label">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="ui blue submit button" type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Ajouter les liens vers les fichiers JavaScript Semantic UI -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.js"
        integrity="sha512-Xo0Jh8MsOn72LGV8kU5LsclG7SUzJsWGhXbWcYs2MAmChkQzwiW/yTQwdJ8w6UA9C6EVG18GHb/TrYpYCjyAQw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
