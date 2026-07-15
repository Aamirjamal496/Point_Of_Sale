document.addEventListener("DOMContentLoaded", function () {
    const monthlyData = window.salesData.monthly;
    const yearlyLabels = window.salesData.yearlyLabels;
    const yearlyData = window.salesData.yearly;

    const ctx = document.getElementById("salesChart");

    if (!ctx) return;

    const chart = new Chart(ctx, {
        type: "line",
        data: {
            labels: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ],
            datasets: [
                {
                    label: "Monthly Sales",
                    data: monthlyData,
                    borderColor: "#4e73df",
                    backgroundColor: "rgba(78,115,223,0.2)",
                    fill: true,
                    tension: 0.4,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
        },
    });

    document
        .getElementById("chartFilter")
        .addEventListener("change", function () {
            if (this.value === "monthly") {
                chart.data.labels = [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec",
                ];

                chart.data.datasets[0].label = "Monthly Sales";
                chart.data.datasets[0].data = monthlyData;
            } else {
                chart.data.labels = yearlyLabels;
                chart.data.datasets[0].label = "Yearly Sales";
                chart.data.datasets[0].data = yearlyData;
            }

            chart.update();
        });
});
