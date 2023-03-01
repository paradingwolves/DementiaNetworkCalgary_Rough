const calendar = document.querySelector(".calendar");
const date = document.querySelector(".date");
const daysContainer = document.querySelector(".days");
const prev = document.querySelector(".prev");
const next = document.querySelector(".next");
const todayBtn = document.querySelector(".today-btn");
const gotoBtn = document.querySelector(".goto-btn");
const dateInput = document.querySelector(".date-input");
const eventDay = document.querySelector(".event-day");
const eventDate = document.querySelector(".event-date");
const eventsContainer = document.querySelector(".events");
const addEventSubmit = document.querySelector(".add-event-btn");

let today = new Date();
let activeDay;
let month = today.getMonth();
let year = today.getFullYear();
const months = [
  "January",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "November",
  "December",
];

/* let eventsArr = []; */
const eventsArr = [
  {
    day: 10, month: 3, year: 2023, events: [
      {
        name: 'Event 1',
        time: '10:00',
        address: '456 Park Avenue, Anytown, USA',
        type: 'conversation',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        mapURL: 'https://www.google.com/maps?q=456+Park+Avenue'
      },
      {
        name: 'Event 2',
        time: '14:00',
        address: '789 Elm Street, Anytown, USA',
        type: 'serenity',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        mapURL: 'https://www.google.com/maps?q=789+Elm+Street'
      },
    ]
  }
];

// Loop through the events array and validate the event types.
// Event types are to be chosen via dropdown to ensure no hinkie business occurs
const validEventTypes = ['conversation cafe online', 'conversation cafe in person', 'educational webinars', 'community gatherings'];
eventsArr.forEach(eventDay => {
  eventDay.events.forEach(eventObj => {
    if (!validEventTypes.includes(eventObj.type.toLowerCase())) {
      console.error(`Invalid event type "${eventObj.type}" found for event "${eventObj.name}" on ${eventDay.year}-${eventDay.month}-${eventDay.day}.`);
    }
  });
});


getEvents();

// function to add days
function initCalendar() {
  const firstDay = new Date(year, month, 1);
  const lastDay = new Date(year, month + 1, 0);
  const prevLastDay = new Date(year, month, 0);
  const prevDays = prevLastDay.getDate();
  const lastDate = lastDay.getDate();
  const day = firstDay.getDay();
  const nextDays = 7 - ((lastDate - (7 - day)) % 7 || 7);

  // update date
  date.innerHTML = months[month] + " " + year;

  // adding days
  let days = "";

  // prev month days
  for (let x = day; x > 0; x--) {
    days += `<div class="day prev-date">${prevDays - x + 1}</div>`;
  }

  // current month days
  for (let i = 1; i <= lastDate; i++) {

    // check if event is present on current day
    let event = false;
    eventsArr.forEach((eventObj) => {
      if(
          eventObj.day === i &&
          eventObj.month === month + 1 &&
          eventObj.year === year
      ) {
        //if event found
        event = true;
      }
    });

    // if day is today add class today
    if (
        i === new Date().getDate() &&
        year === new Date().getFullYear() &&
        month === new Date().getMonth()
    ) {

      activeDay = i;
      getActiveDay(i);
      updateEvents(i);

      if(event){
        days += `<div class="day today active event">${i}</div>`;
      } else{
        days += `<div class="day active today">${i}</div>`;
      }
    } else {
      // add remaining as it is
      if(event){
        days += `<div class="day event">${i}</div>`;
      } else{
        days += `<div class="day">${i}</div>`;
      }
    }
  }

  // next month days
  for (let j = 1; j <= nextDays; j++) {
    days += `<div class="day next-date">${j}</div>`;
  }

  daysContainer.innerHTML = days;

  // add listener after calendar initalized
  addListener();
}

initCalendar();

// prev month
function prevMonth() {
  /* month --; */
  if(month < 0){
    month = 11;
    year--;
  }
  initCalendar();
}

// next month
function nextMonth() {
  if(month > 11){
    month = 00;
    year++;
  }
  initCalendar();
}
prev.addEventListener('click', function (){
  if(month > 0 ){
    getActiveDay(month--);
    prevMonth();
  } else if(month === 0) {

    getActiveDay(year--,month++, month++, month++, month++, month++, month++, month++, month++, month++, month++, month++);
    prevMonth();
  }
});
next.addEventListener('click', function (){
  if(month < 12 ){
    getActiveDay(month++);
    nextMonth();
  }
  let day;
  if (month === 0) {
    getActiveDay(day = 00);
    console.log(month);
    nextMonth();
  }
});

// go to today function

todayBtn.addEventListener("click", () => {
  today = new Date();
  month = today.getMonth();
  year = today.getFullYear();
  initCalendar();
});

// go to date function

dateInput.addEventListener("keyup", (e) => {
  //allow only nuumbers
  dateInput.value = dateInput.value.replace(/[^0-9/]/g, "");
  if(dateInput.value.length === 2) {
    // add slash if two numbers are entered
    dateInput.value += "/";
  }
  if(dateInput.value.length > 7){
    // don't allow more than 7 characters
    dateInput.value = dateInput.value.slice(0, 7);
  }

  if(e.inputType === "deleteContentBackward"){
    if(dateInput.value.length === 3) {
      dateInput.value = dateInput.value.slice(0, 2);
    }
  }
});

gotoBtn.addEventListener("click", gotoDate);

// function to go to entered date

function gotoDate(){
  const dateArr = dateInput.value.split("/");
  console.log(dateArr);
  // some date validation
  let day;
  if (dateArr.length === 2) {
    if (dateArr[0] > 0 && dateArr[0] < 13 && dateArr[1].length === 4) {
      month = dateArr[0] - 1;
      year = dateArr[1];
      getActiveDay(day = 00);
      initCalendar();
    }
  }
  /*  alert("invalid date"); */
}

const addEventBtn = document.querySelector(".add-event");
const addEventContainer = document.querySelector(".add-event-wrapper");
const addEventCloseBtn = document.querySelector(".close");
const addeventName = document.querySelector(".event-name");
const addEventFrom = document.querySelector(".event-time-from");
const addEventTo = document.querySelector(".event-time-to");


addEventBtn.addEventListener("click", () => {
  addEventContainer.classList.toggle("active");
});

addEventCloseBtn.addEventListener("click", () => {
  addEventContainer.classList.remove("active");
});

document.addEventListener("click", (e) => {
  //if click outside
  if(e.target !== addEventBtn && !addEventContainer.contains(e.target)) {
    addEventContainer.classList.remove("active");
  }
});

// allow only 50 chars in title
addeventName.addEventListener("input", () => {
  addeventName.value = addeventName.value.slice(0, 50);
});


// time format in from and to time
addEventFrom.addEventListener("input", () => {
  addEventFrom.value = addEventFrom.value.replace(/[^0-9:]/g, "");
  //if two numbers added and last char is not :, add :
  if(addEventFrom.value.length === 2 && addEventFrom.value.slice(-1) !== ":") {
    addEventFrom.value += ":";
  }
  // dont let user enter more than 5 chars
  if(addEventFrom.value.length > 5) {
    addEventFrom.value = addEventFrom.value.slice(0, 5);
  }
});

addEventTo.addEventListener("input", () => {
  addEventTo.value = addEventTo.value.replace(/[^0-9:]/g, "");
  //if two numbers added and last char is not :, add :
  if(addEventTo.value.length === 2 && addEventTo.value.slice(-1) !== ":") {
    addEventTo.value += ":";
  }
  // dont let user enter more than 5 chars
  if(addEventTo.value.length > 5) {
    addEventTo.value = addEventTo.value.slice(0, 5);
  }
});

function addListener()  {
  const days = document.querySelectorAll(".day");
  days.forEach((day) => {
    day.addEventListener("click", (e) => {
      //set current day as active day
      activeDay = Number(e.target.innerHTML);
      //remove active from already active day
      getActiveDay(e.target.innerHTML);
      updateEvents(Number(e.target.innerHTML));

      days.forEach((day) => {
        day.classList.remove("active");
      });

      //if prev month day clicked go to prev month and add active
      if(e.target.classList.contains("prev-date")) {
        if(month > 0 ) {
          getActiveDay(month--);
          prevMonth();
        } else if(month === 0) {

          getActiveDay(year--,month++, month++, month++, month++, month++, month++, month++, month++, month++, month++, month++);
          prevMonth();
        }
        getActiveDay(e.target.innerHTML);

        prevMonth();

        setTimeout(() => {
          const days = document.querySelectorAll(".day");
          //after going to prev-month add active to clicked
          days.forEach((day) => {
            if (day.classList.contains("today")) {
              getActiveDay(e.target.innerHTML);
              day.classList.remove("active");
            }
            if(
                !day.classList.contains("prev-date") &&
                day.innerHTML === e.target.innerHTML
            ) {

              day.classList.add("active");
            }
          });
        }, 100);
      } else if(e.target.classList.contains("next-date")){
        if(month < 12 ){
          getActiveDay(month++);
          nextMonth();
        } else if(month === 0) {

          getActiveDay(year--,month++, month++, month++, month++, month++, month++, month++, month++, month++, month++, month++);
          prevMonth();
        }
        getActiveDay(e.target.innerHTML);
        nextMonth();

        setTimeout(() => {
          const days = document.querySelectorAll(".day");
          //after going to next-month add active to clicked
          days.forEach((day) => {
            if (day.classList.contains("today")) {
              getActiveDay(e.target.innerHTML);
              day.classList.remove("active");
            }
            if(
                !day.classList.contains("next-date") &&
                day.innerHTML === e.target.innerHTML
            ) {

              day.classList.add("active");
            }
          });
        }, 100)
      } else {
        e.target.classList.add("active");
      }
    });
  });
}


function getActiveDay(date) {
  const day = new Date(year, month, date);
  eventDay.innerHTML = day.toString().split(" ")[0];
  eventDate.innerHTML = date + " " + months[month] + " " + year;
}

function updateEvents(date) {
  let events = "";
  eventsArr.forEach((event) => {
    if (
        date === event.day &&
        month + 1 === event.month &&
        year === event.year
    ) {
      event.events.forEach((event) => {
        events += `
        <div class="event">
          <div class="title">
            <i class="fas fa-circle"></i>
            <h3 class="event-title">${event.name}</h3>
          </div>
          <div class="event-time">
            <span class="event-time">${event.time}</span>
          </div>
        </div>
        `;
      });
    }
  });
  //if nothing found
  if(!events){
    events = `<div class="no-event">
                <h3>No Events</h3>
              </div>
              `;
  }
  eventsContainer.innerHTML = events;
  // save events when new one added
  saveEvents();
}

// function to add events
addEventSubmit.addEventListener("click", () => {
  const eventName = addeventName.value;
  const eventTimeFrom = addEventFrom.value;
  const eventTimeTo = addEventTo.value;
  console.log(eventName);
  console.log(eventTimeFrom, eventTimeTo);
  // some validations

  const timeFromArr = eventTimeFrom.split(":");
  const timeToArr = eventTimeTo.split(":");


  if(eventName === "" || eventTimeFrom === "" || eventTimeTo=== "") {
    alert("Please Fill Out All Fields");

  }
  else{
    if(timeFromArr.length !== 2 || timeToArr.length !== 2 || timeFromArr[0] > 23 || timeFromArr[1] > 59 || timeToArr[0] > 23 || timeToArr[1] > 59 ) {
      alert("Invalid Time Format");
    }

  }

  const timeFrom = convertTime(eventTimeFrom);
  const timeTo = convertTime(eventTimeTo);

  const newEvent = {
    name: eventName,
    time: timeFrom + " - " + timeTo,
  };
  let eventAdded = false;

  if(eventsArr.length > 0) {
    // check if current day has an event already then add to that
    eventsArr.forEach((item) => {
      if(item.day === activeDay && item.month === month + 1 && item.year === year) {
        item.events.push(newEvent);
        eventAdded = true;
      }
    });
  }

  // if event array empty or current day has no event create new
  if(!eventAdded) {
    eventsArr.push({
      day:activeDay,
      month: month + 1,
      year: year,
      events:[newEvent],
    });
  }

  // remove active from add event form
  addEventContainer.classList.remove("active");
  // reset the form
  addeventName.value = "";
  addEventFrom.value = "";
  addEventTo.value = "";

  updateEvents(activeDay);

  // add event class to that day
  const activeDayElem = document.querySelector(".day.active");
  if(!activeDayElem.classList.contains("event")) {
    activeDayElem.classList.add("event");
  }
});

function convertTime(time) {
  let timeArr = time.split(":");
  let timeHour = timeArr[0];
  let timeMin = timeArr[1];
  let timeFormat = timeHour >= 12 ? "PM" : "AM";
  timeHour = timeHour % 12 || 12;
  time = timeHour + ":" + timeMin + " " + timeFormat;
  return time;
}

// function to remove events on click
eventsContainer.addEventListener("click", (e) => {
  if (e.target.classList.contains("event")) {
    const eventName = e.target.children[0].children[1].innerHTML;
    // get the title of event then search in array by title and dete
    eventsArr.forEach((event) => {
      if(event.day === activeDay && event.month === month + 1 && event.year === year ) {
        event.events.forEach((item, index) => {
          if(item.name === eventName) {
            event.events.splice(index, 1);
          }
        });

        // if no remaining on that day remove complete day
        if(event.events.length === 0 ) {
          eventsArr.splice(eventsArr.indexOf(event), 1);
          // remove active class from current day

          const activeDayElem = document.querySelector(".day.active");
          if(activeDayElem.classList.contains("events")) {
            activeDayElem.classList.remove("event");
          }
        }
      }
    });
    //after removing form array update event
    updateEvents(activeDay);
  }
})

// save events in local storage

function saveEvents() {
  localStorage.setItem("events", JSON.stringify(eventsArr));
}
function getEvents () {
  if(localStorage.getItem("events" === null)) {
    eventsArr.push( ...JSON.parse(localStorage.getItem("events")));
  }
}