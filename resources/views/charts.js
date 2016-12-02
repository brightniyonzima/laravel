<?php
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
  });

/*$(function() {
    'use strict';    

        console.log('the file');

    xxfirebaseDumpThen( aggregateHoH );

    function firebaseDumpThen( callback, data ) {
        console.log('inside firebaseDumpThen');

        var fbURL = "https://blinding-fire-5613.firebaseio.com/-KJ55B07xbjg8Y5xDUkz.json?print=pretty";
        $.get(fbURL, function(received_json) {

            callback.call(this, received_json);

        }, "json");
    }

    function aggregateHoH( data_object ) {// HoH = Head of Household

        console.log('inside aggregateHoH');

        var males = "1";
        var females = "2";

        var nMaleHeadedFamilies = 0;
        var nFemaleHeadedFamilies = 0;

        var this_db_row;

        var db_rows = alasql('select qq1_1a, count(qq1_1a) as tot from ? group by qq1_1a', [data_object.answers]);
        
            for (var i = 0; i < db_rows.length; i++) {
                this_db_row = db_rows[i];

                if(this_db_row["qq1_1a"] == males)
                    nMaleHeadedFamilies = this_db_row["tot"];

                if(this_db_row["qq1_1a"] == females)
                    nFemaleHeadedFamilies = this_db_row["tot"];
            }

        console.log( 'alaSQL returned:' );
        console.log( JSON.stringify(db_rows, null, 4) );

        console.log( 'nMaleHeadedFamilies = ' + nMaleHeadedFamilies);
        console.log( 'nFemaleHeadedFamilies = ' + nFemaleHeadedFamilies);

        make_pie_chart('Gender of heads of households','Gender',['male','female'],[nMaleHeadedFamilies,nFemaleHeadedFamilies]);

    }

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
});*/