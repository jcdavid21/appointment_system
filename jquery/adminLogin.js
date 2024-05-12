$(document).ready(()=>{
    $('.button').on('click', function(e){
        e.preventDefault();
        const username = $('#adminUsername').val();
        const password = $('#adminPassword').val();

        if(username && password){
            $.ajax({
                url: "../backend/admin/login.php",
                method: 'POST',
                data:{
                    username,
                    password
                },
                success: function(response){
                    if(response === 'success'){
                        window.location.href = "../admin/dashboard.php";
                    }else{
                        Swal.fire({
                            icon: "warning",
                            title: "Invalid!",
                            text: "Invalid username/password.",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                }
            })
        }else{
            Swal.fire({
                icon: "warning",
                title: "Empty Field!",
                text: "Make sure all fields are filled.",
                showConfirmButton: false,
                timer: 1500
            });
        }
    })
})