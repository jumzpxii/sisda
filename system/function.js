function swall_success(p1){
    swal({
        title: "สำเร็จ",
        text: p1,
        icon: "success",
        timer: 1000
    }).then(function() {
        window.location.reload();
    });
}