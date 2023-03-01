<?php require_once("app/Layouts/header.php"); ?>

<main>
    <div class="container outer-shell">
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
        <div class="calendar-events">
            <div class="today-date">
                <div class="event-day"></div>
                <div class="event-date"></div>
            </div>
            <div class="events">
            <!-- add events via JavaScript -->
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
                        <input type="text" class="event-time-from" placeholder="Event Time From" />
                    </div>
                    <div class="add-event-input">
                        <input type="text" class="event-time-to" placeholder="Event Time To" />
                    </div>
                </div>
                <div class="add-event-footer">
                    <button class="add-event-btn">Add Event</button>
                </div>
            </div>
        </div>
        <button class="add-event">
            <i class="fas fa-plus"></i>
        </button>
    </div>
</main>

<?php require_once("app/Layouts/footer.php"); ?>