@extends('layouts.master')

@section('title', 'Dashboard Admin')
@section('main-title', 'Grafik Data Les Private')
@section('description', 'Menjelaskan beberapa grafik data perusahaan Easy Private')
@section('active-pages', 'Dashboard')
@section('content')
<div class="container-fluid container-fullw bg-white">
    <div class="row">
        <div class="col-sm-12">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, modi. Natus id aliquam ratione porro optio. Accusamus deleniti dolore consequuntur officiis provident voluptate, quas suscipit qui fugiat consectetur, culpa quam.
            </p>
        </div>
    </div>
</div>
<div class="container-fluid container-fullw">
    <div class="row">
        <div class="col-sm-12">
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. At nulla laborum sapiente dolores architecto iste quos similique impedit delectus? Consectetur natus sit eum asperiores, architecto nesciunt provident tenetur quidem. Iste!
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <!-- Start Graph line -->
                    <div class="panel panel-white no-radius" id="">
                        <div class="panel-wrapper">
                            <div class="panel-heading border-light">
                                <h4 class="panel-title">Pemesanan</h4>
                            </div>
                            <div class="panel-body">
                                <div class="height-350">
                                    <canvas id="pemesanan" class="full-width"></canvas>
                                    <div class="margin-top-20">
                                        <div class="inline pull-left">
                                            <!-- <div id="chart1Legend" class="chart-legend"></div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End graph -->
                </div>
                <div class="col-md-6 col-md-6">
                    <!-- Start Graph Pendapatan dan Pemasukan -->
                    <div class="panel panel-white no-radius">
                        <div class="panel-wrapper">
                            <div class="panel-heading border-light">
                                <h4 class="panel-title">Pendapatan dan Pemasukan</h4>
                            </div>
                            <div class="panel-body">
                                <div class="height-180">
                                    <canvas id="pendapatan-pemasukan" class="full-width"></canvas>
                                    <div class="inline pull-left legend-xs">
                                        <!-- <div id="chart2Legend" class="chart-legend"></div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End graph -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-7 col-lg-8">
                    <!-- Start Graph Data Guru -->
                    <div class="panel panel-white no-radius">
                        <div collapse="visits" class="panel-wrapper">
                            <div class="panel-heading border-light">
                                <h4 class="panel-title">Data Guru</h4>
                            </div>
                            <div class="panel-body">
                                <div class="height-180">
                                    <canvas id="data-guru" class="full-width"></canvas>
                                    <div class="inline pull-left legend-xs">
                                        <!-- <div id="chart2Legend" class="chart-legend"></div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End graph -->
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script>
    var url = "{{url('/pemesananPerJenjang')}}";
    var Years = new Array();
    var Month = new Array();
    var MonthName = new Array();
    var Nama_jenjang = new Array();
    var data_pemesanan_per_bulan_jenjang = new Array();
    var ctx = document.getElementById('pemesanan').getContext('2d');
    $.get(url, function(response) {
        response.forEach(function(data) {
            Years.push(data.year);
            Month.push(data.month);
            MonthName.push(data.month_name);
            Nama_jenjang.push(data.nama_jenjang);
            data_pemesanan_per_bulan_jenjang.push(data.data_pemesanan);
        });
        console.log(data_pemesanan_per_bulan_jenjang);
        // console.log(ctx);
        var ctx = document.getElementById('pemesanan').getContext('2d');
        // var ctx
        var chart = new Chart(ctx, {
            // The type of chartPemesanan we want to create
            type: 'bar',
            // The data for our dataset
            data: {
                // labels: Month,
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                        label: 'SD',
                        // data: data_pemesanan_per_bulan_jenjang,
                        data: [10, 10, 5, 2, 20, 30, 45],
                        backgroundColor: 'red', //rgb(255, 99, 132)
                        borderWidth: 4,
                        borderColor: '#777' //rgb(255, 99, 132)
                    },
                    {
                        label: "SMP",
                        backgroundColor: "blue",
                        borderColor: "red",
                        borderWidth: 1,
                        data: [3, 5, 6, 7, 3, 5, 6]
                    },
                    {
                        label: "SMA",
                        backgroundColor: "gray",
                        borderColor: "blue",
                        borderWidth: 1,
                        data: [2, 3, 4, 5, 6, 7, 8]
                    }
                ]
            },
            // Configuration options go here
            options: {
                title: {
                    display: true,
                    text: 'Data Pemesanan',
                    fontSize: 25
                },
                legend: {
                    display: true,
                    position: 'bottom',
                    labels: {
                        fontColor: 'blue',
                    }
                }
            }
        });
        // console.log(chartPemesanan);
    });
</script>
<!-- end grafik pemesanan -->
<!-- start grafik pendapatan dan pengeluaran -->
<script>
    var ctx = document.getElementById('pendapatan-pemasukan').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                    label: 'Data Pemasukan',
                    backgroundColor: 'lightblue', //rgb(255, 99, 132)
                    borderWidth: 4,
                    borderColor: '#777', //rgb(255, 99, 132)
                    data: [10, 10, 5, 2, 20, 30, 45]
                },
                {
                    label: 'Data Pengeluaran',
                    backgroundColor: 'yellow', //rgb(255, 99, 132)
                    borderWidth: 4,
                    borderColor: '#777', //rgb(255, 99, 132)
                    data: [20, 30, 40, 50, 60, 70, 80]
                },
            ]
        },

        // Configuration options go here
        options: {
            title: {
                display: true,
                text: 'Data Pemasukan dan Pengeluaran',
                fontSize: 25
            },
            legend: {
                display: true,
                position: 'bottom',
                labels: {
                    fontColor: 'blue',
                }
            }
        }
    });
</script>
<!-- end grafik pendapatan dan pengeluarna -->

<!-- start grafik data guru -->
<script>
    var ctx = document.getElementById('data-guru').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                    label: 'Data Guru Sudah Dapat Pemesanan',
                    backgroundColor: 'blue', //rgb(255, 99, 132)
                    borderWidth: 4,
                    borderColor: '#777', //rgb(255, 99, 132)
                    data: [10, 10, 5, 2, 20, 30, 45]
                },
                {
                    label: 'Data Guru Belum Dapat Pemesanan',
                    backgroundColor: 'red', //rgb(255, 99, 132)
                    borderWidth: 4,
                    borderColor: '#777', //rgb(255, 99, 132)
                    data: [10, 10, 5, 2, 20, 30, 45]
                }
            ]
        },

        // Configuration options go here
        options: {
            title: {
                display: true,
                text: 'Data Guru',
                fontSize: 25
            },
            legend: {
                display: true,
                position: 'bottom',
                labels: {
                    fontColor: 'blue',
                }
            }
        }
    });
</script>
<!-- end grafik data guru -->
@stop