<nav class="navbar navbar-expand-md bg-body-tertiary navbar-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('assets/elements/logo/logo.png') }}" alt="UST Logo" class="nav-logo" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            {{-- <span class="navbar-toggler-icon"></span> --}}
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-lg-0 ul-links">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('reservation-form') }}">Room Reservation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('check-reservation-form') }}">Check Reservation</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
