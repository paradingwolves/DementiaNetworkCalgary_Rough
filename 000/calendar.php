<?php require_once("app/Layouts/header.php"); ?>

<main>
    <div class="container outer-shell">
        <div class="row">
            <div class="col-md-9"></div>
            <div class="col-md-2 add-new-event-wrapper">
                <button class="add-event">
                    Add New Event
                </button>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="add-event-wrapper">
            <div class="add-event-header">
                <div class="title">Add Event</div>
                <i class="fas fa-times close"></i>
            </div>
            <div class="add-event-body">
                <div class="add-event-input">
                    <input type="text" class="event-name" placeholder="Event Name" />
                </div>
                <div class="add-event-input">
                    <div class="time-inputs">
                        <input type="text" class="event-time-from" placeholder="Event Time From" />
                        <input type="text" class="event-time-to" placeholder="Event Time To" />
                    </div>
                </div>
                <div class="add-event-input">
                    <input type="text" class="addEvent-address" placeholder="Event address" />
                </div>
                <div class="add-event-input">
                    <select class="addEvent-type" placeholder="Choose Event Type">

                    </select>
                </div>
                <div class="add-event-input">
                    <input type="text" class="addEvent-desc" placeholder="Description..." />
                </div>
            </div>
            <div class="add-event-footer">
                <button class="add-event-btn">Add Event</button>
            </div>
        </div>
        <div class="calendar-container">
            <div class="calendar">
                <div class="month">
                    <i class="fa fa-angle-left prev"></i>
                    <div class="date"></div>
                    <i class="fa fa-angle-right next"></i>
                </div>
                <div class="weekdays">
                    <div>Sun</div>
                    <div>Mon</div>
                    <div>Tue</div>
                    <div>Wed</div>
                    <div>Thu</div>
                    <div>Fri</div>
                    <div>Sat</div>
                </div>
                <div class="days">
                <!-- Adding Days via JS -->
                </div>
                <div class="goto-today">
                    <div class="goto">
                        <input type="text" name="date-input" placeholder="mm/yyyy" class="date-input">
                        <button class="goto-btn">Go</button>
                    </div>
                    <button class="today-btn">Today</button>
                </div>
            </div>
        </div>
        <!-- this is hidden because if I get rid of it, the whole thing breaks -->
        <div class="calendar-events" style="display: none">
            <div class="today-date">
                <div class="event-day"></div>
                <div class="event-date"></div>
            </div>
            <div class="events">
            <!-- add events via JavaScript -->
            </div>
        </div>
    </div>
</main>

<?php require_once("app/Layouts/footer.php"); ?>

<!--
-->
