@extends('layouts.layout-admin')

@section('title', 'นักกีฬา')
@section('content')
    <section class="py-5">
        <article>
            <div class="topic_content">
                <p class="fs-5"><i class="bi bi-person-circle"></i>รายการนักกีฬา</p>
                <div>
                    <button type="button" class="btn-insert" onclick="location.href='{{ route('ShowSportPeopleInsert') }}'">
                        <i class="bi bi-plus-lg"></i>เพิ่มข้อมูล
                    </button>
                    <button type="button" class="btn-insert">
                        <i class="bi bi-filetype-xls"></i>ส่งออก Excel
                    </button>
                </div>
            </div>
        </article>
        <div class="box_card_profile">
            <article class="card_profile_sports_people">
                <img src="{{ asset('images/profile_sports_people/กระยางขาว.png') }}" alt="">
                <h3>ฉายา : </h3>
                <p>ชื่อ - นามสกุล</p>
                <div>
                    <button type="button" class="btn-insert">
                        <i class="bi bi-pencil-square"></i>รายละเอียด
                    </button>
                    <button type="button" class="btn-insert">
                        <i class="bi bi-person-standing"></i>InBody
                    </button>
                </div>
            </article>
        </div>
    </section>
@endsection