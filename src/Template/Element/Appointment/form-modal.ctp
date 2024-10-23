<style>
    .context-form {
        padding: 10px;
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        width: 800px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .input-medium {
        width: 120px !important;
    }
</style>

<div class="context-form" id="contextForm">
    <div style="display:none;">
        <input type="hidden" name="_method" value="POST">
        <input type="hidden" name="_csrfToken" autocomplete="off" value="cc77ff750691ae06b750e3a6b9ce43cb310c6d6904f17b3b4883c9e2c4a520014df5cf8d154003df0f317ed6dc4b7265e896a2690bd558267dcaab3d1dc3ad49">
    </div>
    <div class="mb-3">
        <div class="input text">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name">
        </div>
    </div>
    <div class="mb-3">
        <div class="input select">
            <label for="appointment-type-id">Appointment Type</label>
            <select name="appointment_type_id" class="form-control" id="appointment-type-id">
                
            </select>
        </div>
    </div>
    <div class="mb-3">
        <div class="input date required">
            <label>Date</label>
            <select name="date[year]" required="required" class="input-medium">
                <option value="2029">2029</option>
                <option value="2028">2028</option>
                <option value="2027">2027</option>
                <option value="2026">2026</option>
                <option value="2025">2025</option>
                <option value="2024" selected="selected">2024</option>
                <option value="2023">2023</option>
                <option value="2022">2022</option>
                <option value="2021">2021</option>
                <option value="2020">2020</option>
                <option value="2019">2019</option>
            </select>
            <select name="date[month]" required="required" class="input-medium">
                <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10" selected="selected">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
            <select name="date[day]" required="required" class="input-medium">
                <option value="01">1</option>
                <option value="02">2</option>
                <option value="03">3</option>
                <option value="04">4</option>
                <option value="05">5</option>
                <option value="06">6</option>
                <option value="07">7</option>
                <option value="08">8</option>
                <option value="09">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22" selected="selected">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
            </select>
        </div>
    </div>
    <div class="mb-3">
        <div class="input time required"><label>Start Time</label><select name="start_time[hour]" required="required">
                <option value="00">0</option>
                <option value="01">1</option>
                <option value="02">2</option>
                <option value="03">3</option>
                <option value="04">4</option>
                <option value="05">5</option>
                <option value="06">6</option>
                <option value="07">7</option>
                <option value="08">8</option>
                <option value="09">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18" selected="selected">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
            </select><select name="start_time[minute]" required="required">
                <option value="00" selected="selected">00</option>
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
                <option value="32">32</option>
                <option value="33">33</option>
                <option value="34">34</option>
                <option value="35">35</option>
                <option value="36">36</option>
                <option value="37">37</option>
                <option value="38">38</option>
                <option value="39">39</option>
                <option value="40">40</option>
                <option value="41">41</option>
                <option value="42">42</option>
                <option value="43">43</option>
                <option value="44">44</option>
                <option value="45">45</option>
                <option value="46">46</option>
                <option value="47">47</option>
                <option value="48">48</option>
                <option value="49">49</option>
                <option value="50">50</option>
                <option value="51">51</option>
                <option value="52">52</option>
                <option value="53">53</option>
                <option value="54">54</option>
                <option value="55">55</option>
                <option value="56">56</option>
                <option value="57">57</option>
                <option value="58">58</option>
                <option value="59">59</option>
            </select></div>
    </div>
    <div class="mb-3">
        <div class="input text required"><label for="duration">Duration</label><input type="text" name="duration" class="form-control" required="required" id="duration"></div>
    </div>
    <a href="#" onclick="closeAppointment()">Fechar</a> | <button class="btn btn-primary" type="submit">Salvar</button>
</div>

<div class="context-form" id="contextForm">
    <h1>Novo Agendamento</h1>
    <?= $this->Form->create($appointment, ['url' => ['action' => 'add']]) ?>
    <div class="mb-3">
        <?= $this->Form->control('name', ['class' => 'form-control']) ?>
    </div>
    <div class="mb-3">
        <?= $this->Form->control('appointment_type_id', ['class' => 'form-control', 'options' => $appointmentTypes]) ?>
    </div>
    <div class="mb-3">
        <?= $this->Form->control('date', ['class' => 'form-control input-medium']) ?>
    </div>
    <div class="mb-3">
        <?= $this->Form->control('start_time', ['class' => 'form-control']) ?>
    </div>
    <div class="mb-3">
        <?= $this->Form->control('duration', ['class' => 'form-control', 'options' => $durations]) ?>
    </div>
    <a href="#" onclick="closeAppointment()">Fechar</a> | <?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
<script>
    function createAppointment() {
        const contextMenu = document.getElementById("contextMenu");
        $(contextMenu).hide();
        const contextForm = document.querySelector('#contextForm');
        contextMenu.style.left = ((window.innerWidth - 800) / 2) + "px";
        $(contextForm).fadeIn();
    }

    function closeAppointment() {
        const contextForm = document.querySelector('#contextForm');
        $(contextForm).fadeOut();
    }
</script>