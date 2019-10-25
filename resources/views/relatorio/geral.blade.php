@extends('layouts.app')
<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8' />
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.1.0/echarts.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script>
    $(function(){

      'use strict'

      /**************** PIE CHART ************/
      var pieData = [{
        name: 'Necessidades',
        type: 'pie',
        radius: '80%',
        center: ['50%', '57,7%'],
        data: <?php echo json_encode($Data); ?>,
        label: {
          normal: {
            fontFamily: 'Relatóriooboto, sans-serif',
            fontSize: 11
          }
        },
        labelLine: {
          normal: {
            show: false
          }
        },
        markLine: {
          lineStyle: {
            normal: {
              width: 1
            }
          }
        }
      }];

      var pieOption = {
        tooltip: {
          trigger: 'item',
          formatter: '{a} <br/>{b}: {c} ({d}%)',
          textStyle: {
            fontSize: 11,
            fontFamily: 'Roboto, sans-serif'
          }
        },
        series: pieData
      };

      var pie = document.getElementById('chartPie');
      var pieChart = echarts.init(pie);
      pieChart.setOption(pieOption);
      /** making all charts responsive when resize **/
    });

  </script>
<body>
  @section('content')
  <hr>
  <h3>Relatório por Necessidades</h3>
  <h4>Filtro<h4>
    <form class="form-inline" metthod="POST" action="{{route('filtro_necessidades.pdf', 'selecionar.SelNecessidade')}}">
      @csrf
      <div class="form-group mb-2">
        <select name="SelNecessidade" class="form-control">
          <option value="" >Selecione</option>
          @foreach($necessidades as $itens)
          <option value="{{$itens->desc_necessidades}}" >{{$itens->desc_necessidades}}</option>
          @endforeach
        </select>
      </div>    
      <div class="form-group mx-sm-4 mb-2">
        <button type="submit" class="btn btn-primary">Filtrar</button>
      </div>
    </form>
    <br>
    <br>
    <div class="col-11" id="chartPie" style="height: 320px;"></div>

    <br>
    <br>
    <br>
    @endsection

  </body>
  </html>
