const daysTag = document.querySelector(".days");
const currentDate = document.querySelector(".current-date");
const prevNextIcon = document.querySelectorAll(".icons span");

let date = new Date();
let currYear = date.getFullYear();
let currMonth = date.getMonth();

const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

async function fetchScheduleData(year, month) {
    return new Promise((resolve, reject) => {
        $(document).ready(() => {
            $.ajax({
                url: "../backend/student/getSched.php",
                data: {
                    year: year,
                    month: month + 1
                },
                success: function(response){
                    resolve(response);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                    reject(error);
                }
            });
        });
    });
}

async function renderCalendar() {
    let firstDayofMonth = new Date(currYear, currMonth, 1).getDay();
    let lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate();
    let lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay();
    let lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate();
    let liTag = "";

    for (let i = firstDayofMonth; i > 0; i--) {
        liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
    }

    const data = JSON.parse(await fetchScheduleData(currYear, currMonth)); 
    
    const appointmentDates = [];

    data.forEach(appointment => {
        const aptDate = new Date(appointment.apt_date);
        const dateWithoutTime = new Date(aptDate.getFullYear(), aptDate.getMonth(), aptDate.getDate());
        appointmentDates.push(dateWithoutTime);
    });

    for (let i = 0; i < lastDateofMonth; i++) {
        const currentDate = new Date(currYear, currMonth, i + 1);

        const currentDateWithoutTime = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate());

        const isToday = appointmentDates.some(appointmentDate => appointmentDate.getTime() === currentDateWithoutTime.getTime()) ? "one-or-more-appointments" : "";
        liTag += `<li class="${isToday}">${i + 1}</li>`;
    }

    for (let i = lastDayofMonth; i < 6; i++) {
        liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`;
    }

    currentDate.innerText = `${months[currMonth]} ${currYear}`;
    daysTag.innerHTML = liTag;
}

prevNextIcon.forEach(icon => {
    icon.addEventListener("click", async () => {
        currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

        if (currMonth < 0 || currMonth > 11) {
            currYear += icon.id === "prev" ? -1 : 1; 
            currMonth = (currMonth + 12) % 12; 
        }

        await renderCalendar(); 
    });
});

renderCalendar();
