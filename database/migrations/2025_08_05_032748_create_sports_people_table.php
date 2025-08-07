<?php
use Dom\Comment;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sports_people', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable()->comment('รูปภาพ'); // รูปภาพ
            $table->string('prefix')->comment('คำนำหน้าชื่อ'); // คำนำหน้าชื่อ
            $table->string('name_th')->comment('ชื่อภาษาไทย'); // ชื่อภาษาไทย
            $table->string('nickname_th')->comment('ชื่อเล่นภาษาไทย'); // ชื่อเล่นภาษาไทย
            $table->string('middle_name')->comment('ชื่อกลาง'); // ชื่อกลาง
            $table->string('name_en')->comment('ชื่อภาษาอังกฤษ'); // ชื่อภาษาอังกฤษ
            $table->string('nickname_en')->comment('ชื่อเล่นภาษาอังกฤษ')->nullable(); // ชื่อเล่นภาษาอังกฤษ
            $table->string('phone')->comment('เบอร์โทรศัพท์'); // เบอร์โทรศัพท์
            $table->string('identification_card_number')->comment('เลขบัตรประชาชน'); // เลขบัตรประชาชน
            $table->string('nationality')->comment('สัญชาติ'); // สัญชาติ
            $table->string('ethnicity')->comment('เชื้อชาติ'); // เชื้อชาติ
            $table->string('religion')->comment('ศาสนา'); // ศาสนา
            $table->date('birthday')->comment('วันเกิด'); // วันเกิด
            $table->string('birth_hospital')->comment('โรงพยาบาลที่เกิด')->nullable(); // โรงพยาบาลที่เกิด
            $table->string('birth_group')->comment('หมู่ที่ (เกิด)')->nullable(); // หมู่ที่ (เกิด)
            $table->string('birth_district')->comment('อำเภอ (เกิด)')->nullable(); // อำเภอ (เกิด)
            $table->string('birth_province')->nullable()->comment('จังหวัด (เกิด)'); // จังหวัด (เกิด)
            $table->string('blood_group')->nullable()->comment('กรุ๊บเลือด'); // กรุ๊บเลือด

            // โรคประจำตัว (เก็บเป็น text หรือ json)
            $table->text('congenital_disease')->nullable()->comment('โรคประจำตัว'); // โรคประจำตัว
            $table->string('lnjury_history')->nullable()->comment('ประวัติการบาดเจ็บ'); // ประวัติการบาดเจ็บ
            $table->string('drug_allergy')->nullable()->comment('การแพ้ยา/อาหาร'); // การแพ้ยา/อาหาร

            // ที่อยู่ตามทะเบียนบ้าน
            $table->string('home_number')->nullable()->comment('บ้านเลขที่'); // บ้านเลขที่
            $table->string('group')->nullable()->comment('หมู่ที่'); // หมู่ที่
            $table->string('province')->nullable()->comment('จังหวัด'); // จังหวัด
            $table->string('district')->nullable()->comment('อำเภอ'); // อำเภอ
            $table->string('subdistrict')->nullable()->comment('ตำบล'); // ตำบล
            $table->string('zipcode')->nullable()->comment('รหัสไปรษณีย์'); // รหัสไปรษณีย์

            // ที่อยู่ปัจจุบัน
            $table->string('current_home_number')->nullable()->comment('บ้านเลขที่ (ปัจจุบัน)'); // บ้านเลขที่ (ปัจจุบัน)
            $table->string('current_group')->nullable()->comment('หมู่ที่ (ปัจจุบัน)'); // หมู่ที่ (ปัจจุบัน)
            $table->string('current_province')->nullable()->comment('จังหวัด (ปัจจุบัน)'); // จังหวัด (ปัจจุบัน)
            $table->string('current_district')->nullable()->comment('อำเภอ (ปัจจุบัน)'); // อำเภอ (ปัจจุบัน)
            $table->string('current_subdistrict')->nullable()->comment('ตำบล (ปัจจุบัน)'); // ตำบล (ปัจจุบัน)
            $table->string('current_zipcode')->nullable()->comment('รหัสไปรษณีย์ (ปัจจุบัน)'); // รหัสไปรษณีย์ (ปัจจุบัน)

            // การศึกษา
            $table->string('education_status')->nullable()->comment('สถานะการศึกษา (กำลังศึกษา/สำเร็จการศึกษา)'); // สถานะการศึกษา (กำลังศึกษา/สำเร็จการศึกษา)
            
            // กำลังศึกษา
            $table->string('current_educational_level')->nullable()->comment('ระดับศึกษาปัจจุบัน'); // ระดับศึกษาปัจจุบัน
            $table->string('current_educational_institution')->nullable()->comment('สถานศึกษาปัจจุบัน'); // สถานศึกษาปัจจุบัน
            $table->string('current_elementary_school')->nullable()->comment('สถานศึกษาประถม'); // สถานศึกษาประถม
            $table->string('current_elementary_gpa')->nullable()->comment('เกรดเฉลี่ยประถม'); // เกรดเฉลี่ยประถม
            $table->string('current_middle_school')->nullable()->comment('สถานศึกษามัธยมต้น'); // สถานศึกษามัธยมต้น
            $table->string('current_middle_school_gpa')->nullable()->comment('เกรดเฉลี่ยมัธยมต้น'); // เกรดเฉลี่ยมัธยมต้น
            $table->string('current_high_school')->nullable()->comment('สถานศึกษามัธยมปลาย'); // สถานศึกษามัธยมปลาย
            $table->string('current_study_high_school_plan')->nullable()->comment('แผนการเรียนมัธยมปลาย'); // แผนการเรียนมัธยมปลาย
            $table->string('current_high_school_gpa')->nullable()->comment('เกรดเฉลี่ยมัธยมปลาย'); // เกรดเฉลี่ยมัธยมปลาย

            // สำเร็จการศึกษา
            $table->string('graduated_level')->nullable()->comment('ะดับที่สำเร็จการศึกษา'); // ระดับที่สำเร็จการศึกษา
            $table->string('end_educational')->nullable()->comment('สถานศึกษาที่สำเร็จการศึกษา'); // สถานศึกษาที่สำเร็จการศึกษา
            $table->string('graduated_year')->nullable()->comment('ปีที่สำเร็จการศึกษา'); // ปีที่สำเร็จการศึกษา
            $table->string('graduated_gpa')->nullable()->comment('เกรดเฉลี่ยล่าสุด'); // เกรดเฉลี่ยล่าสุด
            $table->string('elementary_school')->nullable()->comment('สถานศึกษาประถม (สำเร็จ)'); // สถานศึกษาประถม (สำเร็จ)
            $table->string('elementary_gpa')->nullable()->comment('เกรดเฉลี่ยประถม (สำเร็จ)'); // เกรดเฉลี่ยประถม (สำเร็จ)
            $table->string('middle_school')->nullable()->comment('สถานศึกษามัธยมต้น (สำเร็จ)'); // สถานศึกษามัธยมต้น (สำเร็จ)
            $table->string('middle_school_gpa')->nullable()->comment('เกรดเฉลี่ยมัธยมต้น (สำเร็จ)'); // เกรดเฉลี่ยมัธยมต้น (สำเร็จ)
            $table->string('high_school')->nullable()->comment('สถานศึกษามัธยมปลาย (สำเร็จ)'); // สถานศึกษามัธยมปลาย (สำเร็จ)
            $table->string('study_high_school_plan')->nullable()->comment('แผนการเรียนมัธยมปลาย (สำเร็จ)'); // แผนการเรียนมัธยมปลาย (สำเร็จ)
            $table->string('high_school_gpa')->nullable()->comment('เกรดเฉลี่ยมัธยมปลาย (สำเร็จ)'); // เกรดเฉลี่ยมัธยมปลาย (สำเร็จ)
            $table->string('bachelor_gpa')->nullable()->comment('เกรดเฉลี่ยปริญญาตรี'); // เกรดเฉลี่ยปริญญาตรี

            $table->string('talent')->nullable()->comment('ความสามารถพิเศษ'); // ความสามารถพิเศษ

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sports_people');
    }
};