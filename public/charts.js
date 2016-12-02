/*<?php
  $sql="select * from users";
  $result=\DB::select($sql);
?>
console.log('here');
  var chart = new Highcharts.Chart({
    chart:{
        renderTo:'container'
    },
    series:[{
        data:[<?php echo join($result,',') ?>],
        pointStart:0,
        pointinterval
    }]
  });*/

$(function() {
    'use strict';    

        console.log('the file');
    function make_pie_chart(title_text, series_name, labels_arr[],numbers_arr[]) {

        console.log('inside make_pie_chart');

        $('#piechart').highcharts({
         chart: {
             plotBackgroundColor: null,
             plotBorderWidth: null,
             plotShadow: false,
             type: 'pie'
         },
         title: {
             text: title_text
         },
         tooltip: {
             pointFormat: '{point.y}<b></b>'
         },
         plotOptions: {
             pie: {
                 allowPointSelect: true,
                 cursor: 'pointer',
                 dataLabels: {
                     enabled: true,
                     format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                     style: {
                         color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                     }
                 },
                 showInLegend: true
             }
         },
         series: [{
             name: series_name,
             colorByPoint: true,
             data: getData()
         }]
     });


        function getData(labels_arr, numbers_arr) {
        // input = 2 arrays: an array of strings(labels) and an array of numbers (shares)
        // output = an array in this format => [{name:'wdj',y:30},{name:'kdk',y:19}]

        console.log('inside getData');

        var pie = [];
        var slice = {};

        for (var i = 0; i < numbers_arr.length; i++) {
                //numbers_arr[i]

                slice = { 
                    name : labels_arr[i],
                    y: numbers_arr[i]
                };

                pie.push(slice);

            }

            return pie;
        }
    }
});