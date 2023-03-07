<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MVC - Ferdy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;1,200;1,300;1,400;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito Sans', sans-serif;
        }
    </style>
</head>

<body>

    <div class="container p-5">
        <h1 class="text-center fw-bold">User List</h1>
        <div class="row d-flex justify-content-around">
            @foreach ($users as $user)
                <div class="col-4 col my-3">
                    <div class="card mx-auto" style="width: 18rem;">
                        @if ($user->email == 'ferdyhahan5@gmail.com')
                            <img src="{{ asset('storage/' . $user->picture) }}" class="card-img-top" alt="user-image">
                        @else
                            <img src="https://picsum.photos/id/{{ $user->id }}/200/200" class="card-img-top"
                                alt="user-image">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <p class="card-text">
                                {{ $user->email }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">

                <span class="mb-3 mb-md-0 text-muted">&copy; 2023 Ferdy Hahan Pradana</span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><a class="text-muted fs-4" target="_blank"
                        href="https://www.linkedin.com/in/ferdy-hahan-pradana/"><i
                            class="fa-brands fa-linkedin"></i></a>
                </li>
                <li class="ms-3"><a class="text-muted fs-4" target="_blank" href="https://github.com/ferdyhape"><i
                            class="fa-brands fa-square-github"></i></a>
                </li>
                <li class="ms-3"><a class="text-muted fs-4" target="_blank"
                        href="https://www.instagram.com/ferdyhape/"><i class="fa-brands fa-square-instagram"></i></a>
                </li>

            </ul>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
