<?php
//Generales
define("DIRECCION2", ""); // Tipo String, Longitud 40
define("DIRECCION3", ""); // Tipo String, Longitud 40
define("PAIS", "169"); // Tipo String, Longitud 3
define("BARRIO", ""); // Tipo String, Longitud 40
define("FAX", "1"); // Tipo String, Longitud 20
define("SUCURSALCLIENTE", "001"); //Tipo String, Longitud 3
define("VACIOSTRING", "");
define("VACIONINT", 0);
define("LINEAINICIO", "000000100000001001");
define("SINSECUENCIA", "0000003");
define("SECUENCIAFIN", 0);
define("LINEAFIN", "99990001001");

//Tercero
define("INICIOTERCERO", "0000002020000080011");
define("CODIGOVERIFICAICON", ""); // Tipo String, Longitud 3
define("TIPOIDENTIFICACION", "C"); // Tipo String, Longitud 1
define("TIPOTERCERO", 1); // Tipo Int, Longitud 1
define("RAZONSOCIAL", ""); // Tipo String, Longitud 100
define("INDICADORTERCEROCLIENTE", 1); // Tipo Int, Longitud 1
define("INDICADORTERCEROPROVEEDOR", 0); // Tipo Int, Longitud 1
define("INDICADORTERCEROEMPLEADO", 0); // Tipo Int, Longitud 1
define("INDICADORTERCEROACCIONISTA", 0); // Tipo Int, Longitud 1
define("INDICADORTERCEROOTROS", 0); // Tipo Int, Longitud 1
define("INDICADORTERCEROINTERNO", 0); // Tipo Int, Longitud 1
define("CODIGOPOSTAL", "0"); // Tipo String, Longitud 10
define("CODIGOACTIVIDADECONOMICA", ""); // Tipo String, Longitud 4
define("INDICADORNODOMICILIADO", "0"); // Tipo String, Longitud 1
define("INDICADORESTADO", "1"); // Tipo String, Longitud 1
define("EMAIL2", ""); // Tipo String, Longitud 50

//Sucursal
define("INICIOSUCURSAL", "0000002020100130010");
define("ESTADOCLIENTE", 1); //Tipo Int, Longitud 1
define("MONEDA", "COP"); //Tipo String, Longitud 3
define("CODIGOVENDEDOR", "9999"); //Tipo String, Longitud 4
define("CALIFICACION", "A"); //Tipo String, Longitud 1
define("CONDICIONPAGO", "   "); //Tipo String, Longitud 3
define("DIASGRACIA", 0); //Tipo Int, Longitud 4
define("CUPOCREDITO", 0); //Tipo Int, Longitud 20
define("CODIGOCLIENTECORP", ""); //Tipo String, Longitud 15
define("SUCURSALCLIENTECORP", ""); //Tipo String, Longitud 3
define("TIPOCLIENTE", "0001"); //Tipo String, Longitud 4
define("GRUPODESCUENTO", ""); //Tipo String, Longitud 4
define("LISTAPRECIOS", ""); //Tipo String, Longitud 3
define("INDICADORBACKORDER", 0); //Tipo Int, Longitud 1
define("PORCENTAJEMAXIMO", 0); //Tipo Int, Longitud 7
define("PORCENTAJEMARGENMAXIMO", 0); //Tipo Int, Longitud 7
define("PORCENTAJEMARGENMINIMO", 0); //Tipo Int, Longitud 7
define("INDICADORBLOQUEADO", 1); //Tipo Int, Longitud 1
define("INDICADORBLOQUEADOCUPO", 0); //Tipo Int, Longitud 1
define("INDICADORBLOQUEADOMORA", 0); //Tipo Int, Longitud 1
define("INDICADORFACTURAUNIFICADA", 0); //Tipo Int, Longitud 1
define("CODIGOCOBRADOR", "9999"); //Tipo String, Longitud 4

//Impuesto
define("NUMEROREGISTRO", "");
define("INICIOIMPUESTO1", "0000002000");
define("INICIOIMPUESTO2", "00010011");
define("TIPOREGISTRO1", "0046"); // Tipo Int, Longitud 4
define("TIPOREGISTRO2", "0047"); // Tipo Int, Longitud 4
define("CLASEIMPUESTO1", "001"); // Tipo String, Longitud 3
define("CLASEIMPUESTO2", "001"); // Tipo String, Longitud 3
define("CLASEIMPUESTO3", "002"); // Tipo String, Longitud 3
define("CLASEIMPUESTO4", "003"); // Tipo String, Longitud 3
define("CLASEIMPUESTO5", "085"); // Tipo String, Longitud 3
define("CONFIGURACIONTERCERO1", "01"); // Tipo String, Longitud 2
define("CONFIGURACIONTERCERO2", "00"); // Tipo String, Longitud 2

//Dian
define("INICIODIAN", "075307030011");
define("RESERVADODIAN", ""); // Tipo String, Longitud 185
define("CODIGOGRUPOENTIDAD", "FE REGIMEN/COD OBLIGACION DIAN"); // Tipo String, Longitud 30
define("CODIGOENTIDAD1", "EUNOECO003"); // Tipo String, Longitud 30
define("CODIGOENTIDAD2", "EUNOECO012"); // Tipo String, Longitud 30
define("CODIGOENTIDAD3", "EUNOECO017"); // Tipo String, Longitud 30
define("CODIGOENTIDAD4", "EUNOECO017"); // Tipo String, Longitud 30
define("CODIGOENTIDAD5", "EUNOECO031"); // Tipo String, Longitud 30
define("CODIGOATRIBUTO1", "co003_codigo_regimen"); // Tipo String, Longitud 30
define("CODIGOATRIBUTO2", "co012_cod_tipo_oblig"); // Tipo String, Longitud 30
define("CODIGOATRIBUTO3", "co017_codigo_regimen"); // Tipo String, Longitud 30
define("CODIGOATRIBUTO4", "co017_cod_tipo_oblig"); // Tipo String, Longitud 30
define("CODIGOATRIBUTO5", "co031_detalle_tributario5"); // Tipo String, Longitud 30
define("INFONUMERICAENTIDAD", 0); // Tipo Int, Longitud 20
define("INFOTIPOTEXTOENTIDAD", ""); // Tipo String, Longitud 200
define("INFOTIPOFECHAENTIDAD", ""); // Tipo String, Longitud 8
define("CODIGOMAESTRO1", "MUNOECO006"); // Tipo String, Longitud 10
define("CODIGOMAESTRO2", "MUNOECO011"); // Tipo String, Longitud 10
define("CODIGOMAESTRO3", "MUNOECO016"); // Tipo String, Longitud 10
define("CODIGOMAESTRO4", "MUNOECO019"); // Tipo String, Longitud 10
define("CODIGOMAESTRO5", "MUNOECO035"); // Tipo String, Longitud 10
define("DETALLEMAESTRO1", "0"); // Tipo String, Longitud 10
define("DETALLEMAESTRO2", "O-12"); // Tipo String, Longitud 20
define("DETALLEMAESTRO3", "49"); // Tipo String, Longitud 20
define("DETALLEMAESTRO4", "R-99-PN"); // Tipo String, Longitud 20
define("DETALLEMAESTRO5", "ZY"); // Tipo String, Longitud 20
define("CODIGOMAESTROINTERNO", "M200"); // Tipo String, Longitud 8

?>


