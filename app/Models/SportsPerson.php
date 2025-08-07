<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportsPerson extends Model
{
    use HasFactory;

    protected $fillable = [
        'prefix',
        'name_th',
        'nickname_th',
        'middle_name',
        'name_en',
        'phone',
        'identification_card_number',
        'nationality',
        'ethnicity',
        'religion',
        'birthday',
        'birth_hospital',
        'blood_group',
        'birth_district',
        'birth_province',
        'blood_group',

        // ที่อยู่ตามทะเบียนบ้าน
        'home_number',
        'group',
        'province',
        'district',
        'subdistrict',
        'zipcode',

        // ที่อยู่ปัจจุบัน
        'current_home_number',
        'current_group',
        'current_province',
        'current_district',
        'current_subdistrict',
        'current_zipcode',

        // โรคประจำตัว (เก็บเป็น text หรือ json)
        'congenital_disease',
        'lnjury_history',
        'drug_allergy',

        // การศึกษา
        'education_status',

        // กำลังศึกษา
        'current_educational_level',
        'current_educational_institution',
        'current_elementary_school',
        'current_elementary_gpa',
        'current_middle_school',
        'current_middle_school_gpa',
        'current_high_school',
        'study_high_school_plan',
        'current_high_school_gpa',

        // สำเร็จการศึกษา
        'graduated_level',
        'end_educational',
        'graduated_year',
        'graduated_gpa',
        'elementary_school',
        'elementary_gpa',
        'middle_school',
        'middle_school_gpa',
        'high_school',
        'study_high_school_plan',
        'high_school_gpa',
        'bachelor_gpa',

        // ความสามารถพิเศษ
        'talent',
        'image',

    ];
}
