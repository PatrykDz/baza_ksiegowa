<script src="<?php echo(base_url().'assets/flot/')?>jquery.flot.min.js"></script>


<h2 class="sub-header" style="padding-left:10px">Statystyki</h2>






<!--

<div id="placeholder" style="width:600px;height:300px;"></div>

<p>Simple example. You don't need to specify much to get an
    attractive look. Put in a placeholder, make sure you set its
    dimensions (otherwise the plot library will barf) and call the
    plot function with the data. The axes are automatically
    scaled.</p>

<script type="text/javascript">
    $(function () {



        function findElement(arr, propName, propValue) {
            for (var i=0; i < arr.length; i++)
                if (arr[i][propName] == propValue)
                    return arr[i];

            return false;// will return undefined if not found; you could return a default instead
        }




        <?php
        /*
          //dane z php do javascript do pobierania ceny
          $js_array = json_encode($transakcje,JSON_UNESCAPED_UNICODE);
          echo "var transakcje = ". $js_array . ";\n";
        */
         ?>


        var rawData = [];




        for(var i=10;i<=100;i++){

            if(findElement(transakcje,"id_transakcji",i).data_sprzedazy){



                var date = new Date(findElement(transakcje,"id_transakcji",i).data_sprzedazy);



                var date = date.getTime();

                //alert(date);

                var row = [date];
                row.push(2*i);

            rawData.push(row);

            }
        }

        alert(rawData);




 /*
        var rawData = [
           // [1325347200000, 60], [1328025600000, 100], [1330531200000, 15], [1333209600000, 50]


            [1302238800000, 209.21], //Apr 8, 2011
            [1302843600000, 420.36], //Apr 15
            [1303448400000, 189.86], //4/22
            [1304053200000, 314.93], //4/29
            [1304658000000, 279.71], //5/6
            [1305262800000, 313.34], //5/13
            [1305867600000, 114.67], //5/20
            [1306472400000, 315.58], //5/27





            [data.getTime(), 315.58], //5/27
            [new Date().getTime(), 100]

  ];
*/


        var options = {
            xaxis: {
                mode: "time",
                timeformat: "%y/%m/%d"
            }
        }

        $.plot($("#placeholder"),[
            {
                data: rawData
            }
        ], options);



     /*   var data = [[-373597200000, 315.71], [-370918800000, 317.45], [-368326800000, 317.50],  [-99968400000, 319.79]];

        $.plot($("#placeholder"), data, {
            yaxis: {
            },

            xaxis: { mode: "time",minTickSize: [1, "day"],
                min: (new Date("2014/06/01")),
                max: Date.now()
            },
            "lines": {"show": "true"},
            "points": {"show": "true"},
            clickable:true,hoverable: true
        });

*/
    });
</script>


-->






<h2 class="sub-header" style="padding-left:10px">Export</h2>

<?php


echo anchor(site_url('statystyki/excel_export'),'Export do Excel 2003', array('class' => 'btn btn-default'));


?>