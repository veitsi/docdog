<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>check your contract with DocDoge</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<?php include "header.html" ?>

<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Load samples</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Contract #1</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Contract #2</a></h4>
                            </div>
                        </div>
                    </div><!--/category-products-->

                    <div class="shipping text-center" style="margin-left: 15px"><!--shipping-->
                        <img src="images/docdoge-small.jpg" alt="check ya doc"/>
                    </div><!--/shipping-->
                    <div class="price-range"><!--price-range-->
                        <h2>level of deepness</h2>
                        <div class="well">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600"
                                   data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br/>
                            <b>$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range-->


                </div>
            </div>
            <div class="col-sm-9 padding-right">
                <div class="content"><!--send doc-->
                    <div class="col-sm-12">
                        <div id="reviews">
                            <div></div>
                            <div class="col-sm-12">
<!--                                <ul>-->
<!--                                    <li><a href=""><i class="fa fa-user"></i>anonymous</a></li>-->
<!--                                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>-->
<!--                                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>-->
<!--                                </ul>-->
                                <p><b>Введіть текст контракту</b></p>

                                <form id="docform">
                                    <textarea rows="5" id="input"                                         name="input"><?php require "sample01.txt"; ?></textarea>
<!--                                    <span>-->
<!--											<input type="text" placeholder="Your Name"/>-->
<!--											<input type="email" placeholder="Email Address"/>-->
<!--										</span>-->

                                    <button id="checkdoc" type="button" class="btn btn-default pull-right">
                                        перевірити
                                    </button>
                                </form>
                            </div>
                            <div id="results">
                                <br><center>обʼєкт для договору</center><br>
                                <textarea id="t0" name="t0"></textarea>
                                <br><center>мета заключення договору</center><br>
                                <textarea id="t1" name="t1"></textarea>
                                <br><center>вартість договору</center><br>
                                <textarea id="t2" name="t2"></textarea>
                                <br><center>період дії договору</center><br>
                                <textarea id="t3" name="t3"></textarea>
                                <br><center>відповідальність сторін</center><br>
                                <textarea id="t4" name="t4"></textarea>
                            </div>

                        </div>

                    </div>
                </div><!--/send-doc-->
            </div>
        </div>
    </div>
</section>

<?php include "footer.html" ?>

<script src="js/jquery.js"></script>
<script src="js/price-range.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
<script>
    $('#results').hide();
    $('#checkdoc').click(function () {
        console.log($('#input').val());
        $.post("core.php",{'input':$('#input').val()} , function(data, status){
            var targets = JSON.parse(data);
            console.log(targets);
            $('#t0').val(targets[0]);
            $('#t1').val(targets[1]);
            $('#t2').val(targets[2]);
            $('#t3').val(targets[3]);
            $('#t4').val(targets[4]);

            $('#results').show();
        });
    })
</script>
</body>
</html>