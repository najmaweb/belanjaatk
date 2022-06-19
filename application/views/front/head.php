    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Belanja ATK Surabaya,Peralatan Kantor Surabaya,Kertas,Alat tulis Surabaya, Toko Alat Tulis Surabaya, Tinta Printer Surabaya, Stofmap Surabaya, Beli Buku Tulis Surabaya, Ballpoint Surabaya, Pensil Surabaya, Grosir alat tulis Surabaya">
    <meta name="description" content="belanja peralatan kantor">
    <meta name="author" content="belanja atk">
    <title><?php echo $title;?></title>
    <link href="/assets/eshopper/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/eshopper/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/eshopper/css/prettyPhoto.css" rel="stylesheet">
    <link href="/assets/eshopper/css/price-range.css" rel="stylesheet">
    <link href="/assets/eshopper/css/animate.css" rel="stylesheet">
	<link href="/assets/eshopper/css/main.css" rel="stylesheet">
    <link href="/assets/eshopper/css/belanja.css" rel="stylesheet">
	<link href="/assets/eshopper/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/assets/eshopper/js/html5shiv.js"></script>
    <script src="/assets/eshopper/js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="/assets/eshopper/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/eshopper/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/eshopper/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/eshopper/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/assets/eshopper/images/ico/apple-touch-icon-57-precomposed.png">
    <script src="/assets/eshopper/js/jquery.js"></script>
	<script src="/assets/eshopper/js/price-range.js"></script>
    <script src="/assets/eshopper/js/jquery.scrollUp.min.js"></script>
	<script src="/assets/eshopper/js/bootstrap.min.js"></script>
    <script src="/assets/eshopper/js/jquery.prettyPhoto.js"></script>
    <script src="/assets/eshopper/js/main.js"></script>
	<script src="/assets/radu.js"></script>
	<script>
			$(document).ready(function(){
				$("#btnsearch").keyup(function(e){
                    var code = e.which; // recommended to use e.which, it's normalized across browsers
                    if(code==13)e.preventDefault();
                    if(code==13||code==188||code==186){//(code==32||code==13||code==188||code==186)
                        //alert(encodeURIComponent($("#btnsearch").val()));
                        _param = encodeURIComponent($("#btnsearch").val());
                        //_param = $("#btnsearch").val();
                        window.location.href = "/home/result/"+_param;
                    } // missing closing if brace
					
				});
			});

</script>