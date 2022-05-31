/* VARIABLES */
let chart;
let data = [];
let maxStadistic = [];
let stadistic = [];
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
let datasets = [];


/* FUNCTIONS */
const deleteChartIfExists = () => {
    if (chart) {
        data = [];
        maxStadistic = [];
        stadistic = [];
        datasets = [];
        chart.destroy();
    }
};

const orderValuesByMonths = props => {
    Object.entries(props).forEach(key => {
        data[key[0]] = new Array(_.groupBy(key[1]['data'], prop => {
            var propMonth = new Date(prop.created_at).getMonth();
    
            return propMonth;
        }));
    });
};

const getMaxValueInMonths = () => {
    Object.entries(data).forEach(element => {
        maxStadistic[element[0]] = getHigherData(element[1][0])
    });
};

const orderValesInAllMonths = () => {
    Object.entries(data).forEach(key => {
        stadistic[key[0]] = [];
        for (let i = 0 ; i <= 11 ; i++) {
            stadistic[key[0]].push((key[1][0][i]) ? (key[1][0][i].length * 100) / maxStadistic[key[0]] : 0);
        }
    });
};

 const getHigherData = data => {
    var counter = 0;
    for (let property in data) {
        if (data.hasOwnProperty(property)) {
            counter = data[property].length > counter ? data[property].length : counter
        }
    }
    return counter
};

const getValuesToDatasets = props => {
    Object.entries(props).forEach(key => {
        datasets.push({
            label: key[0],
            backgroundColor: key[1]['color'],
            borderColor: key[1]['color'],
            data: stadistic[key[0]],
        });
    });
};

const printChart = ctx => {
    const dataCanvas = {
        labels: labels,
        datasets: datasets
    };
    const config = {
        type: 'line',
        data: dataCanvas,
        options: {
            scales: {
                x : {
                    title: {
                        display: true,
                        text: 'Months'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: '%'
                    },
                    min: 0,
                    max: 100,
                    ticks : {
                        stepSize: 10
                    }
                }
            }
        }
    };

    chart = new Chart(
        ctx,
        config
    );
};


/* MAIN */
const GraphsStatisticsLoader = props => {
    const ctx = document.getElementById('canvasStatistic').getContext('2d');

    deleteChartIfExists();

    orderValuesByMonths(props);

    getMaxValueInMonths();

    orderValesInAllMonths();

    // Canvas
    getValuesToDatasets(props);

    printChart(ctx);
}

export default GraphsStatisticsLoader;