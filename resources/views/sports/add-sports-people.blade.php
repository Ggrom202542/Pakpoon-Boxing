@extends('layouts.layout-admin')

@section('title', 'เพิ่มรายการ')
@section('content')
    <section class="py-5">
        <article class="card_add_infomation">
            <div class="btn-topform">
                <button type="button" class="btn-insert" onclick="history.back()">
                    <i class="bi bi-arrow-left"></i>ย้อนกลับ
                </button>
            </div>
            <div style="justify-self: center">
                <img src="{{ asset('images/logo.png') }}" alt="logo">
            </div>
            <h4>เพิ่มรายการใหม่</h4>
            <p style="color: var(--color-8)">
                ตรวจสอบข้อมูลทุกครั้งเมื่อทำรายการเพิ่มข้อมูล หากมีข้อผิดพลาด ระบบอาจจะแจ้งเตือน
                <br>และไม่กรอกข้อมูลที่เป็นอันตรายต่อระบบเด็ดขาด
            </p>
        </article>
        <article class="form-content">
            <form method="POST" action="{{ route('SportPeopleInsert') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-gap">
                    <div class="form-body">
                        <div>
                            <label for="image">แนบรูปภาพ</label>
                            <div style="text-align: center">
                                <img src="" id="imgUpload" alt="">
                            </div>
                            <input type="file" name="image" id="image" class="form-control" accept="image/*"
                                onchange="readURL(this);">
                            @error('image')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="prefix">คำนำหน้าชื่อ <span style="color: red">*</span></label>
                            <select name="prefix" id="prefix" required>
                                <option value="{{ old('prefix') }}" disabled selected hidden>
                                    {{ old('prefix', 'กรุณาเลือกรายการ') }}
                                </option>
                                <option value="เด็กชาย">เด็กชาย</option>
                                <option value="เด็กหญิง">เด็กหญิง</option>
                                <option value="นาย">นาย</option>
                                <option value="นางสาว">นางสาว</option>
                            </select>
                            @error('prefix')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="name_th">ชื่อ - นามสกุล (ภาษาไทย) <span style="color: red">*</span></label>
                            <input type="text" name="name_th" id="name_th" required value="{{ old('name_th') }}">
                            @error('name_th')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="nickname_th">ชื่อเล่น (ภาษาไทย) <span style="color: red">*</span></label>
                            <input type="text" name="nickname_th" id="nickname_th" required
                                value="{{ old('nickname_th') }}">
                            @error('nickname_th')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="middle_name">ฉายา <span style="color: red">*</span></label>
                            <input type="text" name="middle_name" id="middle_name" required
                                value="{{ old('middle_name') }}">
                            @error('middle_name')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="name_en">ชื่อเล่น (ภาษาอังกฤษ) <span style="color: red">*</span></label>
                            <input type="text" name="name_en" id="name_en" required value="{{ old('name_en') }}">
                            @error('name_en')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="phone">เบอร์โทรศัพท์ <span style="color: red">*</span></label>
                            <input type="text" name="phone" id="phone" required value="{{ old('phone') }}">
                            @error('phone')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="identification_card_number">เลขบัตรประชาชน 13 หลัก<span
                                    style="color: red">*</span></label>
                            <input type="text" name="identification_card_number" id="identification_card_number" required
                                value="{{ old('identification_card_number') }}">
                            @error('identification_card_number')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="nationality">สัญชาติ <span style="color: red">*</span></label>
                            <select name="nationality" id="nationality" required>
                                <option value="" disabled selected hidden>กรุณาเลือกสัญชาติ</option>
                                <option value="ไทย" {{ old('nationality') == 'ไทย' ? 'selected' : '' }}>ไทย</option>
                                <option value="จีน" {{ old('nationality') == 'จีน' ? 'selected' : '' }}>จีน</option>
                                <option value="อังกฤษ" {{ old('nationality') == 'อังกฤษ' ? 'selected' : '' }}>อังกฤษ</option>
                                <option value="ญี่ปุ่น" {{ old('nationality') == 'ญี่ปุ่น' ? 'selected' : '' }}>ญี่ปุ่น
                                </option>
                            </select>
                            @error('nationality')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                            <script>
                                $(document).ready(function () {
                                    $('#nationality').select2({
                                        placeholder: "กรุณาเลือกสัญชาติ",
                                        // allowClear: true,
                                        tags: true // เปิดให้พิมพ์เพิ่มเอง
                                    });
                                });
                            </script>
                        </div>
                        <div>
                            <label for="ethnicity">เชื้อชาติ <span style="color: red">*</span></label>
                            <select name="ethnicity" id="ethnicity" required>
                                <option value="" disabled selected hidden>กรุณาเลือกเชื้อชาติ</option>
                                <option value="ไทย" {{ old('ethnicity') == 'ไทย' ? 'selected' : '' }}>ไทย</option>
                                <option value="จีน" {{ old('ethnicity') == 'จีน' ? 'selected' : '' }}>จีน</option>
                                <option value="อังกฤษ" {{ old('ethnicity') == 'อังกฤษ' ? 'selected' : '' }}>อังกฤษ</option>
                                <option value="ญี่ปุ่น" {{ old('ethnicity') == 'ญี่ปุ่น' ? 'selected' : '' }}>ญี่ปุ่น</option>
                                <!-- เพิ่ม option ตามต้องการ -->
                            </select>
                            @error('ethnicity')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                            <script>
                                $(document).ready(function () {
                                    $('#ethnicity').select2({
                                        placeholder: "กรุณาเลือกเชื้อชาติ",
                                        // allowClear: true,
                                        tags: true // เปิดให้พิมพ์เพิ่มเอง
                                    });
                                });
                            </script>
                        </div>
                        <div>
                            <label for="religion">ศาสนา <span style="color: red">*</span></label>
                            <select name="religion" id="religion" required>
                                <option value="" disabled selected hidden>กรุณาเลือกศาสนา</option>
                                <option value="พุทธ" {{ old('religion') == 'พุทธ' ? 'selected' : '' }}>พุทธ</option>
                                <option value="คริสต์" {{ old('religion') == 'คริสต์' ? 'selected' : '' }}>คริสต์</option>
                                <option value="อิสลาม" {{ old('religion') == 'อิสลาม' ? 'selected' : '' }}>อิสลาม</option>
                                <option value="ฮินดู" {{ old('religion') == 'ฮินดู' ? 'selected' : '' }}>ฮินดู</option>
                                <option value="อื่น ๆ" {{ old('religion') == 'อื่น ๆ' ? 'selected' : '' }}>อื่น ๆ</option>
                                <!-- เพิ่ม option ตามต้องการ -->
                            </select>
                            @error('religion')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                            <script>
                                $(document).ready(function () {
                                    $('#religion').select2({
                                        placeholder: "กรุณาเลือกศาสนา",
                                        // allowClear: true,
                                        tags: true // เปิดให้พิมพ์เพิ่มเอง
                                    });
                                });
                            </script>
                        </div>
                        <div>
                            <label for="birthday">วัน เดือน ปีเกิด? <span style="color: red">*</span></label>
                            <input type="date" name="birthday" id="birthday" required value="{{ old('birthday') }}">
                            @error('birthday')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <fieldset class="border p-3 mt-3" style="background-color: #FFF">
                                <legend class="float-none w-auto p-2 fs-6" style="color: var(--color-8)">สถานที่เกิด
                                </legend>
                                <div>
                                    <label for="birth_hospital">โรงพยาบาลที่เกิด</label>
                                    <input type="text" name="birth_hospital" id="birth_hospital"
                                        value="{{ old('birth_hospital') }}">
                                </div>
                                <div>
                                    <label for="birth_group">หมู่ที่</label>
                                    <input type="text" name="birth_group" id="birth_group" value="{{ old('birth_group') }}">
                                </div>
                                <div>
                                    <label for="birth_district">อำเภอ</label>
                                    <input type="text" name="birth_district" id="birth_district"
                                        value="{{ old('birth_district') }}">
                                </div>
                                <div>
                                    <label for="birth_province">จังหวัด</label>
                                    <input type="text" name="birth_province" id="birth_province"
                                        value="{{ old('birth_province') }}">
                                </div>
                            </fieldset>
                        </div>
                        <div>
                            <label for="blood_group">กรุ๊บเลือด</label>
                            <select name="blood_group" id="blood_group">
                                <option value="{{ old('blood_group') }}" disabled selected hidden>
                                    {{ old('blood_group', 'กรุณาเลือกรายการ') }}
                                </option>
                                <option value="O">O</option>
                                <option value="A">A</option>
                                <option value="AB">AB</option>
                                <option value="B">B</option>
                            </select>
                        </div>
                        <div>
                            <label for="congenital_disease">โรคประจำตัว (ถ้ามี)</label>
                            <select name="congenital_disease[]" id="congenital_disease" multiple="multiple">
                                <option value="เบาหวาน" {{ collect(old('congenital_disease'))->contains('เบาหวาน') ? 'selected' : '' }}>เบาหวาน</option>
                                <option value="ความดันโลหิตสูง" {{ collect(old('congenital_disease'))->contains('ความดันโลหิตสูง') ? 'selected' : '' }}>
                                    ความดันโลหิตสูง</option>
                                <option value="หอบหืด" {{ collect(old('congenital_disease'))->contains('หอบหืด') ? 'selected' : '' }}>หอบหืด</option>
                                <option value="หัวใจ" {{ collect(old('congenital_disease'))->contains('หัวใจ') ? 'selected' : '' }}>หัวใจ</option>
                                <option value="ภูมิแพ้" {{ collect(old('congenital_disease'))->contains('ภูมิแพ้') ? 'selected' : '' }}>ภูมิแพ้</option>
                                <!-- เพิ่ม option ตามต้องการ -->
                            </select>
                            @error('congenital_disease')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                            <script>
                                $(document).ready(function () {
                                    $('#congenital_disease').select2({
                                        placeholder: "เลือกหรือพิมพ์โรคประจำตัว",
                                        tags: true,
                                        // allowClear: true,
                                        closeOnSelect: false // เปิดให้เลือกหลายอันโดย dropdown ไม่ปิดทันที
                                    });
                                });
                            </script>
                        </div>
                        <div>
                            <label for="lnjury_history">ประวัติการบาดเจ็บ (ถ้ามี)</label>
                            <input type="text" name="lnjury_history" id="lnjury_history"
                                value="{{ old('lnjury_history') }}">
                        </div>
                        <div>
                            <label for="drug_allergy">การแพ้ยา / อาหาร (ถ้ามี)</label>
                            <input type="text" name="drug_allergy" id="drug_allergy" value="{{ old('drug_allergy') }}">
                        </div>
                        <fieldset class="border p-3 mt-3" style="background-color: #FFF">
                            <legend class="float-none w-auto p-2 fs-6" style="color: var(--color-8)">ที่อยู่ตามทะเบียนบ้าน
                            </legend>
                            <div>
                                <label for="home_number">บ้านเลขที่</label>
                                <input type="text" name="home_number" id="home_number" value="{{ old('home_number') }}">
                            </div>
                            <div>
                                <label for="group">หมู่ที่</label>
                                <input type="text" name="group" id="group" value="{{ old('group') }}">
                            </div>
                            <div>
                                <label for="province">จังหัวด</label>
                                <select name="province" id="province">
                                    <option value="" selected hidden disabled>กรุณาเลือก</option>
                                </select>
                            </div>
                            <div>
                                <label for="district">อำเภอ</label>
                                <select name="district" id="district" disabled>
                                    <option value="" selected hidden disabled>กรุณาเลือก</option>
                                </select>
                            </div>
                            <div>
                                <label for="subdistrict">ตำบล</label>
                                <select name="subdistrict" id="subdistrict" disabled>
                                    <option value="" selected hidden disabled>กรุณาเลือก</option>
                                </select>
                            </div>
                            <div>
                                <label for="zipcode">รหัสไปรษณีย์</label>
                                <select name="zipcode" id="zipcode" disabled>
                                    <option value="" selected hidden disabled>กรุณาเลือก</option>
                                </select>
                            </div>
                        </fieldset>
                    </div>
                    <div class="form-body">

                        <fieldset class="border p-3 mt-3" style="background-color: #FFF">
                            <legend class="float-none w-auto p-2 fs-6" style="color: var(--color-8)">ที่อยู่ปัจจุบัน
                            </legend>
                            <input type="checkbox" name="check_address" id="check_address"
                                style="box-shadow: none; width: 50px;">
                            <label for="check_address">ที่อยู่ตรงตามทะเบียนบ้าน</label>
                            <div>
                                <label for="current_home_number">บ้านเลขที่</label>
                                <input type="text" name="current_home_number" id="current_home_number"
                                    value="{{ old('current_home_number') }}">
                            </div>
                            <div>
                                <label for="current_group">หมู่ที่</label>
                                <input type="text" name="current_group" id="current_group"
                                    value="{{ old('current_group') }}">
                            </div>
                            <div>
                                <label for="current_province">จังหัวด</label>
                                <select name="current_province" id="current_province">
                                    <option value="" selected hidden disabled>กรุณาเลือก</option>
                                </select>
                            </div>
                            <div>
                                <label for="current_district">อำเภอ</label>
                                <select name="current_district" id="current_district" disabled>
                                    <option value="" selected hidden disabled>กรุณาเลือก</option>
                                </select>
                            </div>
                            <div>
                                <label for="current_subdistrict">ตำบล</label>
                                <select name="current_subdistrict" id="current_subdistrict" disabled>
                                    <option value="" selected hidden disabled>กรุณาเลือก</option>
                                </select>
                            </div>
                            <div>
                                <label for="current_zipcode">รหัสไปรษณีย์</label>
                                <select name="current_zipcode" id="current_zipcode" disabled>
                                    <option value="" selected hidden disabled>กรุณาเลือก</option>
                                </select>
                            </div>
                        </fieldset>
                        <script>
                            $(document).ready(function () {
                                $('#check_address').on('change', function () {
                                    if ($(this).is(':checked')) {
                                        // Copy ข้อมูลจากทะเบียนบ้านไปที่อยู่ปัจจุบัน
                                        $('#current_home_number').val($('#home_number').val());
                                        $('#current_group').val($('#group').val());

                                        // จังหวัด
                                        $('#current_province').val($('#province').val()).trigger('change');
                                        // อำเภอ (ต้องรอ province เปลี่ยนก่อน)
                                        setTimeout(function () {
                                            $('#current_district').val($('#district').val()).trigger('change');
                                            // ตำบล
                                            setTimeout(function () {
                                                $('#current_subdistrict').val($('#subdistrict').val()).trigger('change');
                                                // รหัสไปรษณีย์
                                                $('#current_zipcode').val($('#zipcode').val()).trigger('change');
                                            }, 200);
                                        }, 200);

                                    } else {
                                        // เคลียร์ข้อมูลที่อยู่ปัจจุบัน
                                        $('#current_home_number').val('');
                                        $('#current_group').val('');
                                        $('#current_province').val('').trigger('change');
                                        $('#current_district').val('').trigger('change');
                                        $('#current_subdistrict').val('').trigger('change');
                                        $('#current_zipcode').val('').trigger('change');
                                    }
                                });
                            });
                        </script>
                        <div>
                            <fieldset class="border p-3 mt-3" style="background-color: #FFF">
                                <legend class="float-none w-auto p-2 fs-6" style="color: var(--color-8)">ข้อมูลการศึกษา
                                </legend>
                                <p>กรุณากรอกข้อมูลการศึกษาปัจจุบันและข้อมูลการศึกษาที่ผ่านมา</p>
                                <div>
                                    <label>สถานะการศึกษา <span style="color: red">*</span></label>
                                    <div>
                                        <input type="radio" id="is_studying" name="education_status" value="studying" {{ old('education_status') == 'studying' ? 'checked' : '' }}
                                            style="box-shadow: none; width: 20px;">
                                        <label for="is_studying">กำลังศึกษา</label><br>
                                        <input type="radio" id="is_graduated" name="education_status" value="graduated" {{ old('education_status') == 'graduated' ? 'checked' : '' }}
                                            style="box-shadow: none; width: 20px;">
                                        <label for="is_graduated">สำเร็จการศึกษาแล้ว</label>
                                    </div>
                                </div>
                                <div id="current_education_section" style="display: none;">
                                    <!-- ฟิลด์สำหรับกำลังศึกษา -->

                                    <div>
                                        <label for="current_educational_level">ระดับศึกษาปัจจุบัน</label>
                                        <select name="current_educational_level" id="current_educational_level">
                                            <option value="" disabled selected hidden>กรุณาเลือกระดับศึกษา</option>
                                            <option value="ประถมศึกษา">ประถมศึกษา</option>
                                            <option value="มัธยมศึกษาตอนต้น">มัธยมศึกษาตอนต้น</option>
                                            <option value="มัธยมศึกษาตอนปลาย / ปวช">มัธยมศึกษาตอนปลาย / ปวช</option>
                                            <option value="ปริญญาตรี / ปวส">ปริญญาตรี / ปวส</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="current_educational_institution">สถานศึกษาปัจจุบัน</label>
                                        <input type="text" name="current_educational_institution"
                                            id="current_educational_institution"
                                            value="{{ old('current_educational_institution') }}">
                                    </div>
                                    <div id="current_grade_primary" style="display: none;">
                                        <div>
                                            <label for="current_elementary_school">สถานศึกษาประถมศึกษา</label>
                                            <input type="text" name="current_elementary_school"
                                                id="current_elementary_school"
                                                value="{{ old('current_elementary_school') }}">
                                        </div>
                                        <div>
                                            <label for="current_elementary_gpa">เกรดเฉลี่ยประถม</label>
                                            <input type="text" name="current_elementary_gpa" id="current_elementary_gpa"
                                                value="{{ old('current_elementary_gpa') }}">
                                        </div>
                                    </div>
                                    <div id="current_grade_middle" style="display: none;">
                                        <div>
                                            <label for="current_middle_school">สถานศึกษามัธยมต้น</label>
                                            <input type="text" name="current_middle_school" id="current_middle_school"
                                                value="{{ old('current_middle_school') }}">
                                        </div>
                                        <div>
                                            <label for="current_middle_school_gpa">เกรดเฉลี่ยมัธยมต้น</label>
                                            <input type="text" name="current_middle_school_gpa"
                                                id="current_middle_school_gpa"
                                                value="{{ old('current_middle_school_gpa') }}">
                                        </div>
                                    </div>
                                    <div id="current_grade_high" style="display: none;">
                                        <div>
                                            <label for="current_high_school">สถานศึกษามัธยมปลาย / ปวช</label>
                                            <input type="text" name="current_high_school" id="current_high_school"
                                                value="{{ old('current_high_school') }}">
                                        </div>
                                        <div>
                                            <label for="current_study_high_school_plan">แผนการเรียน</label>
                                            <input type="text" name="study_high_school_plan" id="study_high_school_plan"
                                                value="{{ old('study_high_school_plan') }}">
                                        </div>
                                        <div>
                                            <label for="current_high_school_gpa">เกรดเฉลี่ยมัธยมปลาย</label>
                                            <input type="text" name="current_high_school_gpa" id="current_high_school_gpa"
                                                value="{{ old('current_high_school_gpa') }}">
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function () {
                                        function toggleEducationSection() {
                                            $('#current_education_section').toggle($('#is_studying').is(':checked'));
                                            $('#graduated_grade_section').toggle($('#is_graduated').is(':checked'));
                                        }
                                        function toggleCurrentGradeFields() {
                                            var level = $('#current_educational_level').val();
                                            $('#current_grade_primary, #current_grade_middle, #current_grade_high').hide();
                                            if (level === 'มัธยมศึกษาตอนต้น') {
                                                $('#current_grade_primary').show();
                                            } else if (level === 'มัธยมศึกษาตอนปลาย / ปวช') {
                                                $('#current_grade_primary').show();
                                                $('#current_grade_middle').show();
                                            } else if (level === 'ปริญญาตรี / ปวส') {
                                                $('#current_grade_primary').show();
                                                $('#current_grade_middle').show();
                                                $('#current_grade_high').show();
                                            }
                                            // ถ้าเลือกประถม ไม่ต้องแสดงเกรด
                                        }
                                        $('input[name="education_status"]').on('change', toggleEducationSection);
                                        $('#current_educational_level').on('change', toggleCurrentGradeFields);
                                        toggleEducationSection();
                                        toggleCurrentGradeFields();
                                    });
                                </script>
                                <div id="graduated_grade_section" style="display: none;">
                                    <!-- ฟิลด์สำหรับสำเร็จการศึกษาแล้ว -->

                                    <div>
                                        <label for="graduated_level">ระดับที่สำเร็จการศึกษา</label>
                                        <select name="graduated_level" id="graduated_level">
                                            <option value="" disabled selected hidden>กรุณาเลือกระดับ</option>
                                            <option value="ประถมศึกษา">ประถมศึกษา</option>
                                            <option value="มัธยมศึกษาตอนต้น">มัธยมศึกษาตอนต้น</option>
                                            <option value="มัธยมศึกษาตอนปลาย / ปวช">มัธยมศึกษาตอนปลาย / ปวช</option>
                                            <option value="ปริญญาตรี / ปวส">ปริญญาตรี / ปวส</option>

                                        </select>
                                    </div>
                                    <div>
                                        <label for="end_educational">สถานศึกษาที่สำเร็จการศึกษา</label>
                                        <input type="text" name="end_educational" id="end_educational"
                                            value="{{ old('end_educational') }}">
                                    </div>
                                    <div>
                                        <label for="graduated_year">ปีที่สำเร็จการศึกษา</label>
                                        <input type="text" name="graduated_year" id="graduated_year"
                                            value="{{ old('graduated_year') }}">
                                    </div>
                                    <div>
                                        <label for="graduated_gpa">เกรดเฉลี่ย</label>
                                        <input type="text" name="graduated_gpa" id="graduated_gpa"
                                            value="{{ old('graduated_gpa') }}">
                                    </div>
                                    <div id="grade_primary" style="display: none;">
                                        <div>
                                            <label for="elementary_school">สถานศึกษาประถมศึกษา</label>
                                            <input type="text" name="elementary_school" id="elementary_school"
                                                value="{{ old('elementary_school') }}">
                                        </div>
                                        <div>
                                            <label for="elementary_gpa">เกรดเฉลี่ยประถม</label>
                                            <input type="text" name="elementary_gpa" id="elementary_gpa"
                                                value="{{ old('elementary_gpa') }}">
                                        </div>
                                    </div>
                                    <div id="grade_middle" style="display: none;">
                                        <div>
                                            <label for="middle_school">สถานศึกษามัธยมต้น</label>
                                            <input type="text" name="middle_school" id="middle_school"
                                                value="{{ old('middle_school') }}">
                                        </div>
                                        <div>
                                            <label for="middle_school_gpa">เกรดเฉลี่ยมัธยมต้น</label>
                                            <input type="text" name="middle_school_gpa" id="middle_school_gpa"
                                                value="{{ old('middle_school_gpa') }}">
                                        </div>
                                    </div>
                                    <div id="grade_high" style="display: none;">
                                        <div>
                                            <label for="high_school">สถานศึกษามัธยมปลาย / ปวช</label>
                                            <input type="text" name="high_school" id="high_school"
                                                value="{{ old('high_school') }}">
                                        </div>
                                        <div>
                                            <label for="study_high_school_plan">แผนการเรียน</label>
                                            <input type="text" name="study_high_school_plan" id="study_high_school_plan"
                                                value="{{ old('study_high_school_plan') }}">
                                        </div>
                                        <div>
                                            <label for="high_school_gpa">เกรดเฉลี่ยมัธยมปลาย / ปวช</label>
                                            <input type="text" name="high_school_gpa" id="high_school_gpa"
                                                value="{{ old('high_school_gpa') }}">
                                        </div>
                                    </div>
                                    <div id="grade_bachelor" style="display: none;">
                                        <label for="bachelor_gpa">เกรดเฉลี่ยปริญญาตรี</label>
                                        <input type="text" name="bachelor_gpa" id="bachelor_gpa"
                                            value="{{ old('bachelor_gpa') }}">
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function () {
                                        function toggleEducationSection() {
                                            $('#current_education_section').toggle($('#is_studying').is(':checked'));
                                            $('#graduated_grade_section').toggle($('#is_graduated').is(':checked'));
                                        }
                                        function toggleGradeFields() {
                                            var level = $('#graduated_level').val();
                                            $('#grade_primary, #grade_middle, #grade_high, #grade_bachelor').hide();
                                            if (level === 'มัธยมศึกษาตอนต้น') {
                                                $('#grade_primary').show();
                                            } else if (level === 'มัธยมศึกษาตอนปลาย / ปวช') {
                                                $('#grade_primary').show();
                                                $('#grade_middle').show();
                                            } else if (level === 'ปริญญาตรี / ปวส') {
                                                $('#grade_primary').show();
                                                $('#grade_middle').show();
                                                $('#grade_high').show();
                                            }
                                            // ถ้าเลือกประถม ไม่ต้องแสดงเกรด
                                        }
                                        $('input[name="education_status"]').on('change', toggleEducationSection);
                                        $('#graduated_level').on('change', toggleGradeFields);
                                        toggleEducationSection();
                                        toggleGradeFields();
                                    });
                                </script>
                                <script>
                                    $(document).ready(function () {
                                        function toggleEducationSection() {
                                            $('#current_education_section').toggle($('#is_studying').is(':checked'));
                                            $('#graduated_grade_section').toggle($('#is_graduated').is(':checked'));
                                        }
                                        $('#is_studying, #is_graduated').on('change', toggleEducationSection);
                                        toggleEducationSection(); // initial
                                    });
                                </script>

                                </label>
                            </fieldset>
                        </div>
                        <div>
                            <label for="talent">ความสามารถพิเศษ</label>
                            <input type="text" name="talent" id="talent" value="{{ old('talent') }}">
                        </div>
                        <button type="submit" class="btn-confirmed">
                            <i class="bi bi-save"></i>
                            บันทึกข้อมูล
                        </button>
                    </div>
                </div>
            </form>
        </article>
        <script src="{{ asset('js/image-preview.js') }}"></script>
        <script src="{{ asset('js/check-address.js') }}"></script>
        <script src="{{ asset('js/thailand.js') }}"></script>
    </section>
@endsection