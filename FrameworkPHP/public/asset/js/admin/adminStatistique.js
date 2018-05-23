$(function () {

    $.ajax({
        url: PUBLIC_URL + "?admin/statistique/data",
        method: "POST",
        data: {},
        success: function (json) {
            let data = JSON.parse(json);

            console.log(data);
            let labels = [];
            let value = [];
            let backgroundColor = [];
            let borderColor = [];
            for (i = 0; i < data.length; i++) {
                labels[i] = data[i].produit;
                value[i] = data[i].nombre;

                let nb1 = Math.floor((Math.random() * 255) + 0);
                let nb2 = Math.floor((Math.random() * 255) + 0);
                let nb3 = Math.floor((Math.random() * 255) + 0);

                backgroundColor[i] = ['rgba(' + nb1 + ',' + nb2 + ',' + nb3 + ',0.2)'];
                borderColor[i] = ['rgba(' + nb1 + ',' + nb2 + ',' + nb3 + ',1)'];
            }


            console.log(labels);
            console.log(backgroundColor);
            console.log(borderColor);


            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: "Nombre d'annonce",
                        data: value,
                        backgroundColor: backgroundColor,
                        borderColor: borderColor,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    })


});
