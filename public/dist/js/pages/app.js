const blockurl = (value) => {
    toastr.error('Anda tidak bisa akses halaman ' + value);
}
const alerttoast = (alert) => {
    toastr.success(alert)
}
const logout = (url) => {
    Swal.fire({
        title: 'Apakah anda ingin logout?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Ya Logout',
        denyButtonText: `Tidak`,
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url
        }
    })
}