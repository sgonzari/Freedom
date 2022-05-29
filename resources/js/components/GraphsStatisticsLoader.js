let chart;

const GraphsStatisticsLoader = props => {
    const ctx = document.getElementById('canvasStatistic').getContext('2d');

    if (chart) {
        chart.destroy();
    }

    /**
     * Recoge en una variable un objeto de arrays ordenado
     * por los meses del años.
     */
    const data = _.groupBy(props.data, prop => {
        var propMonth = new Date(prop.created_at).getMonth();

        return propMonth;
    });

    /**
     * Devuelve la longitud mas larga del array de objeto.
     * @param data 
     * @returns integer
     */
    const getHigherData = data => {
        var counter = 0;
        for (let property in data) {
            if (data.hasOwnProperty(property)) {
                counter = data[property].length > counter ? data[property].length : counter
            }
        }
        return counter
    };
    const maxStadistic = getHigherData(data);

    /**
     * Almaceno en un array los arrays del objeto por orden y por %.
     */
    const stadistic = [];
    for (let i = 0; i <= 11; i++) {
        stadistic.push((data[i] !== undefined) ? (data[i].length * 100) / maxStadistic : 0);
    }

    // CANVAS
    const labels = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'Jule',
        'August',
        'September',
        'Octuber',
        'November',
        'December',
    ];
    const dataCanvas = {
        labels: labels,
        datasets: [{
            label: props.type + '\'s Creation',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: stadistic,
        }]
    };
    const config = {
        type: 'line',
        data: dataCanvas,
        options: {}
    };

    chart = new Chart(
        ctx,
        config
    );
}

export default GraphsStatisticsLoader;