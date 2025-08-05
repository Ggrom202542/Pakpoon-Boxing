@extends('layouts.app')

@section('content')
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <p class="fw-normal mb-0 me-3 fs-2">ลงชื่อเข้าใช้งาน {{ config('app.name', '') }}</p>
                        </div>

                        <div>
                            <hr>
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="phone">เบอร์โทรศัพท์</label>
                            <input type="text" id="phone"
                                class="form-control form-control-lg @error('phone') is-invalid @enderror" name="phone"
                                value="{{ old('phone') }}" autocomplete="phone" autofocus>

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div data-mdb-input-init class="form-outline mb-3">
                            <label class="form-label" for="password">รหัสผ่าน</label>
                            <input type="password" id="password"
                                class="form-control form-control-lg @error('password') is-invalid @enderror" name="password"
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    จดจำฉันไว้
                                </label>
                            </div>
                            <a href="{{ route('register') }}" class="text-body">ยังไม่มีบัญชีหรือไม่ ?</a>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">ลงชื่อเข้าใช้</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection