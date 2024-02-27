<!-- resources/js/components/admin/homeComponent.vue -->
<script setup>

const lang = localStorage.getItem('lang');

</script>

<template>
<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">

        <div class="col-lg-4">
            <div class="ibox">
                <div class="ibox-title">
                    <span class="label label-primary float-right">{{$t('admin.Today')}}</span>
                    <h5>{{$t('admin.visits')}}</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">22 285,400</h1>
                    <div class="stat-percent font-bold text-navy">20% <i class="fa fa-level-up"></i></div>
                    <small>{{$t('admin.New orders')}}</small>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="ibox ">
                <div class="ibox-title">
                    <span class="label label-info float-right">{{$t('admin.Monthly')}}</span>
                    <h5>{{$t('admin.Orders')}}</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">60 420,600</h1>
                    <div class="stat-percent font-bold text-info">40% <i class="fa fa-level-up"></i></div>
                    <small>{{$t('admin.New orders')}}</small>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="ibox ">
                <div class="ibox-title">
                    <span class="label label-warning float-right">{{$t('admin.Annual')}}</span>
                    <h5>{{$t('admin.Income')}}</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">$ 120 430,800</h1>
                    <div class="stat-percent font-bold text-warning">16% <i class="fa fa-level-up"></i></div>
                    <small>{{$t('admin.New orders')}}</small>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-content">
                    <div>
                        <span class="float-right text-right">
                            <small>{{$t('admin.Average value of sales in the past month in:')}} <strong>{{$t('admin.United states')}}</strong></small>
                            <br />
                            {{$t('admin.All sales:')}} 162,862
                        </span>
                        <h1 class="m-b-xs">$ 50,992</h1>
                        <h3 class="font-bold no-margins">
                            {{$t('admin.Half-year revenue margin')}}
                        </h3>
                        <small>{{$t('admin.Sales marketing.')}}</small>
                    </div>

                    <div>
                        <canvas id="lineChart" height="70"></canvas>
                    </div>

                    <div class="m-t-md">
                        <small class="float-right">
                            <i class="fa fa-clock-o"> </i>
                            {{$t('admin.Update on')}} 16.07.2015
                        </small>
                        <small>
                            <strong>{{$t('admin.Analysis of sales:')}}</strong> {{$t('admin.The value has been changed over time, and last month reached a level over $50,000.')}}
                        </small>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>{{$t('admin.New data for the report')}}</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#" class="dropdown-item">{{$t('admin.Config option 1')}}</a>
                            </li>
                            <li><a href="#" class="dropdown-item">{{$t('admin.Config option 2')}}</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content ibox-heading">
                    <h3>{{$t('admin.Stock price up')}}
                        <div class="stat-percent text-navy">34% <i class="fa fa-level-up"></i></div>
                    </h3>
                    <small><i class="fa fa-stack-exchange"></i> {{$t('admin.New economic data from the previous quarter.')}}</small>
                </div>
                <div class="ibox-content">
                    <div>

                        <div class="float-right text-right">

                            <span class="bar_dashboard">5,3,9,6,5,9,7,3,5,2,4,7,3,2,7,9,6,4,5,7,3,2,1,0,9,5,6,8,3,2,1</span>
                            <br />
                            <small class="font-bold">$ 20 054.43</small>
                        </div>
                        <h4>{{$t('admin.NYS report new data!')}}
                            <br />
                            <small class="m-r"><a href="graph_flot.html"> {{$t('admin.Check the stock price!')}} </a> </small>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>{{$t('admin.Read below comments and tweets')}}</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#" class="dropdown-item">{{$t('admin.Config option 1')}}</a>
                            </li>
                            <li><a href="#" class="dropdown-item">{{$t('admin.Config option 2')}}</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content no-padding">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <p><a class="text-info" href="#">@Alan Marry</a> {{$t('admin.I belive that. Lorem Ipsum is simply dummy text of the printing and typesetting industry.')}}</p>
                            <small class="block text-muted"><i class="fa fa-clock-o"></i> {{$t('admin.1 minuts ago')}}</small>
                        </li>
                        <li class="list-group-item">
                            <p><a class="text-info" href="#">@Stock Man</a> {{$t('admin.Check this stock chart. This price is crazy!')}} </p>
                            <small class="block text-muted"><i class="fa fa-clock-o"></i> {{$t('admin.2 hours ago')}}</small>
                        </li>
                        <li class="list-group-item">
                            <p><a class="text-info" href="#">@Kevin Smith</a> {{$t('admin.Lorem ipsum unknown printer took a galley')}} </p>
                            <small class="block text-muted"><i class="fa fa-clock-o"></i> {{$t('admin.2 minuts ago')}}</small>
                        </li>
                        <li class="list-group-item ">
                            <p><a class="text-info" href="#">@Jonathan Febrick</a> {{$t('admin.The standard chunk of Lorem Ipsum')}}</p>
                            <small class="block text-muted"><i class="fa fa-clock-o"></i> {{$t('admin.1 hour ago')}}</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>{{$t('admin.Timeline')}}</h5>
                    <span class="label label-primary">{{$t('admin.Meeting today')}}</span>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#" class="dropdown-item">{{$t('admin.Config option 1')}}</a>
                            </li>
                            <li><a href="#" class="dropdown-item">{{$t('admin.Config option 2')}}</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>

                <div class="ibox-content inspinia-timeline">

                    <div class="timeline-item">
                        <div class="row">
                            <div class="col-3 date">
                                <i class="fa fa-briefcase"></i>
                                6:00 am
                                <br />
                                <small class="text-navy">{{$t('admin.2 hour ago')}}</small>
                            </div>
                            <div class="col-7 content no-top-border">
                                <p class="m-b-xs"><strong>{{$t('admin.Meeting')}}</strong></p>

                                <p>{{$t('admin.Conference on the sales results for the previous year. Monica please examine sales trends in marketing and products.')}}</p>

                            </div>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="row">
                            <div class="col-3 date">
                                <i class="fa fa-file-text"></i>
                                7:00 am
                                <br />
                                <small class="text-navy">{{$t('admin.3 hour ago')}}</small>
                            </div>
                            <div class="col-7 content">
                                <p class="m-b-xs"><strong>{{$t('admin.Send documents to Mike')}}</strong></p>
                                <p>{{$t('admin.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since.')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="row">
                            <div class="col-3 date">
                                <i class="fa fa-coffee"></i>
                                8:00 am
                                <br />
                            </div>
                            <div class="col-7 content">
                                <p class="m-b-xs"><strong>{{$t('admin.Coffee Break')}}</strong></p>
                                <p>
                                    {{$t('admin.Go to shop and find some products. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s.')}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="row">
                            <div class="col-3 date">
                                <i class="fa fa-phone"></i>
                                11:00 am
                                <br />
                                <small class="text-navy">{{$t('admin.21 hour ago')}}</small>
                            </div>
                            <div class="col-7 content">
                                <p class="m-b-xs"><strong>{{$t('admin.Phone with Jeronimo')}}</strong></p>
                                <p>
                                    {{$t('admin.Lorem Ipsum has been the industry\'s standard dummy text ever since.')}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
</template>
