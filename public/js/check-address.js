function makeList(id, data, clear = true) {
    let html = '';
    if (clear) {
        $('#' + id).html('');
    }
    data.forEach((element) => {
        html += `<option value="${element}">${element}</option>`;
    });
    $('#' + id).append(html);
}

// ฟังก์ชันสำหรับโหลด address โดยใช้ prefix
function setupAddress(prefix) {
    let provinces = getProvinces();
    makeList(prefix + 'province', provinces, false);

    $('#' + prefix + 'province').change(function () {
        let district = getDistrict($('#' + prefix + 'province').val());
        makeList(prefix + 'district', district);
        let subDistrict = getSubDistrict(
            $('#' + prefix + 'province').val(),
            $('#' + prefix + 'district').val()
        );
        let zipcode = getZipcode($('#' + prefix + 'province').val(), $('#' + prefix + 'district').val());
        makeList(prefix + 'subdistrict', subDistrict);
        makeList(prefix + 'zipcode', zipcode);
        $('#' + prefix + 'district').prop('disabled', false);
        $('#' + prefix + 'subdistrict').prop('disabled', false);
        $('#' + prefix + 'zipcode').prop('disabled', false);
    });

    $('#' + prefix + 'district').change(function () {
        let subDistrict = getSubDistrict(
            $('#' + prefix + 'province').val(),
            $('#' + prefix + 'district').val()
        );
        let zipcode = getZipcode($('#' + prefix + 'province').val(), $('#' + prefix + 'district').val());
        makeList(prefix + 'zipcode', zipcode);
        makeList(prefix + 'subdistrict', subDistrict);
    });
}

$(document).ready(function () {
    setupAddress(''); // สำหรับทะเบียนบ้าน (ไม่มี prefix)
    setupAddress('current_'); // สำหรับที่อยู่ปัจจุบัน
});