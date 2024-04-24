@extends('layouts.plantilla')

@section('content')
<script>
function gestionPenalidades(){
$("#container-principal").addClass('d-none');
$("#contenpartes").removeClass('d-none');
}

</script>

<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 8px;
        text-align: left;
        position: relative; /* Necesario para el posicionamiento del efecto de sombra */
    }

    th {
        background-color: #f2f2f2;
    }

    /* Agregar el efecto de sombra */
    th:after, td:after {
        content: '';
        position: absolute;
        bottom: -3px; /* Controla la distancia entre el borde inferior y la sombra */
        left: 0;
        width: 100%;
        height: 3px; /* Controla la altura de la sombra */
        background: linear-gradient(to bottom, rgba(0,0,0,0.1) 0%,rgba(0,0,0,0) 100%);
    }
</style>


    <div class="container "id="container-principal">

        <div class="row justify-content-center">


        <div class=".col-12 .col-sm-6 .col-md-8">
            <div class="card" style="width: 100%;">
                <div class="card-body" style="padding: 1% 1% 3% 3%">
                    <div class="inner" bis_skin_checked="1" style="padding: 1% % 1% 0%" id="tipoPenalidades">
                        <table style="width: 100%">
                            <tr>
                                <td style="width: 3%; text-align:center; padding: 1% 1% 3% 0%; border-bottom: 1px solid black; padding: 8px;"><strong>cod</strong></td>
                                <td style="width: 87%; text-align:center; padding: 1% 1% 3% 0%; border-bottom: 1px solid black; padding: 8px;"><strong>TIPO DE PENALIDAD</strong></td>
                                <td style="width: 3%; text-align:center; padding: 1% 1% 3% 0%"></td>
                                <td style="width: 7%; text-align:center; padding: 1% 1% 3% 0%"><strong>ACCIÓN</strong></td>
                            </tr>
                            <tr>
                                <td>U.1.- </td>
                                <td>PENALIDAD POR INCORRECTA GESTIÓN DEL TRÁFICO EN EL CGT</td>
                                <td></td>
                                <td>
                                    <div style="text-align: right; padding: 0px 10px 10px 10px">
                                        <button type="button" onclick="goToHome1()" class="btn btn-success" style="text-align: right;">Ir</button>
                                    </div>
                                    <script>
                                        function goToHome1() {
                                            window.location.href = "{{ url('/penalidades/modulospenalizacion/modulospenalizacion1') }}";
                                        }
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td>U.2.- </td>
                                <td>PENALIDAD POR FALLOS EN LA DETECCIÓN DE INCIDENCIAS</td>
                                <td></td>
                                <td>
                                    <div style="text-align: right; padding: 0px 10px 10px 10px">
                                        <button type="button" onclick="goToHome2()" class="btn btn-success" style="text-align: right;">Ir</button>
                                    </div>
                                    <script>
                                        function goToHome2() {
                                            window.location.href = "{{ url('/penalidades/modulospenalizacion/modulospenalizacion2') }}";
                                        }
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td>U.3.- </td>
                                <td>PENALIDAD POR DEMORA EN LA REPARACIÓN DE AVERÍAS O POR REPETICIÓN DE ÉSTAS, TANTO EN PERÍODO DE GARANTÍA COMO DE CONSERVACIÓN</td>
                                <td></td>
                                <td>
                                    <div style="text-align: right; padding: 0px 10px 10px 10px">
                                        <button type="button" onclick="goToHome3()" class="btn btn-success" style="text-align: right;">Ir</button>
                                    </div>
                                    <script>
                                        function goToHome3() {
                                            window.location.href = "{{ url('/penalidades/modulospenalizacion/modulospenalizacion3') }}";
                                        }
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td>U.4.- </td>
                                <td>PENALIDAD POR DEFICIENTE CONSERVACIÓN</td>
                                <td></td>
                                <td>
                                    <div style="text-align: right; padding: 0px 10px 10px 10px">
                                        <button type="button" onclick="goToHome4()" class="btn btn-success" style="text-align: right;">Ir</button>
                                    </div>
                                    <script>
                                        function goToHome4() {
                                            window.location.href = "{{ url('/penalidades/modulospenalizacion/modulospenalizacion4') }}";
                                        }
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td>U.5.- </td>
                                <td>PENALIDAD POR DEMORA EXCESIVA EN LA REPARACIÓN DE COLISIONES</td>
                                <td></td>
                                <td>
                                    <div style="text-align: right; padding: 0px 10px 10px 10px">
                                        <button type="button" onclick="goToHome5()" class="btn btn-success" style="text-align: right;">Ir</button>
                                    </div>
                                    <script>
                                        function goToHome5() {
                                            window.location.href = "{{ url('/penalidades/modulospenalizacion/modulospenalizacion5') }}";
                                        }
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td>U.6.- </td>
                                <td>PENALIDAD POR DEMORA EXCESIVA EN LA REALIZACIÓN DE MODIFICACIONES Y NUEVAS INSTALACIONES</td>
                                <td></td>
                                <td>
                                    <div style="text-align: right; padding: 0px 10px 10px 10px">
                                        <button type="button" onclick="goToHome6()" class="btn btn-success" style="text-align: right;">Ir</button>
                                    </div>
                                    <script>
                                        function goToHome6() {
                                            window.location.href = "{{ url('/penalidades/modulospenalizacion/modulospenalizacion6') }}";
                                        }
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td>U.7.- </td>
                                <td>PENALIDAD POR FALTA DE DATOS O DATOS DEFECTUOSOS</td>
                                <td></td>
                                <td>
                                    <div style="text-align: right; padding: 0px 10px 10px 10px">
                                        <button type="button" onclick="goToHome7()" class="btn btn-success" style="text-align: right;">Ir</button>
                                    </div>
                                    <script>
                                        function goToHome7() {
                                            window.location.href = "{{ url('/penalidades/modulospenalizacion/modulospenalizacion7') }}";
                                        }
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td>U.8.- </td>
                                <td>PENALIDAD POR DEMORA EN LA REALIZACIÓN DE LOS TRABAJOS Y TAREAS ORDENADAS AL EQUIPO DE INGENIERÍA, EN LA REALIZACIÓN DE PRESUPUESTOS Y POR LA NO PRESENCIA DEL PERSONAL EN CASO DE LLAMADA O INCIDENCIAS</td>
                                <td></td>
                                <td>
                                    <div style="text-align: right; padding: 0px 10px 10px 10px">
                                        <button type="button" onclick="goToHome8()" class="btn btn-success" style="text-align: right;">Ir</button>
                                    </div>
                                    <script>
                                        function goToHome8() {
                                            window.location.href = "{{ url('/penalidades/modulospenalizacion/modulospenalizacion8') }}";
                                        }
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td>U.9.- </td>
                                <td>PENALIDAD POR INCUMPLIMIENTOS EN LA ACTUALIZACIÓN DE LOS PROGRAMAS Y APLICACIONES INSTALADOS EN EL CGT, EN LA ACTUALIZACIÓN DE EQUIPOS Y OTROS ELEMENTOS DEL SISTEMA, EN LA CARGA DE DATOS Y PROGRAMAS EN EQUIPOS DE REGULACIÓN Y LOS DEMÁS ELEMENTOS DEL SISTEMA DE GESTIÓN</td>
                                <td></td>
                                <td>
                                    <div style="text-align: right; padding: 0px 10px 10px 10px">
                                        <button type="button" onclick="goToHome9()" class="btn btn-success" style="text-align: right;">Ir</button>
                                    </div>
                                    <script>
                                        function goToHome9() {
                                            window.location.href = "{{ url('/penalidades/modulospenalizacion/modulospenalizacion9') }}";
                                        }
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td>U.10.- </td>
                                <td>PENALIDAD POR NO ACTUALIZAR DEBIDAMENTE EL INVENTARIO Y POR NO MANTENER LOS RECAMBIOS EXIGIDOS EN EL APARTADO 4.4 DEL PPT</td>
                                <td></td>
                                <td>
                                    <div style="text-align: right; padding: 0px 10px 10px 10px">
                                        <button type="button" onclick="goToHome10()" class="btn btn-success" style="text-align: right;">Ir</button>
                                    </div>
                                    <script>
                                        function goToHome10() {
                                            window.location.href = "{{ url('/penalidades/modulospenalizacion/modulospenalizacion10') }}";
                                        }
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td>U.11.- </td>
                                <td>PENALIDAD POR DEMORA EN LA PRESENTACIÓN DE LOS PARTES Y DEMÁS INFORMES REQUERIDOS</td>
                                <td></td>
                                <td>
                                    <div style="text-align: right; padding: 0px 10px 10px 10px">
                                        <button type="button" onclick="goToHome11()" class="btn btn-success" style="text-align: right;">Ir</button>
                                    </div>
                                    <script>
                                        function goToHome11() {
                                            window.location.href = "{{ url('/penalidades/modulospenalizacion/modulospenalizacion11') }}";
                                        }
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td>U.12.- </td>
                                <td>PENALIDAD POR FALTA DE CALIDAD DE LOS FOCOS O LÁMPARAS DE LEDS</td>
                                <td></td>
                                <td>
                                    <div style="text-align: right; padding: 0px 10px 10px 10px">
                                        <button type="button" onclick="goToHome12()" class="btn btn-success" style="text-align: right;">Ir</button>
                                    </div>
                                    <script>
                                        function goToHome12() {
                                            window.location.href = "{{ url('/penalidades/modulospenalizacion/modulospenalizacion12') }}";
                                        }
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td>U.13.- </td>
                                <td>PENALIDAD POR INCUMPLIMIENTOS DE LAS CONDICIONES ESPECIALES DE EJECUCIÓN DE CARÁCTER MEDIOAMBIENTAL</td>
                                <td></td>
                                <td>
                                    <div style="text-align: right; padding: 0px 10px 10px 10px">
                                        <button type="button" onclick="goToHome13()" class="btn btn-success" style="text-align: right;">Ir</button>
                                    </div>
                                    <script>
                                        function goToHome13() {
                                            window.location.href = "{{ url('/penalidades/modulospenalizacion/modulospenalizacion13') }}";
                                        }
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td>U.14.- </td>
                                <td>PENALIDAD POR INCUMPLIMIENTOS DE LAS CONDICIONES ESPECIALES DE EJECUCIÓN DE CARÁCTER SOCIAL</td>
                                <td></td>
                                <td>
                                    <div style="text-align: right; padding: 0px 10px 10px 10px">
                                        <button type="button" onclick="goToHome14()" class="btn btn-success" style="text-align: right;">Ir</button>
                                    </div>
                                    <script>
                                        function goToHome14() {
                                            window.location.href = "{{ url('/penalidades/modulospenalizacion/modulospenalizacion14') }}";
                                        }
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td>U.15.- </td>
                                <td>PENALIDAD POR INCUMPLIMIENTOS DE LAS EXIGENCIAS EN MATERIA DE TRATAMIENTO DE DATOS DE CARÁCTER PERSONAL</td>
                                <td></td>
                                <td>
                                    <div style="text-align: right; padding: 0px 10px 10px 10px">
                                        <button type="button" onclick="goToHome15()" class="btn btn-success" style="text-align: right;">Ir</button>
                                    </div>
                                    <script>
                                        function goToHome15() {
                                            window.location.href = "{{ url('/penalidades/modulospenalizacion/modulospenalizacion15') }}";
                                        }
                                    </script>
                                </td>
                            </tr>


                        </table>
                    </div>
                </div>
                <div style="text-align: right; padding: 0px 10px 10px 10px">
                    <button type="button" onclick="goToHome()" class="btn btn-secondary" style="text-align: right;">Volver</button>
                </div>
                <script>
                    function goToHome() {
                        window.location.href = "{{ url('/penalidades') }}";
                    }
                </script>
            </div>
        </div>


        </div>

    </div>

    <div class="container  d-none" id="contenpartes">



    </div>
@endsection
