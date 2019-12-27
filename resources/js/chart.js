import Axios from "axios"
//https://reffect.co.jp/vue/chart-jsvue-jsaxios-display-graph
new Vue({
    el: '#app',
    data: {
        dateList: [],
        aveList: [],
        maxList: [],
        minList: [],
        dayTimeList: [],
        dispAve: [],
        dispMax: [],
        dispMin: [],
    },
    methods: {
        displayGraph: function () {
            axios.post('/api/graphData').then((res) => {
                this.dateList = res.data.map(a => a.startDate)
                this.aveList = res.data.map(a => a.ave)
                this.maxList = res.data.map(a => a.max)
                this.minList = res.data.map(a => a.min)
            })

            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: this.dateList,
                    datasets: [{
                            label: '平均気温推移',
                            data: this.aveList,
                            borderColor: 'gray',
                            backgroundColor: 'rgba(255, 255, 255, 0)',
                            hidden: true,
                        },
                        {
                            label: '最高気温推移',
                            data: this.maxList,
                            borderColor: 'red',
                            backgroundColor: 'rgba(255, 255, 255, 0)',
                            hidden: false,
                        },
                        {
                            label: '最低気温推移',
                            data: this.minList,
                            borderColor: 'blue',
                            backgroundColor: 'rgba(255, 255, 255, 0)',
                            hidden: false,
                        },

                    ]
                }
            });
        },
    },

    created: function () {
        axios.post('/api/graphData').then((res) => {
            this.dateList = res.data.map(a => a.startDate)
            this.aveList = res.data.map(a => a.ave)
            this.maxList = res.data.map(a => a.max)
            this.minList = res.data.map(a => a.min)
        })
    },
    mounted: function () {
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: this.dateList,
                datasets: [{
                    label: '松本の気温推移',
                    data: this.aveList,
                }]
            }
        });
    }

})
