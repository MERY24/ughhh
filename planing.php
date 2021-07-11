<?php

require_once('bdd.php');


$sql = "SELECT id, title, start, end, color FROM events ";


$req = $bdd -> prepare($sql);
$req->execute();

$events = $req->fetchAll();

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Calendrier</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- FullCalendar -->
    <link href='css/fullcalendar.css' rel='stylesheet' />


    <!-- Custom CSS -->

</head>

<body>
<div class="container">

    <div id="calendar" class="col-md-12">
    </div>

    <!-- /.row -->

    <!-- Modal -->
    <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" method="POST" action="addEvent.php">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Ajout Examen</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Module</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control" id="title" placeholder="Module">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="color" class="col-sm-2 control-label">Couleur</label>
                            <div class="col-sm-10">
                                <select name="color" class="form-control" id="color">
                                    <option value="">Sélectionner</option>
                                    <option style="color:#0071c5;" value="#0071c5">&#9724; bleu</option>
                                    <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turqoise</option>
                                    <option style="color:#008000;" value="#008000">&#9724; vert</option>
                                    <option style="color:#FFD700;" value="#FFD700">&#9724; jaune</option>
                                    <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                                    <option style="color:#FF0000;" value="#FF0000">&#9724; Rouge</option>
                                    <option style="color:#000;" value="#000">&#9724; Noir</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="start" class="col-sm-2 control-label">Date Début</label>
                            <div class="col-sm-10">
                                <input type="text" name="start" class="form-control" id="start" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="end" class="col-sm-2 control-label">Date Fin</label>
                            <div class="col-sm-10">
                                <input type="text" name="end" class="form-control" id="end" readonly>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" method="POST" action="editEventTitle.php">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Modifier l'examen</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Module</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control" id="title" placeholder="Module">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="color" class="col-sm-2 control-label">Couleur</label>
                            <div class="col-sm-10">
                                <select name="color" class="form-control" id="color">
                                    <option value="">Sélectionner</option>
                                    <option style="color:#0071c5;" value="#0071c5">&#9724; bleu</option>
                                    <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turqoise</option>
                                    <option style="color:#008000;" value="#008000">&#9724; vert</option>
                                    <option style="color:#FFD700;" value="#FFD700">&#9724; jaune</option>
                                    <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                                    <option style="color:#FF0000;" value="#FF0000">&#9724; Rouge</option>
                                    <option style="color:#000;" value="#000">&#9724; Noir</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label class="text-danger"><input type="checkbox"  name="delete"> Supprimer l'examen</label>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="id" class="form-control" id="id">


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<script src="js/jquery.js"></script>

<!-- Bootstrap JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- FullCalendar -->
<script src='js/moment.min.js'></script>
<script src='js/fullcalendar/fullcalendar.min.js'></script>
<script src='js/fullcalendar/fullcalendar.js'></script>
<script src='js/fullcalendar/locale/fr.js'></script>


<script>

    $(document).ready(function() {

        var date = new Date();
        var yyyy = date.getFullYear().toString();
        var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
        var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();

        $('#calendar').fullCalendar({
            plugins: [ 'dayGridPlugin', 'timeGridPlugin', 'listPlugin' ],
            height: 600,
            header:{
                language:'fr',
                left:'prev,next today',
                center:'title',
                right:'month,agendaDay,agendaWeek'
            },
            buttonText:{
                today: 'Aujourd\'hui',
                day: 'jour',
                month: 'Mois',
                week: "Semaine",
                list: 'Listes'
            },
            defaultDate: yyyy+"-"+mm+"-"+dd,





            events: [
                <?php foreach($events as $event):

                $start = explode(" ", $event['start']);
                $end = explode(" ", $event['end']);
                if($start[1] == '00:00:00'){
                    $start = $start[0];
                }else{
                    $start = $event['start'];
                }
                if($end[1] == '00:00:00'){
                    $end = $end[0];
                }else{
                    $end = $event['end'];
                }
                ?>
                {
                    id: '<?php echo $event['id']; ?>',
                    title: '<?php echo $event['title']; ?>',
                    start: '<?php echo $start; ?>',
                    end: '<?php echo $end; ?>',
                    color: '<?php echo $event['color']; ?>',
                },
                <?php endforeach; ?>
            ]
        });



    });

</script>

</body>

</html>

