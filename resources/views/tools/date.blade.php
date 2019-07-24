@extends('layouts/main')
@section('content')
<link href=<?=Illuminate\Support\Facades\URL::asset('assets/css/plugins/iCheck/custom.css') ?> rel="stylesheet">
<link href=<?=Illuminate\Support\Facades\URL::asset('assets/css/plugins/fullcalendar/fullcalendar.css') ?> rel="stylesheet">
<link href=<?=Illuminate\Support\Facades\URL::asset('assets/css/plugins/fullcalendar/fullcalendar.print.css') ?> rel="stylesheet">


   <div class="wrapper wrapper-content">
                <div class="row animated fadeInDown">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Draggable Events</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="calendar.html#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="calendar.html#">选项1</a>
                                        </li>
                                        <li><a href="calendar.html#">选项2</a>
                                        </li>
                                    </ul>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div id='external-events'>
                                    <p>可拖动的活动</p>
                                    <div class='external-event navy-bg'>确定活动目标</div>
                                    <div class='external-event navy-bg'>各部门职责及分工</div>
                                    <div class='external-event navy-bg'>案例分享</div>
                                    <div class='external-event navy-bg'>xxx</div>
                                    <p class="m-t">
                                        <input type='checkbox' id='drop-remove' class="i-checks" checked />
                                        <label for='drop-remove'>移动后删除</label>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <h2>FullCalendar</h2> 这是一个jQuery插件，它提供了全尺寸，可拖动，使用Ajax的操作方式，并且可以使用自己的feed格式，如谷歌日历。
                                <p>
                                    <a href="http://arshaw.com/fullcalendar/" target="_blank">FullCalendar开发文档</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>FullCalendar示例 </h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/jquery-2.1.1.min.js') ?> ></script>
<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/jquery-ui.custom.min.js') ?> ></script>
<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/iCheck/icheck.min.js') ?> ></script>
<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/fullcalendar/fullcalendar.min.js') ?> ></script>
 <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
            /* initialize the external events
             -----------------------------------------------------------------*/
            $('#external-events div.external-event').each(function () {
                // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                // it doesn't need to have a start or end
                var eventObject = {
                    title: $.trim($(this).text()) // use the element's text as the event title
                };
                // store the Event Object in the DOM element so we can get to it later
                $(this).data('eventObject', eventObject);
                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 999,
                    revert: true, // will cause the event to go back to its
                    revertDuration: 0 //  original position after the drag
                });

            });
            /* initialize the calendar
             -----------------------------------------------------------------*/
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar !!!
                drop: function (date, allDay) { // this function is called when something is dropped

                    // retrieve the dropped element's stored Event Object
                    var originalEventObject = $(this).data('eventObject');
                    // we need to copy it, so that multiple events don't have a reference to the same object
                    var copiedEventObject = $.extend({}, originalEventObject);

                    // assign it the date that was reported
                    copiedEventObject.start = date;
                    copiedEventObject.allDay = allDay;

                    // render the event on the calendar
                    // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                    // is the "remove after drop" checkbox checked?
                    if ($('#drop-remove').is(':checked')) {
                        // if so, remove the element from the "Draggable Events" list
                        $(this).remove();
                    }
                },
                events: [
                    {
                        title: '日事件',
                        start: new Date(y, m, 1)
                    },
                    {
                        title: '长事件',
                        start: new Date(y, m, d - 5),
                        end: new Date(y, m, d - 2),
                    },
                    {
                        id: 999,
                        title: '重复事件',
                        start: new Date(y, m, d - 3, 16, 0),
                        allDay: false,
                    },
                    {
                        id: 999,
                        title: '重复事件',
                        start: new Date(y, m, d + 4, 16, 0),
                        allDay: false
                    },
                    {
                        title: '会议',
                        start: new Date(y, m, d, 10, 30),
                        allDay: false
                    },
                    {
                        title: '午餐',
                        start: new Date(y, m, d, 12, 0),
                        end: new Date(y, m, d, 14, 0),
                        allDay: false
                    },
                    {
                        title: '生日',
                        start: new Date(y, m, d + 1, 19, 0),
                        end: new Date(y, m, d + 1, 22, 30),
                        allDay: false
                    },
                    {
                        title: '打开百度',
                        start: new Date(y, m, 28),
                        end: new Date(y, m, 29),
                        url: 'http://baidu.com/'
                    }
                ],
            });
        });
    </script>



@endsection