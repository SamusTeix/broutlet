<style>
    .month-table-cell {
        cursor: pointer;
    }
</style>

<div id="month-view">
    <h1 id="table-month-date"></h1>
    <table id="month-table" class="calendar month-table" data-start="" data-end="">
        <thead>
            <tr>
                <th>Domingo</th>
                <th>Segunda</th>
                <th>Terça</th>
                <th>Quarta</th>
                <th>Quinta</th>
                <th>Sexta</th>
                <th>Sábado</th>
            </tr>
        </thead>
        <tbody id="month-table-tbody"></tbody>
    </table>
</div>

<script>
    const tableMonthDate = document.querySelector('#table-month-date');

    function emptyRow() {
        return {
            0: null,
            1: null,
            2: null,
            3: null,
            4: null,
            5: null,
            6: null
        };
    }

    function mountRowList() {
        const rowList = [];
        let row = emptyRow();

        for (let i = 1, j = getDayOfWeek(mainDate); i <= getDaysInMonth(mainDate); i++, j++) {
            row[j] = i;
            if (j === 6 || i === getDaysInMonth(mainDate)) {
                rowList.push(row);

                j = -1;
                row = emptyRow();
            }
        }

        return rowList;
    }

    function createRowList(rowList) {
        // Cria o corpo da tabela
        let corpoTabela = document.querySelector('#month-table-tbody');
        $(corpoTabela).empty();
        rowList.forEach(objeto => {
            let linha = corpoTabela.insertRow();
            Object.keys(rowList[0]).forEach(chave => {
                let celula = linha.insertCell();
                celula.textContent = objeto[chave];
                celula.classList = 'month-table-cell'
                celula.addEventListener('click', showOptions, false)
            });
        });

        tableMonthDate.innerText = (mainDate.getMonth() + 1).toString().padStart(2, '0') + '/' + mainDate.getFullYear();
    }
</script>