const ctx = document.getElementById("chart1");
const labels = ['april', 'may', 'june', 'july', 'august', 'september', 'october'];
const data = {
  labels: labels,
  datasets: [
    {
      label: "My First Dataset",
      data: [65, 59, 80, 81, 56, 55, 40],
      fill: false,
      borderColor: "#4154f1",
      tension: 0.1,
    },
    {
        label: "My second Dataset",
        data: [30, 12, 45, 70, 32, 17, 48],
        fill: false,
        borderColor: "#2eca6a",
        tension: 0.1,
    },
    {
        label: "My third Dataset",
        data: [50, 59, 45, 56, 14, 80, 60],
        fill: false,
        borderColor: "#ff771d",
        tension: 0.1,
    },
  ],
};

new Chart(ctx, {
    type: "line",
    data: data,
    options: {
      responsive: true,
      maintainAspectRatio: false
    }
});
