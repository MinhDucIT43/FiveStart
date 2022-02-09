function kiemtrathemnhanvien(){
    var nhanvien=true;

    var tennhanvienValue = document.getElementById("tennhanvien").value;
    var namsinhValue = document.getElementById("namsinh").value;
    var matkhauValue = document.getElementById("matkhau").value;
    var diachiValue = document.getElementById("diachi").value;
    var sodienthoaiValue = document.getElementById("sodienthoai").value;
    var ngayvaolamValue = document.getElementById("ngayvaolam").value;

    var tennhanvien_Error = document.getElementById("tennhanvienError");
	var namsinh_Error = document.getElementById("namsinhError");
	var matkhau_Error = document.getElementById("matkhauError");
	var diachi_Error = document.getElementById("diachiError");
	var sodienthoai_Error = document.getElementById("sodienthoaiError");
	var ngayvaolam_Error = document.getElementById("ngayvaolamError");

    if(tennhanvienValue == "") {
        tennhanvien_Error.innerHTML = "Vui lòng nhập tên nhân viên!";
        tennhanvien_Error.style.fontSize = "12px";
        tennhanvien_Error.style.color = "red";
        nhanvien = false;
    }else {
        tennhanvien_Error.innerHTML = "";
        tennhanvien_Error.style.color = "";
        tennhanvien_Error.style.style = "";
    }

    if(namsinhValue == "") {
        namsinh_Error.innerHTML = "Vui lòng nhập năm sinh!";
        namsinh_Error.style.fontSize = "12px";
        namsinh_Error.style.color = "red";
        nhanvien = false;
    }else {
        namsinh_Error.innerHTML = "";
        namsinh_Error.style.color = "";
    }

    if(matkhauValue == "") {
        matkhau_Error.innerHTML = "Vui lòng nhập mật khẩu!";
        matkhau_Error.style.fontSize = "12px";
        matkhau_Error.style.color = "red";
        nhanvien = false;
    }else {
        matkhau_Error.innerHTML = "";
        matkhau_Error.style.color = "";
    }

    if(diachiValue == "") {
        diachi_Error.innerHTML = "Vui lòng nhập địa chỉ!";
        diachi_Error.style.fontSize = "12px";
        diachi_Error.style.color = "red";
        nhanvien = false;
    }else {
        diachi_Error.innerHTML = "";
        diachi_Error.style.color = "";
    }

    if(sodienthoaiValue == "") {
        sodienthoai_Error.innerHTML = "Vui lòng nhập số điện thoại!";
        sodienthoai_Error.style.fontSize = "12px";
        sodienthoai_Error.style.color = "red";
        nhanvien = false;
    }else {
        sodienthoai_Error.innerHTML = "";
        sodienthoai_Error.style.color = "";
    }

    if(ngayvaolamValue == "") {
        ngayvaolam_Error.innerHTML = "Vui lòng nhập ngày vào làm!";
        ngayvaolam_Error.style.fontSize = "12px";
        ngayvaolam_Error.style.color = "red";
        nhanvien = false;
    }else {
        ngayvaolam_Error.innerHTML = "";
        ngayvaolam_Error.style.color = "";
    }

    return nhanvien;
}

function kiemtrathemchucvu(){
    var chucvu = true;

    var tenchucvuValue = document.getElementById("tenchucvu").value;
    var tienluongValue = document.getElementById("tienluong").value;


    var tenchucvu_Error = document.getElementById("tenchucvuError");
	var tienluong_Error = document.getElementById("tienluongError");


    if(tenchucvuValue == "") {
        tenchucvu_Error.innerHTML = "Vui lòng nhập chức vụ!";
        tenchucvu_Error.style.fontSize = "12px";
        tenchucvu_Error.style.color = "red";
        chucvu = false;
    }else {
        tenchucvu_Error.innerHTML = "";
        tenchucvu_Error.style.color = "";
    }

    if(tienluongValue == "") {
        tienluong_Error.innerHTML = "Vui lòng nhập mức lương!";
        tienluong_Error.style.fontSize = "12px";
        tienluong_Error.style.color = "red";
        chucvu = false;
    }else {
        tienluong_Error.innerHTML = "";
        tienluong_Error.style.color = "";
    }
    return chucvu;
}

function kiemtrathemloaisanpham(){
    var loaisp=true;

    var tenloaisanphamValue = document.getElementById("tenloaisanpham").value;


    var tenloaisanpham_Error = document.getElementById("tenloaisanphamError");


    if(tenloaisanphamValue == "") {
        tenloaisanpham_Error.innerHTML = "Vui lòng nhập loại sản phẩm!";
        tenloaisanpham_Error.style.fontSize = "12px";
        tenloaisanpham_Error.style.color = "red";
        loaisp = false;
    }else {
        tenloaisanpham_Error.innerHTML = "";
        tenloaisanpham_Error.style.color = "";
    }

    return loaisp;
}

function kiemtrathemdonvitinh(){
    var dvt=true;

    var tendonvitinhValue = document.getElementById("tendonvitinh").value;


    var tendonvitinh_Error = document.getElementById("tendonvitinhError");


    if(tendonvitinhValue == "") {
        tendonvitinh_Error.innerHTML = "Vui lòng nhập đơn vị tính!";
        tendonvitinh_Error.style.fontSize = "12px";
        tendonvitinh_Error.style.color = "red";
        dvt = false;
    }else {
        tendonvitinh_Error.innerHTML = "";
        tendonvitinh_Error.style.color = "";
    }

    return dvt;
}

function kiemtrathemsanpham(){
    var sp=true;

    var tensanphamValue = document.getElementById("tensanpham").value;
    var gianhapValue = document.getElementById("gianhap").value;
    var sltonValue = document.getElementById("slton").value;


    var tensanpham_Error = document.getElementById("tensanphamError");
    var gianhap_Error = document.getElementById("gianhapError");
    var slton_Error = document.getElementById("sltonError");


    if(tensanphamValue == "") {
        tensanpham_Error.innerHTML = "Vui lòng nhập tên sản phẩm!";
        tensanpham_Error.style.fontSize = "12px";
        tensanpham_Error.style.color = "red";
        sp = false;
    }else {
        tensanpham_Error.innerHTML = "";
        tensanpham_Error.style.color = "";
    }

    if(gianhapValue == "") {
        gianhap_Error.innerHTML = "Vui lòng nhập giá nhập!";
        gianhap_Error.style.fontSize = "12px";
        gianhap_Error.style.color = "red";
        sp = false;
    }else {
        gianhap_Error.innerHTML = "";
        gianhap_Error.style.color = "";
    }

    if(sltonValue == "") {
        slton_Error.innerHTML = "Vui lòng nhập số lượng!";
        slton_Error.style.fontSize = "12px";
        slton_Error.style.color = "red";
        sp = false;
    }else {
        slton_Error.innerHTML = "";
        slton_Error.style.color = "";
    }

    return sp;
}

function kiemtrathemvebuffet(){
    var vebuffet=true;

    var tenvebuffetValue = document.getElementById("tenvebuffet").value;
    var giaveValue = document.getElementById("dongia").value;


    var tenvebuffet_Error = document.getElementById("tenvebuffetError");
    var dongia_Error = document.getElementById("dongiaError");


    if(tenvebuffetValue == "") {
        tenvebuffet_Error.innerHTML = "Vui lòng nhập tên vé buffet!";
        tenvebuffet_Error.style.fontSize = "12px";
        tenvebuffet_Error.style.color = "red";
        vebuffet = false;
    }else {
        tenvebuffet_Error.innerHTML = "";
        tenvebuffet_Error.style.color = "";
    }

    if(giaveValue == "") {
        dongia_Error.innerHTML = "Vui lòng nhập giá vé!";
        dongia_Error.style.fontSize = "12px";
        dongia_Error.style.color = "red";
        vebuffet = false;
    }else {
        dongia_Error.innerHTML = "";
        dongia_Error.style.color = "";
    }

    return vebuffet;
}

function kiemtrathemnhommon(){
    var nhommon=true;

    var tennhommonValue = document.getElementById("tennhommon").value;


    var tennhommon_Error = document.getElementById("tennhommonError");


    if(tennhommonValue == "") {
        tennhommon_Error.innerHTML = "Vui lòng nhập tên nhóm món!";
        tennhommon_Error.style.fontSize = "12px";
        tennhommon_Error.style.color = "red";
        nhommon = false;
    }else {
        tennhommon_Error.innerHTML = "";
        tennhommon_Error.style.color = "";
    }

    return nhommon;
}

function kiemtrathemmon(){
    var mon=true;

    var tenmonValue = document.getElementById("tenmon").value;
    var gianhapValue = document.getElementById("gianhap").value;
    var sltonValue = document.getElementById("slton").value;


    var tenmon_Error = document.getElementById("tenmonError");
    var gianhap_Error = document.getElementById("gianhapError");
    var slton_Error = document.getElementById("sltonError");


    if(tenmonValue == "") {
        tenmon_Error.innerHTML = "Vui lòng nhập tên món ăn!";
        tenmon_Error.style.fontSize = "12px";
        tenmon_Error.style.color = "red";
        mon = false;
    }else {
        tenmon_Error.innerHTML = "";
        tenmon_Error.style.color = "";
    }

    if(gianhapValue == "") {
        gianhap_Error.innerHTML = "Vui lòng nhập giá món ăn!";
        gianhap_Error.style.fontSize = "12px";
        gianhap_Error.style.color = "red";
        mon = false;
    }else {
        gianhap_Error.innerHTML = "";
        gianhap_Error.style.color = "";
    }

    if(sltonValue == "") {
        slton_Error.innerHTML = "Vui lòng nhập số lượng!";
        slton_Error.style.fontSize = "12px";
        slton_Error.style.color = "red";
        sp = false;
    }else {
        slton_Error.innerHTML = "";
        slton_Error.style.color = "";
    }

    return mon;
}