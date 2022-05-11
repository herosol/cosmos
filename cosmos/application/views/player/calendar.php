<!doctype html>
<html>
<head>
<title>Calendar – <?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header(); ?>
<main>


<section id="dash">
    <div id="schedule">
        <div class="contain">
            <div class="head">
                <!-- <h1 class="secHeading">Calendar</h1> -->
            </div>
            <div class="blk">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
</section>
<!-- dash -->


<!-- Calendar -->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/fullcalendar.min.css') ?>">
<script type="text/javascript" src="<?= base_url('assets/js/moment.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/fullcalendar.min.js') ?>"></script>
<script type="text/javascript">
    $(function(){
        $('#calendar').fullCalendar({
            header: {
                left: 'prev, next today',
                center: 'title',
                right: 'month, basicWeek, basicDay'
            },
            // defaultDate: '2019-10-04',
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [{
                    title: 'All Day Event',
                    start: '2019-10-12'
                },
                {
                    title: 'Long Event',
                    start: '2019-10-06',
                    end: '2019-10-08'
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: '2019-10-16T16:00:00'
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: '2019-10-22T16:00:00'
                },
                {
                    title: 'Conference',
                    start: '2019-10-04',
                    end: '2019-10-04'
                },
                {
                    title: 'Meeting',
                    start: '2019-10-29T10:30:00',
                    end: '2019-10-28T12:30:00'
                },
                {
                    title: 'Lunch',
                    start: '2019-10-31T12:00:00'
                },
                {
                    title: 'Meeting',
                    start: '2019-10-04T14:30:00'
                },
                {
                    title: 'Happy Hour',
                    start: '2019-10-04T17:30:00'
                },
                {
                    title: 'Dinner',
                    start: '2019-10-04T20:00:00'
                },
                {
                    title: 'Birthday Party',
                    start: '2019-10-19T07:00:00'
                },
                {
                    title: 'Click for Google',
                    url: 'http://google.com/',
                    start: '2019-10-04'
                }
            ]
        });
    });
</script>
</main>
<?php $this->load->view('includes/footer');?>
</body>
</html>