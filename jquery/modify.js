$(document).ready(function(){
    $('.updateResBtn').on('click', function(){
        const apt_id = $(this).val();
        if(apt_id){
            $.ajax({
                url: "../backend/admin/accept.php",
                method: "post",
                data:{
                    apt_id
                },
                success: function(response){
                    if(response ===  'success'){
                        Swal.fire({
                            icon: false,
                            title: "Status Updated",
                            text: "",
                            showConfirmButton: true,
                        }).then((result)=>{
                            if(result.isConfirmed){
                                window.location.reload();
                            }
                        })
                    }else{
                        alert("Updating error!");
                    }
                },
                error: function(){
                    alert("Connection Error!");
                }
            })
        }
    })

    $('.cancelBtn').on('click', function(){
        const apt_id = $(this).attr('id');

        Swal.fire({
            icon: 'warning',
            title: "Are you sure?",
            text: "This appointment won't revert.",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, cancel it!"
        }).then((result)=>{
            if(result.isConfirmed){
                $.ajax({
                    url: "../backend/admin/decline.php",
                    method: "post",
                    data:{
                        apt_id
                    },
                    success: function(response){
                        if(response ===  'success'){
                            Swal.fire({
                                icon: false,
                                title: "Status Updated",
                                text: "",
                                showConfirmButton: true,
                            }).then((result)=>{
                                if(result.isConfirmed){
                                    window.location.reload();
                                }
                            })
                        }else{
                            alert("Updating error!");
                        }
                    },
                    error: function(){
                        alert("Connection Error!");
                    }
                })
            }
        })
    })
})