<?= $this->Form->create() ?>
<?= $this->Form->end() ?>

<?= $this->element('Appointment/context-menu') ?>
<?= $this->element('Appointment/form-modal') ?>

<h1>Agendamentos</h1>

<div class="controls">
    <label for="calendar-view">Visualizar por:</label>
    <select id="calendar-view" name="calendar-view">
        <option value="day">Hoje</option>
        <option value="week">Semana</option>
        <option value="month" selected>Mês</option>
    </select>
    <button id="prev-btn" onclick="rearrangeCalendar(-1)">&lt; Anterior</button>
    <button id="next-btn" onclick="rearrangeCalendar(1)">Próximo &gt;</button>
</div>

<?= $this->element('Appointment/day-calendar') ?>
<?= $this->element('Appointment/week-calendar') ?>
<?= $this->element('Appointment/month-calendar') ?>

<script>
    const mainDate = new Date();
    const startDate = new Date();
    const endDate = new Date();

    const calendarViewSelect = document.getElementById('calendar-view');
    const dayView = document.getElementById('day-view');
    const weekView = document.getElementById('week-view');
    const monthView = document.getElementById('month-view');

    calendarViewSelect.addEventListener('change', () => {
        const selectedView = calendarViewSelect.value;

        dayView.style.display = selectedView === 'day' ? 'block' : 'none';
        weekView.style.display = selectedView === 'week' ? 'block' : 'none';
        monthView.style.display = selectedView === 'month' ? 'block' : 'none';

        if (selectedView === 'week') {
            startDate.setDate(getFirstDayWeek(mainDate));
            endDate.setDate(getLastDayWeek(mainDate));
        }

        if (selectedView === 'month') {
            startDate.setDate(getFirstDayMonth(mainDate));
            endDate.setDate(getLastDayMonth(mainDate));
        }
    });

    function rearrangeCalendar(diff) {
        if (calendarViewSelect.value === 'day') {
            mainDate.setDate(mainDate.getDate() + diff);
        }

        if (calendarViewSelect.value === 'week') {
            startDate.setDate(startDate.getDate() + (7 * diff));
            endDate.setDate(endDate.getDate() + (7 * diff));
        }

        if (calendarViewSelect.value === 'month') {
            startDate.setDate(1);
            startDate.setMonth(startDate.getMonth() + diff);

            endDate.setMonth(startDate.getMonth());
            endDate.setYear(startDate.getFullYear());
            endDate.setDate(new Date(getLastDayMonth(startDate)).getDate());

            mainDate.setMonth(mainDate.getMonth() + diff);

            createRowList(mountRowList());
        }
    }

    function getAppointmentsByPeriod(startDate, endDate) {
        post('/appointments/get-by-period', {
            startDate: startDate.toISOString().slice(0, 10),
            endDate: endDate.toISOString().slice(0, 10),
        });
    }

    $(document).ready(() => {
        createRowList(mountRowList())
        getAppointmentsByPeriod(startDate, endDate)
    })
</script>

<script>
    // funções

    function getFirstDayMonth(date = new Date()) {
        let currentDate = date instanceof Date ? date : new Date();
        currentDate.setDate(1);

        return currentDate.toISOString().slice(0, 10);
    }

    function getLastDayMonth(date = new Date()) {
        let currentDate = date instanceof Date ? date : new Date();
        let year = currentDate.getFullYear();
        let month = currentDate.getMonth();
        let nextMonth = new Date(year, month + 1, 1);
        let lastDay = new Date(nextMonth - 1);

        return lastDay.toISOString().slice(0, 10);
    }

    function getFirstDayWeek(date = new Date()) {
        let currentDate = date instanceof Date ? date : new Date();
        let currentDayOfWeek = currentDate.getDay();
        let diff = currentDate.getDate() - currentDayOfWeek;
        currentDate.setDate(diff);

        return currentDate.toISOString().slice(0, 10);
    }

    function getLastDayWeek(date = new Date()) {
        let currentDate = date instanceof Date ? date : new Date();
        let currentDayOfWeek = currentDate.getDay();
        let diff = 6 - currentDayOfWeek;
        currentDate.setDate(currentDate.getDate() + diff);

        return currentDate.toISOString().slice(0, 10);
    }

    function getDayOfWeek(date = new Date()) {
        let currentDate = date instanceof Date ? date : new Date();

        return currentDate.getDay();
    }

    function getDaysInMonth(date = new Date()) {
        let currentDate = date instanceof Date ? date : new Date();
        let year = currentDate.getFullYear();
        let month = currentDate.getMonth() + 1;

        return new Date(year, month, 0).getDate();
    }

    

    function get(url, data, success = null, error = null) {
        success = success ?? ((res) => {
            console.log("Default SUCCESS Message", res);
        })

        error = error ?? ((jqXHR, textStatus, errorThrown) => {
            console.error("Default ERROR Message:", textStatus, errorThrown);
        })

        loader(true);
        $.ajax({
            url: url,
            type: 'GET',
            success: success,
            error: error,
            
        }).always(() => loader());
    }

    function post(url, data, success = null, error = null) {
        success = success ?? ((res) => {
            console.log("Default SUCCESS Message", res);
        })

        error = error ?? ((jqXHR, textStatus, errorThrown) => {
            console.error("Default ERROR Message:", textStatus, errorThrown);
        })

        loader(true);
        $.ajax({
            url: url,
            type: 'POST',
            headers: {
                'X-CSRF-Token': $('[name="_csrfToken"]').val(),
            },
            data: data,
            success: success,
            error: error,
            
        }).always(() => loader());
    }    
</script>