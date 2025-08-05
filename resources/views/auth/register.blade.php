@extends('layouts.app')

@section('content')
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="{{ route('registerInsert') }}" method="POST">
                        @csrf

                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <p class="fw-normal mb-0 me-3 fs-2">ลงทะเบียน {{ config('app.name', '') }}</p>
                        </div>

                        <div>
                            <hr>
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="small form-label" for="name">คำนำหน้าชื่อ - นามสกุล</label>
                            <input type="text" id="name"
                                class="form-control form-control-lg @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" autocomplete="name" autofocus>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="phone">เบอร์โทรศัพท์</label>
                            <input type="text" id="phone"
                                class="form-control form-control-lg @error('phone') is-invalid @enderror" name="phone"
                                value="{{ old('phone') }}" autocomplete="phone" autofocus>
                            @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="small form-label" for="email">อีเมล</label>
                            <input type="text" id="email"
                                class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" autocomplete="email" autofocus>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div data-mdb-input-init class="form-outline mb-3">
                            <label class="form-label" for="password">รหัสผ่าน</label>
                            <input type="password" id="password"
                                class="form-control form-control-lg @error('password') is-invalid @enderror" name="password"
                                autocomplete="current-password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div data-mdb-input-init class="form-outline mb-3">
                            <label class="small form-label" for="password-confirm">ยืนยันรหัสผ่าน</label>
                            <input type="password" id="password-confirm" class="form-control form-control-lg"
                                name="password_confirmation" autocomplete="new-password">
                            {{-- No @error for password_confirmation usually, as it's covered by password.confirmed --}}
                        </div>

                        <div data-mdb-input-init class="form-outline mb-3">
                            <label class="small form-label" for="department">สังกัดกอง</label>
                            <select name="department" id="department" class="form-select form-select-lg @error('department') is-invalid @enderror">
                                <option value="" selected disabled hidden>เลือกสังกัดกองของท่าน</option>
                                @foreach ($departments as $item)
                                    <option value="{{ $item->department }}" {{ old('department') == $item->department ? 'selected' : '' }}>{{ $item->department }}</option>
                                @endforeach
                            </select>
                            @error('department')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-check mb-0">
                                <input class="form-check-input @error('agree') is-invalid @enderror" type="checkbox"
                                    name="agree" id="agree" {{ old('agree') ? 'checked' : '' }}>
                                <label class="form-check-label" for="agree">
                                    ยอมรับข้อตกลงการใช้งาน <a href="">อ่านข้อตกลง</a>
                                </label>
                                @error('agree')
                                    <div class="invalid-feedback d-block"> {{-- Use d-block to make it visible for checkbox --}}
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <a href="{{ route('login') }}" class="text-body">มีบัญชีแล้วเข้าสู่ระบบ ?</a>
                        </div>

                        {{-- Optional: Keep the general error list for any unhandled errors or a summary --}}
                        @if ($errors->any() && !$errors->has('name') && !$errors->has('phone') && !$errors->has('email') && !$errors->has('password') && !$errors->has('department') && !$errors->has('agree'))
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">ลงทะเบียน</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection