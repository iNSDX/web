<!-- Responsive calendar - START -->
<div class="responsive-calendar">
    <div class="controls">
        <a class="pull-left" data-go="prev">
            <div class="btn btn-primary">Anterior</div>
        </a>
        <h4><span data-head-year></span> <span data-head-month></span></h4>
        <a class="pull-right" data-go="next">
            <div class="btn btn-primary">Siguiente</div>
        </a>
    </div>
    <hr/>
    <div class="day-headers">
        <div class="day header">L</div>
        <div class="day header">M</div>
        <div class="day header">X</div>
        <div class="day header">J</div>
        <div class="day header">V</div>
        <div class="day header">S</div>
        <div class="day header">D</div>
    </div>
    <div class="days" data-group="days">
    </div>
</div>
<!-- Responsive calendar - END -->

<div class="input-group">
    <input type="text" class="form-control" placeholder="Buscar">
    <span class="input-group-btn">
<button class="btn btn-default" type="button">
<span class="glyphicon glyphicon-search"></span>
    </button>
    </span>
    
    <script type="text/javascript">
        $(document).ready(function () {
            $(".responsive-calendar").responsiveCalendar({
                time: '',
                events: {
                    "2013-04-30": {
                        "number": 5,
                        "url": "http://w3widgets.com/responsive-slider"
                    },
                    "2013-04-26": {
                        "number": 1,
                        "url": "http://w3widgets.com"
                    },
                    "2013-05-03": {
                        "number": 1
                    },
                    "2013-06-12": {}
                }
            });
        });
    </script>
