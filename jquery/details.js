$(document).ready(() => {
    $('#submit').on('click', function(e) {
        e.preventDefault();
        // Retrieve input values
        const fname = $('#fname').val();
        const mname = $('#mname').val();
        const lname = $('#lname').val();
        const program = $('#program').val();
        const yearlvl = $('#yearlvl').val();
        const pEmail = $('#pEmail').val();
        const sEmail = $('#sEmail').val();
        const contact = $('#contact').val();
        const concern = $('#concern').val();

        if(fname && lname && program && yearlvl && pEmail
            && sEmail && contact && concern){
                $.ajax({
                    url: '../backend/student/schedule.php', 
                    method: 'POST',
                    data: {
                        fname: fname,
                        mname: mname,
                        lname: lname,
                        program: program,
                        yearlvl: yearlvl,
                        pEmail: pEmail,
                        sEmail: sEmail,
                        contact: contact,
                        concern: concern
                    },
                    success: function(response) {
                        if(response === "success"){
                            window.location.href = "./print.php";
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        alert('Error occurred while submitting form. Please try again later.');
                    }
                });
            }else{
                Swal.fire({
                    icon: "warning",
                    title: "Empty Field!",
                    text: "Make sure all fields are filled.",
                    showConfirmButton: false,
                    timer: 1500
                });
            }
    });
});
