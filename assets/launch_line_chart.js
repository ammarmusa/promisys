const labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'Disember']
            const data = {
                labels: labels,
                datasets: [{
                        label: 'Planning',
                        data: [65, 59, 80, 81, 56, 55, 40, 41, 55, 60, 70, 90],
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    },
                    {
                        label: 'Actual',
                        data: [70, 60, 30, 20, 70, 80, 85, 60, 50, 70, 75, 80],
                        fill: false,
                        borderColor: 'rgb(255, 99, 132)',
                        tension: 0.1
                    }
                ]
            };
            const config = {
                type: 'line',
                data: data,
            };
            var myChart = new Chart(
                document.getElementById('myChart'),
                config
            )

            const labels2 = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'Disember']
            const data2 = {
                labels: labels2,
                datasets: [{
                        label: 'Securement',
                        data: [5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5],
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    },
                    {
                        label: 'Quotation',
                        data: [70, 60, 30, 20, 70, 80, 85, 60, 50, 70, 75, 80],
                        fill: false,
                        borderColor: 'rgb(255, 99, 132)',
                        tension: 0.1
                    }
                ]
            };
            const config2 = {
                type: 'line',
                data: data2,
            };
            var myChart2 = new Chart(
                document.getElementById('myChart2'),
                config2
            )