$(document).ready(() => {
    let selectedTime = '';
    $('input[name="time"]').change(function() {
        selectedTime = $('input[name="time"]:checked').val();
        console.log("Selected time:", selectedTime); 
    });

    $('.next').on('click', function() {
        const current_date = $(this).closest('.con').find('.current-date').text();
        const selectedDate = $(this).closest('.con').find('.active-date').text();
        const dateString = current_date + " " + selectedDate;
        
        const parts = dateString.split(" ");
        const monthName = parts[0];
        const year = parseInt(parts[1]);
        const day = selectedDate;

        // Map month names to month indexes
        const monthIndexMap = {
            "January": 0,
            "February": 1,
            "March": 2,
            "April": 3,
            "May": 4,
            "June": 5,
            "July": 6,
            "August": 7,
            "September": 8,
            "October": 9,
            "November": 10,
            "December": 11
        };

        // Get the month index from the month name
        const monthIndex = monthIndexMap[monthName];

        // Create a Date object for the selected date
        const selectedDateObj = new Date(year, monthIndex, day);

        // Create a Date object for the current date
        const currentDateObj = new Date();

        // Check if the selected date is greater than or equal to the current date
        if (selectedDate && selectedTime) {
            if(selectedDateObj < currentDateObj){
                // Show a warning message if the selection is invalid
                Swal.fire({
                    icon: "warning",
                    title: "Invalid date!",
                    text: "The appointment date must be after today.",
                    showConfirmButton: false,
                    timer: 1500
                });
            }else{
                const year = selectedDateObj.getFullYear();
                const month = String(selectedDateObj.getMonth() + 1).padStart(2, '0'); // Months are zero-based
                const day = String(selectedDateObj.getDate()).padStart(2, '0');

                // Format the date as "YYYY-MM-DD"
                const formattedDate = `${year}-${month}-${day}`;
                $.ajax({
                    url: "../backend/student/checkSched.php",
                    method: "POST",
                    data:{
                        formattedDate,
                        selectedTime
                    },
                    success: function(response){
                        if(response === "success" ){
                            window.location.href = "./details.php";
                        }else if(response === "invalid"){
                            Swal.fire({
                                icon: "warning",
                                title: "Fully Booked",
                                text: "The selected date is already full.",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    }
                })
            }
        } else {
            // Show a warning message if the selection is invalid
            Swal.fire({
                icon: "warning",
                title: "Invalid Selection!",
                text: "Please select a valid date/time for the appointment.",
                showConfirmButton: false,
                timer: 1500
            });
        }
    });
});
