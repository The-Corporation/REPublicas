@extends('layouts.master')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ $republica->name or 'República    '}} <i class="fa fa-angle-double-right"></i> <small> Caixinha de <span style="font-size: 1.5em;">{{ $republica->getCurrentMonth() }}</span> </small>
            </h1>
            <div class="clearfix"></div>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->

    <div class="row">
        <div class="col-md-12">
            <!-- Total Section -->
            <section style="margin-bottom: 5%;">
                <span class="col-md-4 text-center" style="font-size: 1.5em;">
                    <span class="label label-danger">Total: R$ {{ number_format($republica->getBillTotal(), 2, ',', '.') }}</span>
                </span>
                <span class="col-md-4 text-center" style="font-size: 1.5em;">
                    <span class="label label-primary">Aluguel: R$ {{ number_format($republica->getRent(), 2, ',', '.') }}</span>
                </span>
                <span class="col-md-4 text-center" style="font-size: 1.5em;">
                    <span class="label label-success">Caixinha: R$ {{ number_format($republica->getBillTotal()/count($republica->users), 2, ',', '.') }}</span>
                </span>
            </section>

            <!-- Graphic Section -->
            <section id="generalGraphic" style="margin-bottom: 5%; box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5); width:100%; height:500px; background-color: #eef;"></section>

            <section id="monthlyGraphic" style="margin-bottom: 5%; box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5); width:50%; height:400px; background-color: #eef;"></section>
        </div>
    </div>

</div><!-- /#page-wrapper -->
@endsection

@section('inline_scripts')
<!-- Highcharts -->
<script src="/../../../highcharts/js/highcharts.js"></script>
<script src="/../../../highcharts/js/highcharts-more.js"></script>
<script src="/../../../highcharts/js/modules/exporting.js"></script>
<script src="https://www.highcharts.com/samples/static/highslide-full.min.js"></script>
<script src="https://www.highcharts.com/samples/static/highslide.config.js" charset="utf-8"></script>

<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
        $('.newBillType').hide();

        $('.maskMoney').maskMoney({
            thousands: '',
            decimal: '.',
            allowZero: true,
            prefix: 'R$ '
        });

        $('.dates').mask('00/00/0000', {
            placeholder: '__/__/____',
            clearIfNotMatch: true
        });

        // ====================================================================
        /**
         * Translates highcharts to pt-br
         */
        Highcharts.setOptions({
            lang: {
                loading: ['Atualizando o gráfico...aguarde'],
                months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                weekdays: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
                shortMonths: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                contextButtonTitle: 'Exportar gráfico',
                decimalPoint: ',',
                thousandsSep: '.',
                downloadJPEG: 'Baixar imagem JPEG',
                downloadPDF: 'Baixar arquivo PDF',
                downloadPNG: 'Baixar imagem PNG',
                downloadSVG: 'Baixar vetor SVG',
                printChart: 'Imprimir gráfico',
                rangeSelectorFrom: 'De',
                rangeSelectorTo: 'Para',
                rangeSelectorZoom: 'Zoom',
                resetZoom: 'Limpar Zoom',
                resetZoomTitle: 'Voltar Zoom para nível 1:1'
            }
        });

        // ============================= Gráfico Geral ==============================
        var start = [2015, 01, 01];
        var array_bills = {!! json_encode($array_bills) !!};

        var options = {
            chart: {
                renderTo: 'generalGraphic',
                type: 'line',
                zoomType: 'x'
            },
            colors: ['#E0E53E', '#058DC7', '#239A00', '#DDDF00', '#24CBE5', '#64E572',
                    '#FF9655', '#FFF263', '#6AF9C4'],
            title: {
                text: 'Histórico de Gastos',
                style: {
                    fontSize: '25px',
                    color: '#000',
                },
             },
             subtitle: { text: '(Mensal por Tipo de Gasto)'},
            xAxis: {
                labels: {
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Arial,sans-serif'
                    },
                },
                gridLineWidth: 0,
                type: 'datetime',
                dateTimeLabelFormats: {
                    second: '%H:%M:%S',
                    minute: '%H:%M',
                    hour: '%H:%M',
                    day: '%e. %b',
                    week: '%e. %b',
                    month: '%b/%Y',
                    year: '%Y'
                },
                tickInterval:  30 * 24 * 3600 * 1000,
                title: {
                        text: 'Período (Mês)'
                },
            },
            yAxis: {
                gridLineWidth: 0,
                title: {
                    text: 'Valor'
                },
                labels: {
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Arial,sans-serif'
                    },
                    formatter: function() {
                        return 'R$ ' + Highcharts.numberFormat(this.value,2,',',".");
                    }
                },
            },
            tooltip: {
                    pointFormat: '<span style="color:{point.color}">\u25CF</span> {series.name}: <b>R$ {point.y:,.2f}</b><br>',
                    shared: true,
                    crosshairs: [true, true]
            },
            plotOptions: {
                line: {
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:,.2f}'
                        },
                        enableMouseTracking: true,
                        lineWidth: 3,
                    },
                    series: {
                        cursor: 'pointer',
                        point: {
                            events: {
                                click: function (e) {
                                    hs.htmlExpand(null, { pageOrigin: { x: e.pageX || e.clientX, y: e.pageY || e.clientY },
                                        headingText: '<span class="text-center">' + this.series.name + '</span>',
                                        maincontentText: Highcharts.dateFormat('%B de %Y', this.x) + '<br/> ' + 'R$ ' + this.y.toFixed(2),
                                        width: 100
                                    });
                                }
                            }
                        },
                        pointStart: Date.UTC(start[0], start[1]-1, start[2]),
                        pointIntervalUnit: 'month',
                        marker: {
                            lineWidth: 1
                        }
                    }
            },
            series: []
        }

        for (var i = 0; i < array_bills.length; i++) {
            options.series[i] = array_bills[i];
        }
        chart = new Highcharts.Chart(options);

        // ============================= Gráfico de Pizza =============================
        var array_bills_pie = {!! json_encode($array_current_bills) !!};

        Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
            return {
                radialGradient: {
                    cx: 0.5,
                    cy: 0.3,
                    r: 0.7
                },
                stops: [
                    [0, color],
                    [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                ]
            };
        });
        var optionsPie = {
            chart: {
                renderTo: 'monthlyGraphic',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Gastos do mês de {{ $republica->getCurrentMonth() }}'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Gastos',
                colorByPoint: true,
                data: array_bills_pie
            }]
        }
        pieChart = new Highcharts.Chart(optionsPie);
    });
</script>
@endsection