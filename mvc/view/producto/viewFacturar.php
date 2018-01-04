<?php
	session_start();
	$server =$_SERVER["HTTP_HOST"];
	$contexto = "http://" . $server ."/sisxtc";
	if(!isset($_SESSION['username'])){
		header("location:/sisxtc/index.php");
	}
	$usuario=$_SESSION['username'];
	$idusuario=$_SESSION['idusuario'];
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="ISO-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

		<link href="<?=$contexto?>/css/bootstrap3-dialog/css/bootstrap-dialog.css" rel="stylesheet" type="text/css" />


    <title>XTC Facturaci�n de productos</title>
    <link rel="shortcut icon" href="<?=$contexto?>/img/xtc.png" type="image/png">

    <!-- Bootstrap Core CSS -->
    <link href="<?=$contexto?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
     <link href="<?=$contexto?>/css/sb-admin.css" rel="stylesheet"> 
    <!-- Custom Fonts -->
    <link href="<?=$contexto?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <link href="<?=$contexto?>/css/jquery.fileupload.css" rel="stylesheet">
    <link href="<?=$contexto?>/css/jquery.dataTables.css" rel="stylesheet">
    <link href="<?=$contexto?>/css/jquery.dataTables_themeroller.css" rel="stylesheet">
    <link href="<?=$contexto?>/css/buttons.dataTables.min.css" rel="stylesheet">

    <link href="<?=$contexto?>/css/toastr.css" rel="stylesheet" type="text/css"/>
    <link href="<?=$contexto?>/js/datepicker/css/bootstrap-datepicker.css" rel="stylesheet" type="text/css"/>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/liibs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <img alt="xtc" src="<?=$contexto?>/img/xtc.png" width="65px"  style="padding-top: 10px;">
                     
                
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $usuario; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?=$contexto?>/logout.php"><i class="fa fa-fw fa-power-off"></i> Salir</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#producto"><i class="fa fa-fw fa-book"></i> Producto <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="producto" class="collapse">
                            <li>
                                <a href="<?=$contexto?>/mvc/view/producto/viewNuevo.php" ><i class="fa fa-fw fa-edit"></i> Registro</a>
                            </li>
                            <li>
                                <a href="<?=$contexto?>/mvc/view/producto/viewBuscar.php"><i class="fa fa-fw fa-search"></i> Buscar</a>
                            </li>
                             <li>
                                <a href="<?=$contexto?>/mvc/view/producto/viewFacturar.php"><i class="fa fa-fw fa-money"></i> Facturar</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    
                        <h1 class="page-header">
                            Facturaci�n de Productos
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> Producto
                            </li>
                            <li class="active">
                                <i class="fa fa-money"></i> Facturar
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                           <div class="form-group">
                                <label>Periodo Inicio</label>
                                <div class="input-group date" >
								    <input type="text" class="form-control" id="fhInicio" name="fhInicio">
								    <div class="input-group-addon">
								        <span class="glyphicon glyphicon-th"></span>
								    </div>
								</div>
                            </div>
                     </div>
                    <div class="col-lg-6">         
                            <div class="form-group">
                                <label>Periodo fin</label>
                            	<div class="input-group date">
								    <input type="text" class="form-control" id="fhfin" name="fhfin">
								    <div class="input-group-addon">
								        <span class="glyphicon glyphicon-th"></span>
								    </div>
								</div>
                            </div>

                    </div>
	          		 <div class="col-lg-12">
	                          <div class="form-group pull-right">
	                          		<label id="numProductos">#</label>
	                           		<button type="button" class="btn btn-success" 
	                           		style="cursor: pointer;" id="idBuscar" name="idBuscar">
	                           		<i class="fa fa-search" aria-hidden="true"></i>	                           		 
	                           		Buscar</button>
	                          </div>	
	    
	                 </div>   
                 </div>  
                 <div class="row">    
                  <div class="col-lg-12">
	                           <div class="form-group">
                        			<div class="panel panel-success">
                            			<div class="panel-heading">
			                                <h3 class="panel-title">Lista de Productos a Facturar</h3>
			                            </div>
			                            <div class="panel-body table-responsive" >
			                           			<table id="example"  class="display" cellspacing="0" width="100%">
					        						<thead>
														<tr>
															<th>#</th>
															<th>VERSI�N</th>
															<th>NOMBRE</th>
															<th>FABRICANTE</th>
															<th>EMBLEMA</th>
															<th>PRECIO</th>
															
																			
														</tr>
														
														</thead>
														    <tfoot>
															    <tr>
															                <th colspan="5" style="text-align:right">Total a facturar:</th>
															                <th></th>
															            </tr>
															    </tfoot>
					    							</table>
			                            </div>
                        			</div>
	                             </div>
                            </div>  
            
                  </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <div id="clock-loader" style="display: none;">				
		<div style="font-weight: bold; color: white; font-size: 12pt;">
			<img src="<?=$contexto?>/img/ajax-loader.gif" alt="" border="0" /><br>Procesando...
		</div>	
	</div>	
    
    <!-- Modal -->
<div class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body�</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

    <!-- Modal -->
<div class="modal fade" id="myModalFrame">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #428BCA; color:#FFF;  border-top-left-radius: 5px; border-top-right-radius: 5px; ">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
        <h4 class="modal-title">Vista del Producto</h4>
      </div>
      <div class="modal-body">
        <iframe src="" frameborder="0" id="targetiframe" style=" height:500px; width:100%;" name="targetframe" allowtransparency="true"></iframe> <!-- target iframe -->
      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

    <!-- jQuery -->
    <script src="<?=$contexto?>/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=$contexto?>/js/bootstrap.min.js"></script>
	
	<script src="<?=$contexto?>/js/toastr.min.js"></script>
	<script src="<?=$contexto?>/js/jquery.blockUI.js"></script>
	<script src="<?=$contexto?>/js/ajaxUtil.js"></script>
	<script src="<?=$contexto?>/js/jquery.dataTables.min.js"></script>
	<script src="<?=$contexto?>/js/dataTables.buttons.min.js"></script>
	<script src="<?=$contexto?>/js/dataTables.tableTools.js"></script>
	
	<script src="<?=$contexto?>/css/bootstrap3-dialog/js/bootstrap-dialog.js"></script>
	<script src="<?=$contexto?>/js/dataTables.tableTools.js"></script>
	<script src="<?=$contexto?>/js/datepicker/js/bootstrap-datepicker.js"></script>
	<script src="<?=$contexto?>/js/datepicker/locales/bootstrap-datepicker.es.min.js"></script>
	
	<script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
	
    <script type="text/javascript">
    $( document ).ready(function() {

		toastr.options = {
				"debug" : false,
				"positionClass" : "toast-top-full-width",
				"onclick" : null,
				"fadeIn" : 300,
				"fadeOut" : 1000,
				"timeOut" : 5000,
				"extendedTimeOut" : 1000,
			};


		$("#idBuscar").click(function(){
			buscar();});

		$("#idReporte").click(function(){
			var params=	$('#fhInicio').serialize()+"&"+$('#fhfin').serialize(); 
			parent.location.href="controller/ctrlExcelReporte.php?"+params;
		});

		

		$('#fhInicio').datepicker({autoclose: true,format: 'yyyy/mm/dd',language:'es'});
		$('#fhfin').datepicker({autoclose: true,format: 'yyyy/mm/dd',language:'es'});
		$("#fhInicio").datepicker("setDate", new Date());
		$("#fhfin").datepicker("setDate", new Date());

		crearTablaBusqueda();
		
		$("#idBuscar").click();
		

	});
    function getFormattedDate() {
        var todayTime = new Date();
        var month = format(todayTime .getMonth() + 1);
        var day = format(todayTime .getDate());
        var year = format(todayTime .getFullYear());
        return month + "/" + day + "/" + year;
    }
	

    function crearTablaBusqueda(){

    	
    	t=$('#example').dataTable({
            dom: 'Bfrtip',
            buttons: [
                 	{
																			
							extend : 'excel',
							header : true,
							filename : 'XTC_FACTURA _'+  new Date().getDate()  + "-" + (new Date().getMonth()+1) + "-" + new Date().getFullYear(),
							text : "<i class='fa fa-file-excel-o' title='Exportar reporte a Excel...'></i>",
							key : {
									key : "p",
									altkey : true
									},
									orientation : 'landscape',
									pageSize : 'LETTER'
																			
					},
					,
					{
						extend : 'pdf',
						filename : 'XTC_FACTURA _'+ +  new Date().getDate()  + "-" + (new Date().getMonth()+1) + "-" + new Date().getFullYear(),
						text : "<i class='fa fa-file-pdf-o' title='Exportar reporte a Pdf...'></i>",
						//Ajusta la tabla al ancho de la p�gina	del pdf
						customize : function(
								doc) {
							doc.content[1].table.widths = "*"
						},
					
						key : {
							key : "p",
							altkey : true
						},
						orientation : 'landscape',
						pageSize : 'LETTER'
					}
            ],
    		"processing": true,
            "serverSide": false,
    		"ajax": "controller/ctrlFacturar.php?",
    		"info" : false,
    		"bAutoWidth": false,
    		"bFilter" : true,	
    		"bLengthChange": true,
    		"paging" : true,
    		"iDisplayLength": 65,
    		"oLanguage" : {
    			"oPaginate" : {
    				"sPrevious" : "<i class='fa fa-arrow-left'></i>",
    				"sNext" : "<i class='fa fa-arrow-right'></i>"
    			},
    			"sInfo":" ",
    			"sLoadingRecords" : "Cargando datos...",
    			"sSearch" : "Buscar",
    			"sProcessing": "Procesando..." ,
    			"sEmptyTable" : "No existen registros para mostrar"
    		},		    		
    		"aaSorting" : [[5, 'desc']],					
    		"columns": [    		    
    		    	{
    		    		    "visible": true,
    	                    "searchable": true,
    	                    "width": "5%"	
    	                    
       			 	},    		    	
       			 	{
		    		    "visible": true,
	                    "searchable": true,
	                    "width": "5%"	
	                    
   			 	},
       			 {
    				
                    "visible": true,
                    "searchable": true			                
               	},
    		    {
               		//"width": "5%",
                    "visible": true,
                    "searchable": true			                
               	},
    		    {
               		//"width": "5%",
                    "visible": true,
                    "className": 'dt-body-center',
                    "searchable": true			                
               	},		   
               	 {
               		//"width": "5%",
                    "visible": true,
                    "className": 'dt-body-center',
                    "searchable": true			                
               	}
               	
           	],
           	"footerCallback": function ( row, data, start, end, display ) {
                                
                var api = this.api();
                var COLNUMBER=5;
                // Remove the formatting to get integer data for summation
                var intVal = function ( i ) {
     
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '')*1 :
                        typeof i === 'number' ?
                            i : 0;
                             
                };
      
                // Total over all pages
     
                    if (api.column(COLNUMBER).data().length){
                    var total = api
                    .column( COLNUMBER )
                    .data()
                    .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                    } ) }
                    else{ total = 0};
                     
      
                // Total over this page
                 
                if (api.column(COLNUMBER).data().length){
                var pageTotal = api
                    .column( COLNUMBER, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    } ) }
                    else{ pageTotal = 0};
      
                // Update footer
                $( api.column(COLNUMBER).footer() ).html(
                    '$'+pageTotal
                );
                
              }               
               			           			       			        
        });



    }

    function editarProducto(idproducto){
    	parent.location.href="viewEditar.php?idproducto="+idproducto;
    }

    function eliminarProducto(idproducto){
        BootstrapDialog.show({
            title: 'Eliminar producto',
            message: '�Esta seguro que quiere eliminar el producto?',
            buttons: [{
                label: 'Cancelar',
                cssClass:"btn-danger",
                action: function(dialog) {
                	dialog.close();
                }
            }, {
                label: 'OK',
                cssClass:"btn-success",
                action: function(dialog) {

                	var params="idproducto="+idproducto;
                	$.ajaxSetup ({ cache: false });
                	//ajax para eliminar producto
                	$.ajax('<?=$contexto?>/mvc/view/producto/controller/ctrlBorrarProducto.php', {
                	  	  type: 'POST', 
                	  	  data:params,
                	  	   beforeSend: function( xhr ) {
                		       showloading();
                	  	  },
                	      success: function(data) {
								//alert(data);
                	    	
                	    	  if(data == 1 ){
                	    		  toastr.success("Exito al borrar producto!");
                	    		  reloadTable();
                	    		  
                		      }else{
                		    	  toastr.error('ERROR al borrar producto!');
                			     }
                	    	  
                	       	},
                	      error: function(jqXHR, textStatus, errorThrown) {
                	    	  toastr.error('ERRORS: ' + textStatus);
                	      },
                	      complete: function() {
                	          hideloading();                	          
                	          dialog.close();
                	      }
                	   });
                    
                }
            }]
        });
    } 


    function reloadTable(){
    	var params=	$('#fhInicio').serialize()+"&"+$('#fhfin').serialize(); 
    	showloading();
    	$.ajaxSetup ({ cache: false });
     	$("#example").DataTable().ajax.url( "controller/ctrlFacturar.php?"+params ).load();
     	$("#numProductos").html("N�mero de productos: "+$('#example tbody tr').length);
     	hideloading();

    }

    function buscar(){
    	reloadTable();
    	

    }



    function previewProducto(idproducto){

    	
    	    var src = "viewProducto.php?idproducto="+idproducto;
    	    var height = $(this).attr('data-height') || 250;
    	    var width = $(this).attr('data-width') || 400;
    	    
    	    $("#targetiframe").attr({'src':src,
    	                        'height': height,
    	                        'width': width});
    

    	
    }

    $( "#example" ).mouseover(function() {
    	 $("#numProductos").html("N�mero de productos: "+$('#example tbody tr').length);
   	});
    	



    
    </script>

</body>

</html>
