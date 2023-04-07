            <div class="bg-gray-900 p-3 shadow rounded-md">
                <h2 class="text-lg font-bold leading-7 text-white sm:truncate sm:text-lg sm:tracking-tight">Profile views</h2>
                <p>
                    <canvas id="myChart"></canvas>
                </p>
            </div>
            <script src="
                https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js
            "></script>
            <script>
                const data = {
                    labels: ["All time", "1 Week", "1 Month"],
                    datasets: [{
                        label: 'Profile views',
                        data: [<?php echo $_SESSION['profileviewcount']; ?>],
                        backgroundColor: [
                            'rgba(79, 70, 229, 0.2)',
                            'rgba(79, 70, 229, 0.2)',
                            'rgba(79, 70, 229, 0.2)',
                            'rgba(79, 70, 229, 0.2)',
                            'rgba(79, 70, 229, 0.2)',
                            'rgba(79, 70, 229, 0.2)',
                            'rgba(79, 70, 229, 0.2)',
                        ],
                        borderColor: [
                            'rgba(79, 70, 229)',
                            'rgba(79, 70, 229)',
                            'rgba(79, 70, 229)',
                            'rgba(79, 70, 229)',
                            'rgba(79, 70, 229)',
                            'rgba(79, 70, 229)',
                            'rgba(79, 70, 229)',
                        ],
                        hoverBackgroundColor: [
                            'rgba(79, 70, 229, 0.2)',
                            'rgba(79, 70, 229, 0.2)',
                            'rgba(79, 70, 229, 0.2)',
                            'rgba(79, 70, 229, 0.2)',
                            'rgba(79, 70, 229, 0.2)',
                            'rgba(79, 70, 229, 0.2)',
                            'rgba(79, 70, 229, 0.2)',
                        ],
                        hoverBorderColor: [
                            'rgba(79, 70, 229)',
                            'rgba(79, 70, 229)',
                            'rgba(79, 70, 229)',
                            'rgba(79, 70, 229)',
                            'rgba(79, 70, 229)',
                            'rgba(79, 70, 229)',
                            'rgba(79, 70, 229)',
                        ],
                        borderWidth: 1,
                        tension: 0.1
                    }]
                };
                
                var myChart = new Chart("myChart", {
                    type: 'bar',
                    data: data,
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    },
                });
            </script>