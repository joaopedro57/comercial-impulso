$(function () {

    var lineData = {
            labels: ["Jan", "Fev", "Mar", "Abi", "Mai", "Jun", "Jul","Ago","Set","Out","Nov","Dez"],
            datasets: [

                {
                    label: "2016",
                    backgroundColor: 'rgba(26,179,148,0.5)',
                    borderColor: "rgba(26,179,148,0.7)",
                    pointBackgroundColor: "rgba(26,179,148,1)",
                    pointBorderColor: "#fff",
                    data: [8883, 13765, 15507, 15611, 8835, 21770, 19138, 9740, 7193, 9058, 3463, 9259]
                },{
                    label: "2017",
                    backgroundColor: 'rgba(237, 85, 101, 0.5)',
                    pointBorderColor: "#fff",
                    data: [18168, 5777, 13896, 9269, 26623, 26308, 24548, 42791, 34703, 40073, 39541, 12725]
                },{
                    label: "2018",
                    backgroundColor: 'rgba(248, 172, 0, 0.5)',
                    pointBorderColor: "#fff",
                    data: [43680, 27227, 31640, 39686, 36770, 50669, 46069, 47548, 31178.56, 61029.96, 49378.35]
                }
            ]
        };

    var lineOptions = {
        responsive: true
    };


    var ctx = document.getElementById("gestao").getContext("2d");
    new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});

    var lineData = {
        labels: ["Jan", "Fev", "Mar", "Abi", "Mai", "Jun", "Jul","Ago","Set","Out","Nov","Dez"],
        datasets: [

            {
                label: "Feito",
                backgroundColor: 'rgba(26,179,148,0.5)',
                borderColor: "rgba(26,179,148,0.7)",
                pointBackgroundColor: "rgba(26,179,148,1)",
                pointBorderColor: "#fff",
                data: [8883, 13765, 15507, 15611, 8835, 21770, 19138, 9740, 7193, 9058, 3463, 9259]
            },{
                label: "Meta",
                backgroundColor: 'rgba(237, 85, 101, 0.5)',
                pointBorderColor: "#fff",
                data: [15000, 15000, 15000, 15000, 15000, 14500, 19264, 20643, 22097, 23581, 14500, 11500]
            }
        ]
    };

    var lineOptions = {
        responsive: true
    };


    var ctx = document.getElementById("lineChart").getContext("2d");
    new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});

    var lineData = {
        labels: ["Jan", "Fev", "Mar", "Abi", "Mai", "Jun", "Jul","Ago","Set","Out","Nov","Dez"],
        datasets: [

            {
                label: "Feito",
                backgroundColor: 'rgba(26,179,148,0.5)',
                borderColor: "rgba(26,179,148,0.7)",
                pointBackgroundColor: "rgba(26,179,148,1)",
                pointBorderColor: "#fff",
                data: [18168, 5777, 13896, 9269, 26623, 26308, 24548, 42791, 34703, 40073, 39541, 12725,]
            },{
                label: "Meta",
                backgroundColor: 'rgba(237, 85, 101, 0.5)',
                pointBorderColor: "#fff",
                data: [18000, 19750, 24500, 24750, 26000, 24500, 34000, 41600, 44500, 49500, 47500, 42200,]
            }
        ]
    };

    var lineOptions = {
        responsive: true
    };


    var ctx = document.getElementById("lineChart2").getContext("2d");
    new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});

    var lineData = {
        labels: ["Jan", "Fev", "Mar", "Abi", "Mai", "Jun", "Jul","Ago","Set","Out","Nov","Dez"],
        datasets: [

            {
                label: "Feito",
                backgroundColor: 'rgba(26,179,148,0.5)',
                borderColor: "rgba(26,179,148,0.7)",
                pointBackgroundColor: "rgba(26,179,148,1)",
                pointBorderColor: "#fff",
                data: [43680, 27227, 31640, 39686, 36770, 50669, 46069, 47548, 31178.56, 61029.96, 49378.35]
            },{
                label: "Meta",
                backgroundColor: 'rgba(237, 85, 101, 0.5)',
                pointBorderColor: "#fff",   
                data: [43775, 39525, 40375, 36125, 36550, 41225, 45475, 62050, 52700, 62900, 70975]
            }
        ]
    };

    var lineOptions = {
        responsive: true
    };


    var ctx = document.getElementById("lineChart3").getContext("2d");
    new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});

    var barData = {
        labels: ["Semana 1", "Semana 2", "Semana 3", "Semana 4"],
        datasets: [
            {
                label: "Meta",
                backgroundColor: 'rgba(220, 220, 220, 0.5)',
                pointBorderColor: "#fff",
                data: [65, 59, 80, 81, 56, 55, 40]
            },
            {
                label: "Feito",
                backgroundColor: 'rgba(26,179,148,0.5)',
                borderColor: "rgba(26,179,148,0.7)",
                pointBackgroundColor: "rgba(26,179,148,1)",
                pointBorderColor: "#fff",
                data: [28, 48, 40, 19, 86, 27, 90]
            }
        ]
    };

    var barOptions = {
        responsive: true
    };


    var ctx2 = document.getElementById("barChart").getContext("2d");
    new Chart(ctx2, {type: 'bar', data: barData, options:barOptions});

    var polarData = {
        datasets: [{
            data: [
                300,140,200
            ],
            backgroundColor: [
                "#a3e1d4", "#dedede", "#b5b8cf"
            ],
            label: [
                "My Radar chart"
            ]
        }],
        labels: [
            "App","Software","Laptop"
        ]
    };

    var polarOptions = {
        segmentStrokeWidth: 2,
        responsive: true

    };

    var ctx3 = document.getElementById("polarChart").getContext("2d");
    new Chart(ctx3, {type: 'polarArea', data: polarData, options:polarOptions});

    var doughnutData = {
        labels: ["App","Software","Laptop" ],
        datasets: [{
            data: [300,50,100],
            backgroundColor: ["#a3e1d4","#dedede","#b5b8cf"]
        }]
    } ;


    var doughnutOptions = {
        responsive: true
    };


    var ctx4 = document.getElementById("doughnutChart").getContext("2d");
    new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});


    var radarData = {
        labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
        datasets: [
            {
                label: "My First dataset",
                backgroundColor: "rgba(220,220,220,0.2)",
                borderColor: "rgba(220,220,220,1)",
                data: [65, 59, 90, 81, 56, 55, 40]
            },
            {
                label: "My Second dataset",
                backgroundColor: "rgba(26,179,148,0.2)",
                borderColor: "rgba(26,179,148,1)",
                data: [28, 48, 40, 19, 96, 27, 100]
            }
        ]
    };

    var radarOptions = {
        responsive: true
    };

    var ctx5 = document.getElementById("radarChart").getContext("2d");
    new Chart(ctx5, {type: 'radar', data: radarData, options:radarOptions});

});