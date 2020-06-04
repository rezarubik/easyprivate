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
                                        <span class="symbol required text-large">Banyak pemesanan per bulan untuk jenjang <b>SD</b>, <b>SMP</b>, <b>SMA</b> </span>
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
                                <div class="height-350">
                                    <!-- 180 -->
                                    <canvas id="pendapatan-pemasukan" class="full-width"></canvas>
                                    <div class="margin-top-20">
                                        <div class="inline pull-left legend-xs">
                                            <!-- <div id="chart2Legend" class="chart-legend"></div> -->
                                        </div>
                                        <span class="symbol required text-large"> Pemasukan dan Pengeluaran per bulan </span>
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
                                <div class="height-350">
                                    <!-- 180 -->
                                    <canvas id="data-guru" class="full-width"></canvas>
                                    <div class="margin-top-20">
                                        <div class="inline pull-left legend-xs">
                                            <!-- <div id="chart2Legend" class="chart-legend"></div> -->
                                        </div>
                                        <span class="symbol required text-large"> Jumlah guru yg sudah dapat pesanan dan belum dapat pesanan </span>
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
<!-- start grafik pemesanan -->
<script>
    var url = "{{url('/getGrafikPemesanan')}}";
    // console.log(url);
    var Bulan_tahun = new Array();
    var Pemesanan_SD = new Array();
    var Pemesanan_SMP = new Array();
    var Pemesanan_SMA = new Array();
    var ctx = document.getElementById('pemesanan').getContext('2d');
    $.get(url, function(response) {
        response.forEach(function(data) {
            Bulan_tahun.push(data.BULAN_TAHUN);
            Pemesanan_SD.push(data.Pemesanan_SD);
            Pemesanan_SMP.push(data.Pemesanan_SMP);
            Pemesanan_SMA.push(data.Pemesanan_SMA);
        });
        console.log(url);
        console.log(Pemesanan_SMA);
        var ctx = document.getElementById('pemesanan').getContext('2d');
        // var ctx
        var chart = new Chart(ctx, {
            // The type of chartPemesanan we want to create
            type: 'bar',
            // The data for our dataset
            data: {
                labels: Bulan_tahun,
                // labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                        label: 'SD',
                        // data: [10, 10, 5, 2, 20, 30, 45],
                        backgroundColor: 'red', //rgb(255, 99, 132)
                        borderWidth: 4,
                        borderColor: '#777', //rgb(255, 99, 132)
                        data: Pemesanan_SD
                    },
                    {
                        label: "SMP",
                        // data: [3, 5, 6, 7, 3, 5, 6],
                        backgroundColor: "blue",
                        borderColor: "red",
                        borderWidth: 1,
                        data: Pemesanan_SMP
                    },
                    {
                        label: "SMA",
                        // data: [2, 3, 4, 5, 6, 7, 8],
                        backgroundColor: "gray",
                        borderColor: "blue",
                        borderWidth: 1,
                        data: Pemesanan_SMA
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
<!-- end grafik pendapatan dan pengeluaran -->

<!-- start grafik data guru -->
<script>
    var url = "{{url('/getGrafikGuru')}}";
    console.log(url);
    var jumlah_guru_belum_dapat = new Array();
    var jumlah_guru_sudah_dapat = new Array();
    var bulan_tahun = new Array();
    var ctx = document.getElementById('data-guru').getContext('2d');
    $.get(url, function(response) {
        response.forEach(function(data) {
            jumlah_guru_belum_dapat.push(data.jumlah_guru_belum_dapat);
            jumlah_guru_sudah_dapat.push(data.jumlah_guru_sudah_dapat);
            bulan_tahun.push(data.bulan_tahun);
        });
        console.log(url);
        console.log(Pemesanan_SMA);
        var ctx = document.getElementById('data-guru').getContext('2d');
        // var ctx
        var chart = new Chart(ctx, {
            // The type of chartPemesanan we want to create
            type: 'bar',
            // The data for our dataset
            data: {
                labels: bulan_tahun,
                // labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                        label: 'Data Guru Sudah Dapat Pemesanan',
                        backgroundColor: 'blue', //rgb(255, 99, 132)
                        borderWidth: 4,
                        borderColor: '#777', //rgb(255, 99, 132)
                        data: jumlah_guru_sudah_dapat
                    },
                    {
                        label: 'Data Guru Belum Dapat Pemesanan',
                        backgroundColor: 'red', //rgb(255, 99, 132)
                        borderWidth: 4,
                        borderColor: '#777', //rgb(255, 99, 132)
                        data: jumlah_guru_belum_dapat
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
        // console.log(chartPemesanan);
    });
</script>
<!-- <script>
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
</script> -->
<!-- end grafik data guru -->
@stop