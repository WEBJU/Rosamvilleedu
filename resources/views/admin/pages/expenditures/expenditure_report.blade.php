@extends('admin.index')
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-body">
                        <canvas id="canvas" height="280" width="600"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var url="{{ url('/expenditure/chart') }}"
        var expenditures_type=new Array();
        var Amount=new Array();
        var labels=new Array();
        $(document).ready(function(){
            $.get(url,function(response){
                response.forEach(function(data){
                    Amount.push(data.amount_spend);
                    expenditures_type.push(data.expenditure_type);
                });
                var ctx=document.getElementById('canvas').getContext('2d');
                var myChart=new Chart(ctx,{
                    type:'bar',
                    data:{
                        labels:expenditures_type,
                        datasets:[{
                            label:'Expenditures Cost',
                            data:Amount,
                            borderWidth:1
                       }]
                         },
                    options:{
                        scales:{
                            yAxes:[{
                                ticks{
                                beginAtZero:true
                            }
                            }]
                        }
                    }
                });
                });
            });
        });
    </script>
@endsection