@extends('layouts.app')

@section('title', 'Reporte COVID-19')

@section('content')
<h3 class="mb-3">Reporte COVID-19</h3>

<div class="row">
    <div class="col-12 col-sm-4">

        <table class="table table-sm table-bordered">
            <thead>
                <tr class="table-active">
                    <th>Enviados a análisis</th>
                    <th>Total</th>
                    <th>Hom</th>
                    <th>Muj</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tarapacá</td>
                    <td class="text-center">
                        {{ $cases->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.gender','male')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.gender','female')->count() }}
                    </td>
                </tr>

                <tr>
                    <td class="">Otras Regiones</td>
                    <td class="text-center">
                        {{ $cases_other_region->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases_other_region->where('patient.gender','male')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases_other_region->where('patient.gender','female')->count() }}
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="table table-sm table-bordered">
            <thead>
                <tr class="table-active">
                    <th>Tarapacá</th>
                    <th>Total</th>
                    <th>Hom</th>
                    <th>Muj</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Positivos</td>
                    <th class="text-danger text-center">
                        {{ $patients->count() }}
                    </th>
                    <th class="text-danger text-center">
                        {{ $total_male = $patients->where('gender','male')->count() }}
                    </th>
                    <th class="text-danger text-center">
                        {{ $total_female = $patients->where('gender','female')->count() }}
                    </th>
                </tr>

                <tr>
                    <td>Negativos</td>
                    <td class="text-center">
                        {{ $cases->where('pscr_sars_cov_2','negative')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.gender','male')->where('pscr_sars_cov_2','negative')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.gender','female')->where('pscr_sars_cov_2','negative')->count() }}
                    </td>
                </tr>

                <tr>
                    <td>Pendiente resultado</td>
                    <td class="text-center">
                        {{ $cases->where('pscr_sars_cov_2','pending')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.gender','male')->where('pscr_sars_cov_2','pending')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.gender','female')->where('pscr_sars_cov_2','pending')->count() }}
                    </td>
                </tr>

                <tr>
                    <td>Muestra rechazada</td>
                    <td class="text-center">
                        {{ $cases->where('pscr_sars_cov_2','rejected')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.gender','male')->where('pscr_sars_cov_2','rejected')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.gender','female')->where('pscr_sars_cov_2','rejected')->count() }}
                    </td>
                </tr>

                <tr>
                    <td>Resultado indeterminado</td>
                    <td class="text-center">
                        {{ $cases->where('pscr_sars_cov_2','undetermined')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.gender','male')->where('pscr_sars_cov_2','undetermined')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.gender','female')->where('pscr_sars_cov_2','undetermined')->count() }}
                    </td>
                </tr>
            </tbody>
        </table>

        <div id="evolution" style="width: 480px; height: 400"></div>


    </div>

    <div class="col-12 col-sm-4">

        <table class="table table-sm table-bordered">
            <thead>
                <tr class="table-active">
                    <th>Casos por comuna</th>
                    <th>Positivos</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Alto Hospicio</td>
                    <td class="text-center">
                        {{ $alto_hospicio = $patients->where('demographic.commune','Alto Hospicio')->count() }}
                    </td>
                </tr>

                <tr>
                    <td>Camiña</td>
                    <td class="text-center">
                        {{ $camiña = $patients->where('demographic.commune','Camiña')->count() }}
                    </td>

                </tr>

                <tr>
                    <td>Colchane</td>
                    <td class="text-center">
                        {{ $colchane = $patients->where('demographic.commune','Colchane')->count() }}
                    </td>
                </tr>

                <tr>
                    <td>Huara</td>
                    <td class="text-center">
                        {{ $huara = $patients->where('demographic.commune','Huara')->count() }}
                    </td>

                </tr>

                <tr>
                    <td>Iquique</td>
                    <td class="text-center">
                        {{ $iquique = $patients->where('demographic.commune','Iquique')->count() }}
                    </td>
                </tr>

                <tr>
                    <td>Pica</td>
                    <td class="text-center">
                        {{ $pica = $patients->where('demographic.commune','Pica')->count() }}
                    </td>
                </tr>

                <tr>
                    <td>Pozo Almonte</td>
                    <td class="text-center">
                        {{ $pozo_almonte = $patients->where('demographic.commune','Pozo Almonte')->count() }}
                    </td>
                </tr>

                <tr>
                    <td>Sin registro</td>
                    <td class="text-center">
                        {{ $sin_registro = $patients->whereIn('demographic.commune',['sin-comuna',null])->count() }}
                    </td>
                </tr>

                <tr>
                    <td>Otras Regiones</td>
                    <td class="text-center">
                        {{ $patients_other_region->count() }}
                    </td>

                </tr>

            </tbody>
        </table>

        <table class="table table-sm table-bordered">
            <thead>
                <tr class="table-active">
                    <th colspan="2">
                        Tasa de incidencia<br>(Casos positivos / población*) x 100.000
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Alto Hospicio (129.999*)</td>
                    <td class="text-right">
                        {{ number_format($alto_hospicio / 129999 * 100000 ,2) }}
                    </td>
                </tr>
                <tr>
                    <td>Camiña (1.375*)</td>
                    <td class="text-right">
                        {{ number_format($camiña / 1375 * 100000 ,2) }}
                    </td>
                </tr>
                <tr>
                    <td>Colchane (1.583*)</td>
                    <td class="text-right">
                        {{ number_format($colchane / 1583 * 100000 ,2) }}
                    </td>
                </tr>
                <tr>
                    <td>Huara (3.000*)</td>
                    <td class="text-right">
                        {{ number_format($huara / 3000 * 100000 ,2) }}
                    </td>
                </tr>
                <tr>
                    <td>Iquique (223.463*)</td>
                    <td class="text-right">
                        {{ number_format($iquique / 223463 * 100000 ,2) }}
                    </td>
                </tr>
                <tr>
                    <td>Pica (5.958*)</td>
                    <td class="text-right">
                        {{ number_format($pica / 5958 * 100000 ,2) }}
                    </td>
                </tr>
                <tr>
                    <td>Pozo Almonte (17.395*)</td>
                    <td class="text-right">
                        {{ number_format($pozo_almonte / 17395 * 100000 ,2) }}
                    </td>
                </tr>
                <tr>
                    <th>Región Tarapacá (382.773*)</th>
                    <th class="text-right">
                        {{ number_format(($total_male + $total_female) / 382773 * 100000 ,2) }}
                    </th>
                </tr>
            </tbody>
        </table>


        <table class="table table-sm table-bordered">
            <thead>
                <tr class="table-active">
                    <th>Sospechas por Origen</th>
                    <th>Total de casos</th>
                    <th>Total positivos</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Hospital ETG</td>
                    <td class="text-center">
                        {{ $cases->where('origin','HOSPITAL Ernesto Torres Galdames')->count() }}
                    </td>
                    <td class="text-center">
                        <span class="text-danger">
                            {{ $cases->where('origin','HOSPITAL Ernesto Torres Galdames')->where('pscr_sars_cov_2','positive')->count() }}
                        </span>
                    </td>
                </tr>

                <tr>
                    <td>APS</td>
                    <td class="text-center">
                        {{ $cases->whereNotIn('origin',['HOSPITAL Ernesto Torres Galdames','Clínica Tarapacá','Clínica Iquique'])->count() }}
                    </td>
                    <td class="text-center">
                        <span class="text-danger">
                            {{ $cases->whereNotIn('origin',['HOSPITAL Ernesto Torres Galdames','Clínica Tarapacá','Clínica Iquique'])->where('pscr_sars_cov_2','positive')->count() }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>Privados</td>
                    <td class="text-center">
                        {{ $cases->whereIn('origin',['Clínica Tarapacá','Clínica Iquique'])->count() }}
                    </td>
                    <td class="text-center">
                        <span class="text-danger">
                            {{ $cases->whereIn('origin',['Clínica Tarapacá','Clínica Iquique','Particular (SEREMI)'])->where('pscr_sars_cov_2','positive')->count() }}
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

    <div class="col-12 col-sm-4">

        <table class="table table-sm table-bordered">
            <thead>
                <tr class="table-active">
                    <th>Rango Edad</th>
                    <th>Hombres</th>
                    <th>Mujeres</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td>0-9</td>
                    <td>
                        {{ $age0male = $patients->whereBetween('age',[0,9])->where('gender','male')->count() }}
                    </td>
                    <td>
                        {{ $age0female = $patients->whereBetween('age',[0,9])->where('gender','female')->count() }}
                    </td>
                    <td>
                        {{ $age0total = $age0male + $age0female }}
                    </td>
                </tr>
                <tr class="text-center">
                    <td>10-19</td>
                    <td>
                        {{ $age1male = $patients->whereBetween('age',[10,19])->where('gender','male')->count() }}
                    </td>
                    <td>
                        {{ $age1female = $patients->whereBetween('age',[10,19])->where('gender','female')->count() }}
                    </td>
                    <td>
                        {{ $age1total = $age1male + $age1female }}
                    </td>
                </tr>
                <tr class="text-center">
                    <td>20-29</td>
                    <td>
                        {{ $age2male = $patients->whereBetween('age',[20,29])->where('gender','male')->count() }}
                    </td>
                    <td>
                        {{ $age2female = $patients->whereBetween('age',[20,29])->where('gender','female')->count() }}
                    </td>
                    <td>
                        {{ $age2total = $age2male + $age2female }}
                    </td>
                </tr>
                <tr class="text-center">
                    <td>30-39</td>
                    <td>
                        {{ $age3male = $patients->whereBetween('age',[30,39])->where('gender','male')->count() }}
                    </td>
                    <td>
                        {{ $age3female = $patients->whereBetween('age',[30,39])->where('gender','female')->count() }}
                    </td>
                    <td>
                        {{ $age3total = $age3male + $age3female }}
                    </td>
                </tr>
                <tr class="text-center">
                    <td>40-49</td>
                    <td>
                        {{ $age4male = $patients->whereBetween('age',[40,49])->where('gender','male')->count() }}
                    </td>
                    <td>
                        {{ $age4female = $patients->whereBetween('age',[40,49])->where('gender','female')->count() }}
                    </td>
                    <td>
                        {{ $age4total = $age4male + $age4female }}
                    </td>
                </tr>
                <tr class="text-center">
                    <td>50-59</td>
                    <td>
                        {{ $age5male = $patients->whereBetween('age',[50,59])->where('gender','male')->count() }}
                    </td>
                    <td>
                        {{ $age5female = $patients->whereBetween('age',[50,59])->where('gender','female')->count() }}
                    </td>
                    <td>
                        {{ $age5total = $age5male + $age5female }}
                    </td>
                </tr>
                <tr class="text-center">
                    <td>60-69</td>
                    <td>
                        {{ $age6male = $patients->whereBetween('age',[60,69])->where('gender','male')->count() }}
                    </td>
                    <td>
                        {{ $age6female = $patients->whereBetween('age',[60,69])->where('gender','female')->count() }}
                    </td>
                    <td>
                        {{ $age6total = $age6male + $age6female }}
                    </td>
                </tr>
                <tr class="text-center">
                    <td>70-79</td>
                    <td>
                        {{ $age7male = $patients->whereBetween('age',[70,79])->where('gender','male')->count() }}
                    </td>
                    <td>
                        {{ $age7female = $patients->whereBetween('age',[70,79])->where('gender','female')->count() }}
                    </td>
                    <td>
                        {{ $age7total = $age7male + $age7female }}
                    </td>
                </tr>
                <tr class="text-center">
                    <td>80-></td>
                    <td>
                        {{ $age8male = $patients->whereBetween('age',[80,999])->where('gender','male')->count() }}
                    </td>
                    <td>
                        {{ $age8female = $patients->whereBetween('age',[80,999])->where('gender','female')->count() }}
                    </td>
                    <td>
                        {{ $age8total = $age8male + $age8female }}
                    </td>
                </tr>
                <tr class="text-center">
                    <td>Sin Registro</td>
                    <td></td>
                    <td></td>
                    <td>
                        {{ $patients->whereNull('age')->count() }}
                    </td>

                </tr>
            </tbody>
        </table>

        <div id="chart_ages" style="width: 400px; height: 400px"></div>


    </div>
</div>

@endsection

@section('custom_js_head')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart','line']});

    google.charts.setOnLoadCallback(drawChartAges);
    google.charts.setOnLoadCallback(drawChartEvolution);

    function drawChartAges() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Edad');
        data.addColumn('number', 'Hombres');
        data.addColumn('number', 'Mujeres');
        data.addRows([
            ['0-9',  {{ $age0male }} , {{ $age0female }}],
            ['10-19', {{ $age1male }} , {{ $age1female }}],
            ['20-29', {{ $age2male }} , {{ $age2female }}],
            ['30-39', {{ $age3male }} , {{ $age3female }}],
            ['40-49', {{ $age4male }} , {{ $age4female }}],
            ['50-59', {{ $age5male }} , {{ $age5female }}],
            ['60-69', {{ $age6male }} , {{ $age6female }}],
            ['70-79', {{ $age7male }} , {{ $age7female }}],
            ['80->',{{ $age8male }} , {{ $age8female }}],
        ]);

        var options = {
            title: 'Cantidad de casos positivos por edad',
            curveType: 'log',
            width: 380,
            height: 400,
            colors: ['#3366CC', '#CC338C'],
            legend: { position: 'bottom' },
            backgroundColor: '#f8fafc',
            chartArea: {'width': '85%', 'height': '80%'},
            hAxis: {
                textStyle : {
                    fontSize: 9 // or the number you want
                },
                textPosition: '50',
            },
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_ages'));

        chart.draw(data, options);
    }



    function drawChartEvolution() {
        var dataTable = new google.visualization.DataTable();
        dataTable.addColumn('number', 'Día');
        dataTable.addColumn('number', 'Positivos');
        // A column for custom tooltip content
        dataTable.addColumn({type: 'string', role: 'tooltip'});
        dataTable.addRows([
            @foreach($evolucion['Region'] as $key => $total)
                [{{ $loop->iteration }},{{ $total }},'{{ $key }} ({{ $total }})'],
            @endforeach
        ]);

        var options = {
            title: "Comportamiento de casos positivos en el tiempo",
            curveType: 'function',
            width: 380,
            height: 400,
            legend: { position: "none" },
            backgroundColor: '#f8fafc',
            hAxis: {
                textStyle : {
                    fontSize: 9 // or the number you want
                },
                gridlines:{count: {{ count($evolucion['Region']) }} },
                textPosition: '50',
            },
            chartArea: {'width': '85%', 'height': '80%'},

        };
        var chart = new google.visualization.LineChart(document.getElementById('evolution'));
        chart.draw(dataTable, options);
    }
</script>
@endsection
