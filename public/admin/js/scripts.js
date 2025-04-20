document.addEventListener('DOMContentLoaded', function() {
    // Update current time
    function updateCurrentTime() {
        const now = new Date();
        const options = { 
            hour: '2-digit', 
            minute: '2-digit',
            hour12: true 
        };
        document.getElementById('current-time').textContent = now.toLocaleTimeString('en-US', options);
    }
    
    updateCurrentTime();
    setInterval(updateCurrentTime, 60000);
    
    // Initialize financial chart
    const financialCtx = document.getElementById('financialChart').getContext('2d');
    const financialChart = new Chart(financialCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr'],
            datasets: [
                {
                    label: 'Revenue',
                    data: [32000, 35000, 38000, 40000],
                    backgroundColor: 'rgba(74, 107, 255, 0.7)',
                    borderColor: 'rgba(74, 107, 255, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Expenses',
                    data: [22000, 24000, 28000, 30000],
                    backgroundColor: 'rgba(108, 117, 125, 0.7)',
                    borderColor: 'rgba(108, 117, 125, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        drawBorder: false
                    },
                    ticks: {
                        callback: function(value) {
                            return '$' + value.toLocaleString();
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        boxWidth: 12,
                        padding: 20
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed.y !== null) {
                                label += '$' + context.parsed.y.toLocaleString();
                            }
                            return label;
                        }
                    }
                }
            }
        }
    });
    
    // Simulate system metrics updates
    function updateSystemMetrics() {
        const metrics = [
            { id: 'cpu', min: 50, max: 80 },
            { id: 'memory', min: 40, 75 },
            { id: 'disk', min: 15, max: 30 },
            { id: 'network', min: 15, max: 30 }
        ];
        
        metrics.forEach(metric => {
            const randomValue = Math.floor(Math.random() * (metric.max - metric.min + 1)) + metric.min;
            const progressFill = document.querySelector(`.system-metric:nth-child(${metrics.indexOf(metric) + 1}) .progress-fill`);
            progressFill.style.width = `${randomValue}%`;
            
            const valueSpan = document.querySelector(`.system-metric:nth-child(${metrics.indexOf(metric) + 1}) span`);
            valueSpan.textContent = `${randomValue}%`;
        });
    }
    
    // Initial update
    updateSystemMetrics();
    
    // Update every 30 seconds
    setInterval(updateSystemMetrics, 30000);
    
    // Mobile menu toggle
    const mobileMenuToggle = document.createElement('div');
    mobileMenuToggle.className = 'mobile-menu-toggle';
    mobileMenuToggle.innerHTML = '<i class="fas fa-bars"></i>';
    document.querySelector('.main-header').prepend(mobileMenuToggle);
    
    mobileMenuToggle.addEventListener('click', function() {
        document.querySelector('.sidebar').classList.toggle('mobile-show');
    });
    
    // Close mobile menu when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.sidebar') && !e.target.closest('.mobile-menu-toggle')) {
            document.querySelector('.sidebar').classList.remove('mobile-show');
        }
    });
    
    // Add responsive class to body for mobile detection
    function checkMobile() {
        if (window.innerWidth < 992) {
            document.body.classList.add('mobile-view');
        } else {
            document.body.classList.remove('mobile-view');
            document.querySelector('.sidebar').classList.remove('mobile-show');
        }
    }
    
    window.addEventListener('resize', checkMobile);
    checkMobile();
});