<?php

namespace App\Http\Controllers\SportPeople;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SportPeopleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function getCurrentThaiDate()
    {
        $thaiMonths = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
        $month = $thaiMonths[date('n') - 1];
        $year = date('Y') + 543;

        return date("d $month $year H:i:s");
    }

    public function SportPeople()
    {
        return view('sports.sports-people');
    }

    public function ShowSportPeopleInsert()
    {
        return view('sports.add-sports-people');
    }

    public function SportPeopleInsert(Request $request)
    {

        $request->validate(
            [
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
                'prefix' => 'required', 
                'name_th' => 'required|string',
                'nickname_th' => 'required|string',
                'middle_name' => 'required|string',
                'name_en' => 'required|string',
                'phone' => 'required|string',
                'identification_card_number' => 'required|string|size:13',
                'nationality' => 'required|string',
                'ethnicity' => 'required|string',
                'religion' => 'required|string',
                'birthday' => 'required|date',
                'birth_hospital' => 'nullable|string',
                'birth_group' => 'nullable|string',
                'birth_district' => 'nullable|string',
                'birth_province' => 'nullable|string', 
                'blood_group' => 'nullable|string',

                // โรคประจำตัว
                'congenital_disease' => 'nullable|string',
                'lnjury_history' => 'nullable|string',
                'drug_allergy' => 'nullable|string',

                // ที่อยู่ตามทะเบียนบ้าน
                'home_number' => 'nullable|string',
                'group' => 'nullable|string',
                'province' => 'nullable|string',
                'district' => 'nullable|string',
                'subdistrict' => 'nullable|string',
                'zipcode' => 'nullable|string',

                // ที่อยู่ปัจจุบัน
                'current_home_number' => 'nullable|string',
                'current_group' => 'nullable|string',
                'current_province' => 'nullable|string',
                'current_district' => 'nullable|string',
                'current_subdistrict' => 'nullable|string',
                'current_zipcode' => 'nullable|string',

                // การศึกษา
                'education_status' => 'nullable|string',
                // 'check_address' => 'nullable',

                // กำลังศึกษา
                'current_educational_level' => 'nullable|string',
                'current_educational_institution' => 'nullable|string',
                'current_elementary_school' => 'nullable|string',
                'current_elementary_gpa' => 'nullable|string',
                'current_middle_school' => 'nullable|string',
                'current_middle_school_gpa' => 'nullable|string',
                'current_high_school' => 'nullable|string',
                'current_study_high_school_plan' => 'nullable|string',
                'current_high_school_gpa' => 'nullable|string',

                // สำเร็จการศึกษา
                'graduated_level' => 'nullable|string',
                'end_educational' => 'nullable|string',
                'graduated_year' => 'nullable|string',
                'graduated_gpa' => 'nullable|string',
                'elementary_school' => 'nullable|string',
                'elementary_gpa' => 'nullable|string',
                'middle_school' => 'nullable|string',
                'middle_school_gpa' => 'nullable|string',
                'high_school' => 'nullable|string',
                'study_high_school_plan' => 'nullable|string',
                'high_school_gpa' => 'nullable|string',
                'bachelor_gpa' => 'nullable|string',

                // ความสามารถพิเศษ
                'talent' => 'nullable|string',
             
            ],
            [
                'image.image' => 'ไฟล์ที่อัปโหลดต้องเป็นรูปภาพ',
                'image.mimes' => 'รูปภาพต้องเป็นไฟล์ประเภท jpeg, png, jpg หรือ gif',
                'image.max' => 'ขนาดรูปภาพต้องไม่เกิน 2MB',
                'prefix.required' => 'กรุณาเลือกคำนำหน้าชื่อ',
                'name_th.required' => 'กรุณากรอกชื่อภาษาไทย',
                'nickname_th.required' => 'กรุณากรอกชื่อเล่นภาษาไทย',
                'middle_name.required' => 'กรุณากรอกชื่อกลาง',
                'name_en.required' => 'กรุณากรอกชื่อภาษาอังกฤษ',
                'phone.required' => 'กรุณากรอกเบอร์โทรศัพท์',
                'identification_card_number.required' => 'กรุณากรอกหมายเลขบัตรประชาชน',
                'identification_card_number.size' => 'หมายเลขบัตรประชาชนต้องมี 13 หลัก',
                'nationality.required' => 'กรุณากรอกสัญชาติ',
                'ethnicity.required' => 'กรุณากรอกเชื้อชาติ',
                'religion.required' => 'กรุณากรอกศาสนา',
                'birthday.required' => 'กรุณากรอกวันเดือนปีเกิด',
                'birthday.date' => 'รูปแบบวันเดือนปีเกิดไม่ถูกต้อง',
                'place_of_birth.string' => 'สถานที่เกิดต้องเป็นข้อความ',
                'blood_group.string' => 'กรุ๊บเลือดต้องเป็นข้อความ',

                // โรคประจำตัว
                'congenital_disease.string' => 'โรคประจำตัวต้องเป็นข้อความ',
                'lnjury_history.string' => 'ประวัติการบาดเจ็บต้องเป็นข้อความ',
                'drug_allergy.string' => 'การแพ้ยา/อาหารต้องเป็นข้อความ',

                // ที่อยู่ตามทะเบียนบ้าน
                'home_number.string' => 'บ้านเลขที่ต้องเป็นข้อความ',
                'group.string' => 'หมู่ที่ต้องเป็นข้อความ',
                'province.string' => 'จังหวัดต้องเป็นข้อความ',
                'district.string' => 'อำเภอต้องเป็นข้อความ',
                'subdistrict.string' => 'ตำบลต้องเป็นข้อความ',
                'zipcode.string' => 'รหัสไปรษณีย์ต้องเป็นข้อความ',

                // ที่อยู่ปัจจุบัน
                'current_home_number.string' => 'บ้านเลขที่ (ปัจจุบัน) ต้องเป็นข้อความ',
                'current_group.string' => 'หมู่ที่ (ปัจจุบัน) ต้องเป็นข้อความ',
                'current_province.string' => 'จังหวัด (ปัจจุบัน) ต้องเป็นข้อความ',
                'current_district.string' => 'อำเภอ (ปัจจุบัน) ต้องเป็นข้อความ',
                'current_subdistrict.string' => 'ตำบล (ปัจจุบัน) ต้องเป็นข้อความ',
                'current_zipcode.string' => 'รหัสไปรษณีย์ (ปัจจุบัน) ต้องเป็นข้อความ', 

                // กำลังศึกษา
                'current_educational_level.string' => 'ระดับการศึกษาต้องเป็นข้อความ',
                'current_educational_institution.string' => 'สถานศึกษาปัจจุบันต้องเป็นข้อความ',
                'current_elementary_school.string' => 'สถานศึกษาประถมต้องเป็นข้อความ',
                'current_elementary_gpa.string' => 'เกรดเฉลี่ยประถมต้องเป็นข้อความ',
                'current_middle_school.string' => 'สถานศึกษามัธยมต้นต้องเป็นข้อความ',
                'current_middle_school_gpa.string' => 'เกรดเฉลี่ยมัธยมต้นต้องเป็นข้อความ',
                'current_high_school.string' => 'สถานศึกษามัธยมปลายต้องเป็นข้อความ',
                'current_study_high_school_plan.string' => 'แผนการเรียนมัธยมปลายต้องเป็นข้อความ',
                'current_high_school_gpa.string' => 'เกรดเฉลี่ยมัธยมปลายต้องเป็นข้อความ',

                // สำเร็จการศึกษา
                'graduated_level.string' => 'ระดับที่สำเร็จการศึกษาต้องเป็นข้อความ',
                'end_educational.string' => 'สถานศึกษาที่สำเร็จการศึกษา ต้องเป็นข้อความ',
                'graduated_year.string' => 'ปีที่สำเร็จการศึกษา ต้องเป็นข้อความ',
                'graduated_gpa.string' => 'เกรดเฉลี่ยล่าสุดต้องเป็นข้อความ',
                'elementary_school.string' => 'สถานศึกษาประถม (สำเร็จ) ต้องเป็นข้อความ',
                'elementary_gpa.string' => 'เกรดเฉลี่ยประถมต้องเป็นข้อความ',
                'middle_school.string' => 'สถานศึกษามัธยมต้องเป็นข้อความ',
                'middle_school_gpa.string' => 'เกรดเฉลี่ยมัธยมต้องเป็นข้อความ',
                'high_school.string' => 'สถานศึกษามัธยมปลายต้องเป็นข้อความ',
                'study_high_school_plan.string' => 'แผนการเรียนมัธยมปลายต้องเป็นข้อความ',
                'high_school_gpa.string' => 'เกรดเฉลี่ยมัธยมปลายต้องเป็นข้อความ',
                'bachelor_gpa.string' => 'เกรดเฉลี่ยปริญญาต้องเป็นข้อความ',

                // ความสามารถพิเศษ
                'talent.string' => 'ความสามารถพิเศษต้องเป็นข้อความ',
            ]
        );

        $file_name = null;
        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $file_name = time() . '.' . $extension;
            $path = 'uploads/image/sports-people/';
            $file->move($path, $file_name);
        } else {
            $path = '';
            $file_name = null;
        }

        $date = $this->getCurrentThaiDate();

        $data = [
            
        ];

        return redirect()->route('SportPeople')->with('success', 'เพิ่มข้อมูลสำเร็จ!');
    }
}
