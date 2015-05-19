@extends('layout.master')

@section('header')
@stop
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Om ebba</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Om ebba
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#home" data-toggle="tab">Information</a>
                                    </li>
                                    <li><a href="#profile" data-toggle="tab">Lager</a>
                                    </li>
                                    <li><a href="#messages" data-toggle="tab">Chaufför</a>
                                    <li><a href="#symbols" data-toggle="tab">Symboler</a>
                                    </li>

                                </ul>

                                <!-- Tab panes -->

                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="home">
                                        <br>
                                        <h4>Information</h4>
                                        <p>Ebba är ett system som syftar till att hjälpa RORO Glass AB i sin dagliga verksamhet. Genom smarta lösningar och funktioner för de anställda skall systemet hjälpa till att spara tid för företaget.
                                        <br><br>
                                        I de andra flikarna i menyn kan du läsa om systemets alla funktioner.
                                        </p>
                                    </div>
                                    <div class="tab-pane fade" id="profile">
                                        <br>
                                        <h4>Lager</h4>
                                        <p>Nedan följer 3 alternativ som du säkert känner igen från menyn i systemet. Har du funderingar på hur du skall gå tillväga rekommenderar vi att du kikar extra på rubrikerna nedan, skulle det mot förmodan inte fungera ber vi dig kontakta vår support.
                                        <br><br>
                                        Tel: +46736438848
                                        <br><br>
                                        <strong>Inleverans:</strong><br>
                                        Syftar till att få in produkter i systemet.
                                        <br><br>
                                        1.  Tryck på denna gröna knappen > Lägg till > Välj antal > Tryck OK<br>
                                        2.  Nu ser du i tabellen till höger att du lagt till den produkt du valt. Upprepa nu processen tills du är klar med din inleverans.<br>
                                        3.  När du är färdig trycker du på KLAR i den högra tabellen.<br>
                                        4.  Du har nu fört in de produkter du valt i systemet och till huvudlagret.<br>
                                        <br><br>
                                        <strong>Packa bil:</strong><br>
                                        Syftar till att placera dina produkter i de bilar som finns tillgängliga.<br>

                                        1.  Välj vilken enhet du vill ta produkter ifrån samt till vilken enhet du vill lämna produkter till. Tryck sedan KLAR.<br>
                                        2.  Därefter lägger du till de produkter du vill flytta från den vänstra tabellen. Du kommer se vilka produkter du valt att lägga till i den högra tabellen.<br>
                                        3.  När du sedan flyttat dina produkter trycker du klar.<br>
                                        <br><br>
                                        <strong>Saldo:</strong><br>
                                        Syftar till att se lagerstatus på en specifikvara.<br>
                                        1.  Du kan snabbmarkera enhet och vilken grupp av vara genom de två alternativen över boxen.<br>
                                        2.  Du kan även söka på en specifik vara genom att skriva in artikelnummer eller namn.
                                        </p>
                                    </div>
                                    <div class="tab-pane fade" id="messages">
                                        <br>
                                        <h4>Chaufför</h4>
                                        <p>Nedan följer 3 alternativ som du säkert känner igen från menyn i systemet. Har du funderingar på hur du skall gå tillväga rekommenderar vi att du kikar extra på rubrikerna nedan, skulle det mot förmodan inte fungera ber vi dig kontakta vår support.
                                        <br><br>
                                        Tel: +46736438848
                                        <br><br>
                                        <strong>Runda</strong><br>
                                        Du kommer när du väljer runda att mötas av 3 steg. Nedan förklaras de tre stegens betydelse.<br><br>
                                        1.  Välj först den runda som du vill köra. Efter detta valet måste du avsluta rundan för att kunna köra en ny runda.<br>
                                        2.  Du kommer i det andra steget kunna lägga till och ta bort kunder till just denna rundkörning ifall det skulle behövas. När du lägger till kund kommer systemet fråga efter när du tänker köra till kunden för att få kunderna i ordning i den lista som sedan skapas.
                                        </p>
                                    </div>
                                    <div class="tab-pane fade" id="symbols">
                                    <br>
                                    <h4>Symboler för Menyn</h4>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Symbol</th>
                                                        <th>Information</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="center fabig"><i class="fa fa-home fa-fw"></i></td>
                                                        <td>Symbolen för lager i form av ett hus syftar till att beskriva att du är i lagret.</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="center fabig"><i class="fa fa-long-arrow-right fa-fw"></i></td>
                                                        <td>Pilen som riktar sig till höger betyder att du levererar in produkter i ebba. Dessa produkter hamnar i  huvudlager.</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="center fabig"><i class="fa fa-truck fa-fw"></i></td>
                                                        <td>I form av en bil betyder det att varorna skall i sitt flöde packas in i bilarna.</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="center fabig"><i class="fa fa-bar-chart-o fa-fw"></i></td>
                                                        <td>Symbolen syftar till mätningar. I detta fall rör det sig om mätningar för produkternas saldo värde.</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="center fabig"><i class="fa fa-truck fa-fw"></i></td>
                                                        <td>Bilen återkommer eftersom den är chaufförens verktyg att ta sig till sina kunder.</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="center fabig"><i class="fa fa-rotate-right fa-fw"></i></td>
                                                        <td>I form av en halvcirkel med pil. Syftar till att beskriva att någonting måste göras innan du kan leverera ut.</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="center fabig"><i class="fa fa-long-arrow-left fa-fw"></i></td>
                                                        <td>Pil till vänster. En förlängning av halvcirkeln och menar att du nått fram till den stund där produkterna skall leveraras ut.</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="center fabig"><i class="fa fa-group fa-fw"></i></td>
                                                        <td>Symbolen vill visa på mänskligkontakt. Att du under kunder kan se mer information om just dina kunder.</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <h4>Symboler för Systemet</h4>
                                            <table class="table table-striped table-bordered table-hover">   
                                                <thead>
                                                    <tr>
                                                        <th>Symbol</th>
                                                        <th>Information</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="center fabig"><i class="glyphicon glyphicon-pencil btn btn-warning"></i></td>
                                                        <td>I form av pennan som visar sig i den gula texten skall det framgå att man vill redigera eller uppdatera värdet för den tillagda produkten. Färgen gul visar också att det inte är helt färdigställt.</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="center fabig"><i class="glyphicon glyphicon-remove btn btn-danger"></i></td>
                                                        <td>Ett kryss i en röd ruta skall symbolisera ”Ta bort”. Meningen är att det skall framgå med den röda färgen ”Stopp” och kryss ”ta bort”.</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="center fabig"><p class="btn btn-success plus"><i class="fa fa-plus"></i></p></td>
                                                        <td>Ett plus i en grön ruta skall symbolisera ”lägg till”. Den gröna färgen syftar till att ”det är ok” och plus-symbolen skall förtydliga budskapet.</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="center fabig"><p class="btn btn-info"><i class="fa fa-truck"></i> ...</i></p></td>
                                                        <td>En blå symbol med en bil som kör syftar till att få användaren att köra sin runda. Den blåa färgen symboliserar kunder i en röd tråd.</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="center fabig"><i class="btn btn-info fa fa-eye"></i></td>
                                                        <td>En blå box med ett öga i. Syftar till att beskriva orden ”se mer om kunden” vilket också händer om man trycker på den.</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="center fabig blue"><i class="fa fa-comment"></i></td>
                                                        <td>I form av en tom ”pratbubbla” skall det symbolisera att det finns ett meddelande hos kunden. </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="center fabig blue"><i class="fa fa-file-text-o"></i></td>
                                                        <td>I form av en ”Fil-symbol” betyder det att kunden i fråga är en beställningskund. Det betyder att det bör finnas en beställning till kunden.</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="center fabig blue"><i class="fa fa-phone"></i></td>
                                                        <td>I form av en telefon symbol betyder det att kunden i fråga är en ”ring kund” som skall ringas till innan rundan påbörjas.</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
            </div>
            <!--/.Row -->      
</div>
<!-- /.page-wrapper -->


@stop
@section('footer')
@stop