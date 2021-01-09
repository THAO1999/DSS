// hien thi thong tin khach hang theo id_kh
function studentRegister(request_id, student_id) {

    // goi ajax
    $.ajax({
        url: 'detail-request-enterprise/student-register',
        type: 'post',
        data: { studentID: student_id, requestID: request_id, _csrf: yii.getCsrfToken() },
        dataType: 'json',
        success: function(result) {
            if (result == 1)

                swal("Chúc Mừng!", "Bạn đã đăng ki thành công!", "success");

            else

                swal("Good job!", "Thất Bai!", "Fail");

        },
    });
}