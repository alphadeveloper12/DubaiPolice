window.addEventListener('DOMContentLoaded', () => {
  const sidebarToggle = document.body.querySelector('#sidebarToggle')
  const iconWrapper = document.querySelector('#toggle-icon')
  const bars = 'fa-solid fa-bars-staggered fa-xl'

  iconWrapper.className = bars

  if (sidebarToggle) {
    if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
      document.body.classList.toggle('sb-sidenav-toggled')
    }
    sidebarToggle.addEventListener('click', event => {
      event.preventDefault()
      document.body.classList.toggle('sb-sidenav-toggled')
      localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'))
    })
  }

  new Chart('myChart', {
    type: 'line',
    data: {
      labels: ['January', 'Febuary', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          data: [860, 1140, 1060, 1060, 1070, 1110],
          borderColor: 'red',
          fill: false,
        },
        {
          data: [1600, 1700, 1700, 1900, 2000, 2700, 4000],
          borderColor: 'green',
          fill: false,
        },
        {
          data: [300, 700, 2000, 5000, 6000, 4000, 2000],
          borderColor: 'blue',
          fill: true,
        },
      ],
    },
    options: {
      legend: {display: false},
    },
  })
})
