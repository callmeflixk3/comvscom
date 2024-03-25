function gotologout(event) {
    event.preventDefault();
    $.ajax({
        method: 'post',
        url: './api/logout.php',
        data: {
            fullname: localStorage.fullname
        },
        success: (response) => {
            console.log('good', response);
            if (response.RespCode == 200) {
                localStorage.clear();
                Swal.fire({
                    icon: 'success',
                    title: 'Logout Success',
                    timer: 1000
                }).then(() => {
                    window.location.href = './index.html';
                });
            }
            else {
                Swal.fire({
                    icon: 'error',
                    title: 'Something Went Wrong'
                });
            }
        },
        error: (err) => {
            console.log('bad', err);
        }
    });
}
