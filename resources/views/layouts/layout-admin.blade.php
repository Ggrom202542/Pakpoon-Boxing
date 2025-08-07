<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title'){{ config('app.name', '') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- dataTable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    {{-- jQuery --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile_sports_people/profile.css') }}">
</head>

<body style="background-color: var(--color-bg)">
    <nav class="navbar fixed-top p-3" style="background-color: var(--color-7)">
        <div class="container-fluid">
            {{-- route --}}
            <a href="{{ route('home') }}" class="navbar-brand">
                <img src="{{ asset('images/logo.png') }}" alt="logo website" width="30" height="30"
                    class="d-inline-block align-text-top mx-2">
                ปากพูน {{ config('app.name', '') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end p-3" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            {{-- route --}}
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}"><i
                                    class="bi bi-house-door"></i>แดชบอร์ด</a>
                        </li>
                        <hr>
                        <a class="nav-link" href="">ข้อมูลนักกีฬา</a>
                        <li class="nav-item mx-4">
                            {{-- route --}}
                            <a class="nav-link" href="{{ route('SportPeople') }}"><i
                                    class="bi bi-bar-chart-line"></i>นักกีฬา</a>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <a class="nav-link" href="">จัดการผู้ใช้งาน</a>
                        <li class="nav-item mx-4">
                            <a class="nav-link" href=""><i class="bi bi-person"></i>
                                บัญชีพนักงาน & ผู้ดูแลระบบ
                            </a>
                        </li>
                        <li class="nav-item mx-4">
                            <a class="nav-link" href=""><i class="bi bi-person-gear"></i>
                                ข้อมูลพนักงานลงทะเบียน
                            </a>
                        </li>
                        </li>
                        <hr>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                ตั้งค่าระบบ
                            </a>
                            <ul class="dropdown-menu px-2">
                                <li><a class="dropdown-item" href=""><i class="bi bi-database"></i>จัดการข้อมูล</a></li>
                                <li><a class="dropdown-item" href=""><i
                                            class="bi bi-person-gear"></i>จำกัดสิทธิ์เข้าถึงข้อมูล</a></li>
                                <li><a class="dropdown-item" href=""><i
                                            class="bi bi-filetype-doc"></i>เอกสารที่เกี่ยวข้อง</a></li>
                                <li><a class="dropdown-item" href=""><i class="bi bi-bug"></i>หน้าแสดงข้อผิดพลาด</a>
                                </li>
                            </ul>
                        </li>
                        <hr>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                เกี่ยวกับฉัน
                            </a>
                            <ul class="dropdown-menu px-2">
                                <li><a class="dropdown-item" href=""><i class="bi bi-person-circle"></i>โปรไฟล์ &
                                        จัดการบัญชี</a></li>
                                <li><a class="dropdown-item" href=""><i
                                            class="bi bi-clock-history"></i>ประวัติการใช้งาน</a></li>
                            </ul>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn-insert"><i
                                        class="bi bi-door-open"></i>ออกจากระบบ</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <main class="px-5 py-4">
        @yield('content')
    </main>
</body>

</html>