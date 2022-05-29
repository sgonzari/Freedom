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
    const data = [];
    Object.entries(props).forEach(key => {
        data[key[0]] = new Array(_.groupBy(key[1]['data'], prop => {
            var propMonth = new Date(prop.created_at).getMonth();
    
            return propMonth;
        }));
    });
    // console.log(data);

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
    const maxStadistic = [];
    Object.entries(data).forEach(element => {
        maxStadistic[element[0]] = getHigherData(element[1][0])
    });
    // console.log(maxStadistic);

    /**
     * Almaceno en un array los arrays del objeto por orden y por %.
     */
    const stadistic = [];
    Object.entries(data).forEach(key => {
        stadistic[key[0]] = [];
        for (let i = 0 ; i <= 11 ; i++) {
            stadistic[key[0]].push((key[1][0][i]) ? (key[1][0][i].length * 100) / maxStadistic[key[0]] : 0);
        }
    });
    // console.log(stadistic);

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
    const datasets = [];
    Object.entries(props).forEach(key => {

        datasets.push({
            label: key[0],
            backgroundColor: key[1]['color'],
            borderColor: key[1]['color'],
            data: stadistic[key[0]],
        });
    });

    const dataCanvas = {
        labels: labels,
        datasets: datasets
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